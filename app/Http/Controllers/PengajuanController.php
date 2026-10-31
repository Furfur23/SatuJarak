<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    // ── User: Form pengajuan (wajib login) ───────────────────
    public function index()
    {
        return view('User.userpengajuan');
    }

    // ── User: Detail / konfirmasi pengajuan ──────────────────
    public function show(Pengajuan $pengajuan)
    {
        return view('User.detailpengajuan', compact('pengajuan'));
    }

    // ── User: Simpan pengajuan baru ──────────────────────────
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'   => ['required', 'string', 'max:150'],
            'nim'            => ['nullable', 'string', 'max:20'],
            'email_pemohon'  => ['required', 'email', 'max:100'],
            'no_hp'          => ['required', 'string', 'max:20'],
            'program_studi'  => ['nullable', 'string', 'max:100'],
            'nama_instansi'  => ['required', 'string', 'max:150'],
            'jenis_kegiatan' => ['required', 'string', 'max:100'],
            'judul_kerjasama'=> ['required', 'string', 'max:200'],
            'tanggal_mulai'  => ['nullable', 'date'],
            'tanggal_selesai'=> ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'deskripsi'      => ['nullable', 'string'],
            'file_proposal'  => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'file_surat'     => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        // Simpan user_id dari sesi yang sedang login.
        // Route sudah dilindungi middleware 'auth', sehingga
        // Auth::id() di sini dijamin tidak null.
        $data['user_id'] = Auth::id();

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')
                ->store('pengajuan/proposal', 'public');
        }

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')
                ->store('pengajuan/surat', 'public');
        }

        Pengajuan::create($data);

        return redirect()->route('pengajuan.index')
            ->with('success', 'Pengajuan berhasil dikirim! Kami akan segera memproses permohonan Anda.');
    }

    // ── Admin: Daftar semua pengajuan ────────────────────────
    public function adminIndex(Request $request)
    {
        $query = Pengajuan::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('judul_kerjasama', 'like', "%{$search}%")
                  ->orWhere('nama_instansi', 'like', "%{$search}%");
            });
        }

        $pengajuans = $query->paginate(10)->withQueryString();

        $stats = [
            'total'    => Pengajuan::count(),
            'menunggu' => Pengajuan::menunggu()->count(),
            'proses'   => Pengajuan::proses()->count(),
            'selesai'  => Pengajuan::selesai()->count(),
        ];

        return view('Admin.managePengajuan', compact('pengajuans', 'stats'));
    }

    // ── Admin: Detail pengajuan ──────────────────────────────
    public function adminShow(Pengajuan $pengajuan)
    {
        $pengajuan->load('user');
        return view('Admin.detailPengajuan', compact('pengajuan'));
    }

    // ── Admin: Update status pengajuan ───────────────────────
    public function adminUpdate(Request $request, Pengajuan $pengajuan)
    {
        $data = $request->validate([
            'status'        => ['required', 'in:Menunggu Verifikasi,Sedang Diproses,Selesai,Ditolak'],
            'catatan_admin' => ['nullable', 'string'],
        ]);

        $pengajuan->update($data);

        return redirect()->route('admin.pengajuan.index')
            ->with('success', "Status pengajuan #{$pengajuan->id} berhasil diperbarui.");
    }
// Menampilkan template Surat Keterangan Persetujuan
    public function suratPersetujuan(Pengajuan $pengajuan)
    {
        abort_unless($pengajuan->status === 'Selesai', 403);

        return view('Admin.suratPersetujuan', compact('pengajuan'));
    }
}
