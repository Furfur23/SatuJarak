@extends('layouts.app')

@section('title', 'Detail Potensi Desa')
@section('topbar_title', 'ADMIN · DETAIL POTENSI DESA')
@section('active_menu', 'potensi')

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

        .summary-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
        }

        .action-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .table-soft {
            margin: 0;
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

        .table-soft tbody td,
        .table-soft tbody th {
            padding: 14px 16px;
            vertical-align: middle;
            border-color: var(--border);
            font-size: 14.5px;
        }

        .table-soft tbody tr:hover {
            background: #FBFDFC;
        }

        /* tabel detail (key / value) */
        .table-detail th[scope="row"] {
            width: 220px;
            background: #F8FAF9;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-detail td {
            font-weight: 500;
            word-break: break-word;
        }

        .table-rincian {
            min-width: 620px;
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

        .note-card {
            background: linear-gradient(135deg, #FDEBD3 0%, #FBE3C0 100%);
            border-radius: var(--radius-lg);
            padding: 22px 24px;
            margin-bottom: 28px;
        }

        .note-card .section-title {
            margin-bottom: 8px;
        }

        .note-card p {
            margin: 0;
            color: var(--text);
        }

        @media (max-width: 576px) {
            .summary-card {
                padding: 22px;
            }

            .summary-title {
                font-size: 18px;
            }

            .action-bar>* {
                flex: 1 1 100%;
            }

            .table-detail th[scope="row"] {
                width: 130px;
                white-space: normal;
            }

            .table-soft tbody td,
            .table-soft tbody th {
                padding: 12px;
                font-size: 14px;
            }

            .note-card {
                padding: 18px;
            }
        }
    </style>
@endpush

@section('content')
    <h1 class="page-heading">Detail Potensi Desa</h1>
    <p class="page-sub">Lihat rincian lengkap data potensi desa yang tersimpan.</p>

    {{-- Ringkasan --}}
    <div class="summary-card">
        <div class="summary-code">UTS 1234</div>
        <div class="summary-title">Nama UMKM</div>
        <div class="summary-meta">
            <div class="status-badge status-aktif"><span class="status-dot status-aktif"></span> Aktif</div>
  
        </div>
    </div>

    {{-- Aksi --}}
    <div class="action-bar">
        <a href="#" class="btn-outline-soft"><i class="bi bi-arrow-left"></i> Kembali</a>
        <button type="button" class="btn-gold" data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                class="bi bi-pencil-square"></i> Ubah</button>
        <button type="button" class="btn-danger-soft" data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                class="bi bi-trash3-fill"></i> Hapus</button>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-8">
            {{-- Tabel detail --}}
            <div class="section-card">
                <div class="section-title">Detail Potensi</div>
                <div class="table-responsive">
                    <table class="table table-soft table-detail align-middle mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Kode</th>
                                <td>PTS-0001</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama UMKM</th>
                                <td>Sawah Padi Organik</td>
                            </tr>
                            <tr>
                                <th scope="row">Lokasi</th>
                                <td>Dusun Krajan, Desa Kediri</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Pemilik</th>
                                <td>Toto Wolff</td>
                            </tr>
                            <tr>
                                <th scope="row">Kontak</th>
                                <td>0812-3456-7890</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td><span class="pill pill-mint"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                        Aktif</span></td>
                            </tr>
                            <tr>
                                <th scope="row">Deskripsi</th>
                                <td>Hamparan sawah padi organik seluas ± 45 hektar yang dikelola secara berkelompok tanpa
                                    pestisida kimia dan menjadi sumber pangan utama warga.</td>
                            </tr>
                            <tr>
                                <th scope="row">Dibuat</th>
                                <td>12 Agu 2025 · 09:15 WIB</td>
                            </tr>
                            <tr>
                                <th scope="row">Diperbarui</th>
                                <td>22 Sep 2025 · 10:30 WIB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
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

    {{-- Modal Ubah --}}
    <div class="modal fade" id="modalUbah" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUbahLabel">Ubah Potensi Desa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 field-group">
                                <label class="field-label">Nama UMKM</label>
                                <input type="text" class="form-control" name="nama" value="Sawah Padi Organik"
                                    required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option selected>Aktif</option>
                                    <option>Draft</option>
                                    <option>Nonaktif</option>
                                </select>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Lokasi</label>
                                <input type="text" class="form-control" name="lokasi"
                                    value="Dusun Krajan, Desa Kediri" required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Pemilik</label>
                                <input type="text" class="form-control" name="pengelola" value="Kelompok Tani Makmur"
                                    required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Kontak</label>
                                <input type="tel" class="form-control" name="kontak" value="081234567890">
                            </div>
                            <div class="col-12 field-group">
                                <label class="field-label">Foto</label>
                                <input type="file" class="form-control" name="foto" accept="image/*">
                            </div>
                            <div class="col-12 field-group mb-0">
                                <label class="field-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" required>Hamparan sawah padi organik seluas ± 45 hektar yang dikelola secara berkelompok tanpa pestisida kimia dan menjadi sumber pangan utama warga.</textarea>
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

    {{-- Modal Hapus --}}
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="#">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHapusLabel">Hapus Potensi Desa?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Potensi <strong>Sawah Padi Organik</strong> beserta seluruh rincian datanya akan dihapus permanen.
                        Tindakan ini tidak dapat dibatalkan.
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
