@extends('layouts.app')

@section('title', 'Detail Layanan')
@section('topbar_title', 'ADMIN · DETAIL LAYANAN')
@section('active_menu', 'layanan')

@push('styles')
    <style>
        .summary-card {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--mint-soft) 0%, var(--mint-mid) 100%);
            border-radius: var(--radius-lg);
            padding: 28px 32px;
            margin-bottom: 24px;
        }

        .summary-card::after {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(108, 199, 160, 0.35);
            right: -60px;
            top: -80px;
            pointer-events: none;
        }

        .summary-card>* {
            position: relative;
            z-index: 1;
        }

        .summary-code {
            font-size: 12.5px;
            font-weight: 800;
            color: #3FA57B;
            letter-spacing: 1.2px;
            margin-bottom: 6px;
        }

        .summary-title {
            font-size: 22px;
            font-weight: 800;
            color: var(--forest);
            margin-bottom: 20px;
            line-height: 1.35;
        }

        .action-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .photo-box {
            border-radius: var(--radius-md);
            border: 1.5px dashed var(--sage);
            background: #F8FAF9;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--muted);
            font-size: 13.5px;
            text-align: center;
            padding: 20px;
        }

        .photo-box i {
            font-size: 38px;
            color: var(--gold);
        }

        .stat-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-card);
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            height: 100%;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-icon.mint {
            background: var(--mint-soft);
            color: #2D9B6A;
        }

        .stat-icon.gold {
            background: var(--gold-light);
            color: var(--peach-text);
        }

        .stat-icon.pink {
            background: var(--pink-light);
            color: var(--pink-text);
        }

        .stat-value {
            font-size: 22px;
            font-weight: 800;
            color: var(--forest);
            line-height: 1.1;
        }

        .stat-label {
            font-size: 12.5px;
            color: var(--muted);
            font-weight: 600;
        }

        .info-list {
            margin: 0;
        }

        .info-row {
            display: flex;
            gap: 16px;
            padding: 13px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        .info-key {
            width: 190px;
            flex-shrink: 0;
            font-size: 13px;
            font-weight: 700;
            color: var(--muted);
        }

        .info-val {
            flex: 1;
            min-width: 0;
            color: var(--text-main);
            font-weight: 500;
            word-break: break-word;
        }

        .check-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .check-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: #F8FAF9;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 12px 16px;
            font-weight: 500;
        }

        .check-list i {
            color: var(--mint);
            font-size: 18px;
            line-height: 1.4;
        }

        .timeline-card {
            background: linear-gradient(135deg, #FDEBD3 0%, #FBE3C0 100%);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 28px;
        }

        .timeline-card .section-title {
            margin-bottom: 16px;
        }

        .timeline-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .timeline-step-item {
            background: #FFFFFF;
            border-radius: 16px;
            padding: 16px 20px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            box-shadow: 0 2px 8px rgba(183, 121, 31, 0.10);
        }

        .step-number {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--forest);
            color: #fff;
            font-weight: 800;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .step-content {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .step-title {
            font-size: 16px;
            font-weight: 800;
            color: var(--forest);
            line-height: 1.3;
        }

        .step-time {
            font-size: 14px;
            color: var(--muted);
            font-weight: 500;
        }

        /* table */
        .table-soft {
            margin: 0;
            min-width: 620px;
        }

        .table-soft thead th {
            background: #F8FAF9;
            color: var(--forest);
            font-size: 12.5px;
            font-weight: 800;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            border-bottom: 1px solid var(--border);
            padding: 13px 16px;
            white-space: nowrap;
        }

        .table-soft tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-color: var(--border);
            font-size: 14.5px;
        }

        .table-soft tbody tr:hover {
            background: #FBFDFC;
        }

        @media (max-width: 576px) {
            .summary-card {
                padding: 22px;
            }

            .summary-title {
                font-size: 18px;
            }

            .timeline-card {
                padding: 16px;
            }

            .timeline-step-item {
                padding: 14px 16px;
                gap: 12px;
            }

            .step-title {
                font-size: 15px;
            }

            .step-time {
                font-size: 13px;
            }

            .info-row {
                flex-direction: column;
                gap: 2px;
            }

            .info-key {
                width: 100%;
            }

            .action-bar>* {
                flex: 1 1 100%;
            }
        }
    </style>
@endpush

@section('content')
    <h1 class="page-heading">Detail Layanan</h1>
    <p class="page-sub">Kelola informasi, persyaratan, dan alur layanan publik desa.</p>

    {{-- Ringkasan --}}
    <div class="summary-card">
        <div class="summary-code">LYN-0003</div>
        <div class="summary-title">Layanan KKN &amp; Riset Mahasiswa</div>
        <div class="status-badge status-aktif">
            <span class="status-dot status-aktif"></span> Aktif
        </div>
    </div>

    {{-- Aksi --}}
    <div class="action-bar">
        <a href="#" class="btn-outline-soft"><i class="bi bi-arrow-left"></i> Kembali</a>
        <button type="button" class="btn-gold" data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                class="bi bi-pencil-square"></i> Ubah</button>
        <button type="button" class="btn-outline-soft" data-bs-toggle="modal" data-bs-target="#modalNonaktif"><i
                class="bi bi-slash-circle"></i> Nonaktifkan</button>
        <button type="button" class="btn-danger-soft" data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                class="bi bi-trash3-fill"></i> Hapus</button>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-7">
            {{-- Informasi Layanan --}}
            <div class="section-card">
                <div class="section-title">Informasi Layanan</div>
                <div class="info-list">
                    <div class="info-row">
                        <div class="info-key">Nama Layanan</div>
                        <div class="info-val">Layanan KKN &amp; Riset Mahasiswa</div>
                    </div>
                    <div class="info-row">
                        <div class="info-key">Kategori</div>
                        <div class="info-val"><span class="pill pill-mint">Administrasi Akademik</span></div>
                    </div>
                    <div class="info-row">
                        <div class="info-key">Deskripsi</div>
                        <div class="info-val">Layanan pengajuan izin kegiatan Kuliah Kerja Nyata (KKN) dan riset bagi
                            mahasiswa yang akan melaksanakan kegiatan di wilayah desa.</div>
                    </div>
                    <div class="info-row">
                        <div class="info-key">Link</div>
                        <div class="info-val">https://abcdefg</div>
                    </div>
                    <div class="info-row">
                        <div class="info-key">Dibuat</div>
                        <div class="info-val">12 Agu 2025 · 09:15 WIB</div>
                    </div>
                    <div class="info-row">
                        <div class="info-key">Diperbarui</div>
                        <div class="info-val">22 Sep 2025 · 10:30 WIB</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            {{-- Foto --}}
            <div class="section-card">
                <div class="section-title">Foto</div>
                <div class="photo-box">
                    <i class="bi bi-image-fill"></i>
                    <div>Belum ada foto yang diunggah</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pengajuan terbaru --}}
    <div class="section-card">
        <div class="section-title">Pengajuan Terbaru</div>
        <div class="table-responsive">
            <table class="table table-soft align-middle">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Pemohon</th>
                        <th>Judul Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>KKN-2025-0001</strong></td>
                        <td>Rina Wulandari</td>
                        <td>Pemberdayaan UMKM Desa Berbasis Digital</td>
                        <td>22 Sep 2025</td>
                        <td><span class="pill pill-gold">Menunggu</span></td>
                    </tr>
                    <tr>
                        <td><strong>KKN-2025-0002</strong></td>
                        <td>Bagas Prasetyo</td>
                        <td>Penyuluhan Sanitasi dan Kesehatan Lingkungan</td>
                        <td>20 Sep 2025</td>
                        <td><span class="pill pill-mint">Disetujui</span></td>
                    </tr>
                    <tr>
                        <td><strong>RST-2025-0007</strong></td>
                        <td>Dewi Anggraini</td>
                        <td>Riset Pola Pertanian Organik Warga</td>
                        <td>18 Sep 2025</td>
                        <td><span class="pill pill-pink">Ditolak</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Ubah --}}
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <form method="POST" action="#">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUbahLabel">Ubah Layanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 field-group">
                                <label class="field-label">Nama Layanan</label>
                                <input type="text" class="form-control" name="nama"
                                    value="Layanan KKN & Riset Mahasiswa" required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Kategori</label>
                                <select class="form-select" name="kategori" required>
                                    <option selected>Administrasi Akademik</option>
                                    <option>Kependudukan</option>
                                    <option>Perizinan</option>
                                    <option>Sosial</option>
                                </select>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option selected>Aktif</option>
                                    <option>Nonaktif</option>
                                    <option>Draft</option>
                                </select>
                            </div>
                            <div class="col-12 field-group">
                                <label class="field-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" required>Layanan pengajuan izin kegiatan Kuliah Kerja Nyata (KKN) dan riset bagi mahasiswa yang akan melaksanakan kegiatan di wilayah desa.</textarea>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Link</label>
                                <input type="text" class="form-control" name="link" value="https://abcdefgs"
                                    required>
                            </div>
                            <div class="col-12 field-group">
                                <label class="field-label">Foto</label>
                                <input type="file" class="form-control" name="foto" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-outline-soft" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-primary-green"><i class="bi bi-check2-circle"></i> Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Nonaktifkan --}}
    <div class="modal fade" id="modalNonaktif" tabindex="-1" aria-labelledby="modalNonaktifLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="#">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNonaktifLabel">Nonaktifkan Layanan?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Layanan <strong>Layanan KKN &amp; Riset Mahasiswa</strong> tidak akan tampil bagi pemohon sampai
                        diaktifkan kembali. Data pengajuan yang sudah ada tetap tersimpan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-outline-soft" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-gold"><i class="bi bi-slash-circle"></i> Ya,
                            Nonaktifkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="#">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel">Hapus Layanan?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Layanan <strong>Layanan KKN &amp; Riset Mahasiswa</strong> akan dihapus permanen beserta
                        persyaratan dan alurnya. Tindakan ini tidak dapat dibatalkan.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-outline-soft" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-danger-soft"><i class="bi bi-trash3-fill"></i> Ya,
                            Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
