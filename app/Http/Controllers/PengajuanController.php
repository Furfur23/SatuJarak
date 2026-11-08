<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Proteksi otorisasi: hanya pemilik pengajuan atau admin yang berhak melihat
        if (Auth::check() && $pengajuan->user_id && $pengajuan->user_id !== Auth::id() && ! Auth::user()->is_admin) {
            abort(403, 'Anda tidak memiliki hak akses untuk melihat rincian pengajuan ini.');
        }

        return view('User.detailpengajuan', compact('pengajuan'));
    }

    // ── User: Simpan pengajuan baru ──────────────────────────
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:150'],
            'nim' => ['nullable', 'string', 'max:50'],
            'universitas' => ['nullable', 'string', 'max:150'],
            'nama_instansi' => ['nullable', 'string', 'max:150'],
            'fakultas' => ['nullable', 'string', 'max:150'],
            'program_studi' => ['nullable', 'string', 'max:100'],
            'no_hp' => ['required', 'string', 'max:25'],
            'email' => ['nullable', 'email', 'max:100'],
            'email_pemohon' => ['nullable', 'email', 'max:100'],
            'jenis_permohonan' => ['nullable', 'string', 'max:100'],
            'jenis_kegiatan' => ['nullable', 'string', 'max:100'],
            'judul_kegiatan' => ['nullable', 'string', 'max:200'],
            'judul_kerjasama' => ['nullable', 'string', 'max:200'],
            'lokasi' => ['nullable', 'string', 'max:200'],
            'jumlah_peserta' => ['nullable', 'integer', 'min:1'],
            'tanggal_mulai' => ['nullable', 'date'],
            'tanggal_selesai' => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'dosen_pembimbing' => ['nullable', 'string', 'max:150'],
            'deskripsi' => ['nullable', 'string'],
            'file_proposal' => ['required', 'file', 'mimes:pdf', 'max:5120'],
            'file_surat' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ]);

        $email = $request->input('email') ?? $request->input('email_pemohon');
        if (! $email) {
            return back()->withErrors(['email' => 'Email pemohon wajib diisi.'])->withInput();
        }

        $instansi = $request->input('universitas') ?? $request->input('nama_instansi') ?? '-';
        $kegiatan = $request->input('jenis_permohonan') ?? $request->input('jenis_kegiatan') ?? 'KKN';
        $judul = $request->input('judul_kegiatan') ?? $request->input('judul_kerjasama') ?? 'Pengajuan Kerjasama';
        $fakultas = $request->input('fakultas') ?? $request->input('program_studi');

        $data = [
            'user_id' => Auth::id(),
            'nama_lengkap' => $validated['nama_lengkap'],
            'nim' => $validated['nim'] ?? null,
            'universitas' => $request->input('universitas') ?? $instansi,
            'nama_instansi' => $instansi,
            'fakultas' => $fakultas,
            'program_studi' => $fakultas,
            'no_hp' => $validated['no_hp'],
            'email_pemohon' => $email,
            'jenis_kegiatan' => $kegiatan,
            'judul_kerjasama' => $judul,
            'lokasi' => $request->input('lokasi'),
            'jumlah_peserta' => $request->input('jumlah_peserta'),
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'dosen_pembimbing' => $request->input('dosen_pembimbing'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        if ($request->hasFile('file_proposal')) {
            $data['file_proposal'] = $request->file('file_proposal')
                ->store('pengajuan/proposal', 'public');
        }

        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')
                ->store('pengajuan/surat', 'public');
        }

        $pengajuan = Pengajuan::create($data);

        return redirect()->route('pengajuan.show', $pengajuan->id)
            ->with('success', 'Pengajuan berhasil dikirim! Silakan pantau perkembangan permohonan Anda di halaman ini.');
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
            'total' => Pengajuan::count(),
            'menunggu' => Pengajuan::menunggu()->count(),
            'proses' => Pengajuan::proses()->count(),
            'selesai' => Pengajuan::selesai()->count(),
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
            'status' => ['required', 'in:Menunggu Verifikasi,Sedang Diproses,Selesai,Ditolak'],
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
