@extends('layouts.app')

@section('title', 'Kelola Potensi Desa')
@section('topbar_title', 'ADMIN · POTENSI DESA')
@section('active_menu', 'potensi')

@push('styles')
    <style>
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

        .stat-icon.forest {
            background: var(--forest);
            color: var(--mint);
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

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .toolbar-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            flex: 1;
            min-width: 0;
        }

        .search-box {
            position: relative;
            flex: 1 1 240px;
            max-width: 360px;
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .search-box .form-control {
            padding-left: 42px;
            border-radius: 999px;
        }

        .toolbar .form-select {
            border-radius: 999px;
            width: auto;
            min-width: 160px;
        }

        .table-soft {
            margin: 0;
            min-width: 820px;
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

        .item-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 220px;
        }

        .item-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--mint-soft);
            color: #2D9B6A;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .item-icon.gold {
            background: var(--gold-light);
            color: var(--peach-text);
        }

        .item-name {
            font-weight: 800;
            color: var(--forest);
            line-height: 1.25;
        }

        .item-sub {
            font-size: 12.5px;
            color: var(--muted);
        }

        .row-actions {
            display: flex;
            gap: 6px;
            justify-content: flex-end;
        }

        .act-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: #EEF4F0;
            color: var(--forest);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            transition: background 0.15s ease, color 0.15s ease, transform 0.15s ease;
        }

        .act-btn:hover {
            background: var(--mint-soft);
            color: var(--forest);
            transform: translateY(-2px);
        }

        .act-btn.edit:hover {
            background: var(--gold-light);
            color: var(--peach-text);
        }

        .act-btn.del:hover {
            background: var(--pink-light);
            color: var(--pink-text);
        }

        .table-footer {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
            margin-top: 18px;
            color: var(--muted);
            font-size: 13.5px;
        }

        .pagination {
            margin: 0;
            gap: 6px;
        }

        .pagination .page-link {
            border: 1px solid var(--border);
            border-radius: 50% !important;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            color: var(--text);
            font-weight: 700;
            font-size: 13.5px;
        }

        .pagination .page-item.active .page-link {
            background: var(--forest);
            border-color: var(--forest);
            color: #fff;
        }

        .pagination .page-link:hover {
            background: var(--mint-soft);
        }

        .pagination .page-item.disabled .page-link {
            color: var(--muted);
            background: #F8FAF9;
        }

        .header-row {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: flex-start;
            justify-content: space-between;
        }

        @media (max-width: 576px) {
            .header-row .btn-primary-green {
                width: 100%;
            }

            .search-box {
                max-width: 100%;
                flex-basis: 100%;
            }

            .toolbar .form-select {
                flex: 1 1 calc(50% - 5px);
                min-width: 0;
            }

            .table-footer {
                justify-content: center;
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')
    <div class="header-row">
        <div>
            <h1 class="page-heading">Kelola Potensi Desa</h1>
            <p class="page-sub">Tambah, ubah, dan hapus data potensi yang ditampilkan kepada masyarakat.</p>
        </div>
        <button type="button" class="btn-primary-green" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="bi bi-plus-lg"></i> Tambah Potensi
        </button>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon forest"><i class="bi bi-stars"></i></div>
                <div>
                    <div class="stat-value">24</div>
                    <div class="stat-label">Total Potensi</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon mint"><i class="bi bi-flower1"></i></div>
                <div>
                    <div class="stat-value">9</div>
                    <div class="stat-label">Pertanian</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon gold"><i class="bi bi-shop"></i></div>
                <div>
                    <div class="stat-value">8</div>
                    <div class="stat-label">UMKM</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon pink"><i class="bi bi-camera-fill"></i></div>
                <div>
                    <div class="stat-value">7</div>
                    <div class="stat-label">Wisata</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="section-card">
        <div class="toolbar">
            <div class="toolbar-filters">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" class="form-control" placeholder="Cari potensi desa…"
                        aria-label="Cari potensi desa">
                </div>
                <select class="form-select" aria-label="Filter status">
                    <option selected>Semua Status</option>
                    <option>Aktif</option>
                    <option>Draft</option>
                    <option>Nonaktif</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-soft align-middle">
                <thead>
                    <tr>
                        <th style="width:48px;">No</th>
                        <th>Nama UMKM</th>
                        <th>Pemilik</th>
                        <th>Kontak</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                          <div class="item-name">Ikan Bakar Aseli Malaysia</div>
                        </td>
                        <td>Pak Toto Wolff</td>
                        <td>Dusun Krajan</td>
                        <td><span class="pill pill-mint"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                Aktif</span></td>
                        <td>
                            <div class="row-actions">
                                <a href="#" class="act-btn" title="Lihat detail" aria-label="Lihat detail"><i
                                        class="bi bi-eye-fill"></i></a>
                                <button type="button" class="act-btn edit" title="Ubah" aria-label="Ubah"
                                    data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="act-btn del" title="Hapus" aria-label="Hapus"
                                    data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                          <div class="item-name">Ikan Bakar Aseli Malaysia</div>
                        </td>
                        <td>Pak Toto Wolff</td>
                        <td>Dusun Krajan</td>
                        <td><span class="pill pill-mint"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                Aktif</span></td>
                        <td>
                            <div class="row-actions">
                                <a href="#" class="act-btn" title="Lihat detail" aria-label="Lihat detail"><i
                                        class="bi bi-eye-fill"></i></a>
                                <button type="button" class="act-btn edit" title="Ubah" aria-label="Ubah"
                                    data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="act-btn del" title="Hapus" aria-label="Hapus"
                                    data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                          <div class="item-name">Ikan Bakar Aseli Malaysia</div>
                        </td>
                        <td>Pak Toto Wolff</td>
                        <td>Dusun Krajan</td>
                        <td><span class="pill pill-mint"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                Aktif</span></td>
                        <td>
                            <div class="row-actions">
                                <a href="#" class="act-btn" title="Lihat detail" aria-label="Lihat detail"><i
                                        class="bi bi-eye-fill"></i></a>
                                <button type="button" class="act-btn edit" title="Ubah" aria-label="Ubah"
                                    data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="act-btn del" title="Hapus" aria-label="Hapus"
                                    data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                          <div class="item-name">Ikan Bakar Aseli Malaysia</div>
                        </td>
                        <td>Pak Toto Wolff</td>
                        <td>Dusun Krajan</td>
                        <td><span class="pill pill-mint"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                Aktif</span></td>
                        <td>
                            <div class="row-actions">
                                <a href="#" class="act-btn" title="Lihat detail" aria-label="Lihat detail"><i
                                        class="bi bi-eye-fill"></i></a>
                                <button type="button" class="act-btn edit" title="Ubah" aria-label="Ubah"
                                    data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="act-btn del" title="Hapus" aria-label="Hapus"
                                    data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                          <div class="item-name">Ikan Bakar Aseli Malaysia</div>
                        </td>
                        <td>Pak Toto Wolff</td>
                        <td>Dusun Krajan</td>
                        <td><span class="pill pill-mint"><i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                Aktif</span></td>
                        <td>
                            <div class="row-actions">
                                <a href="#" class="act-btn" title="Lihat detail" aria-label="Lihat detail"><i
                                        class="bi bi-eye-fill"></i></a>
                                <button type="button" class="act-btn edit" title="Ubah" aria-label="Ubah"
                                    data-bs-toggle="modal" data-bs-target="#modalUbah"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="act-btn del" title="Hapus" aria-label="Hapus"
                                    data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <div>Menampilkan 1–5 dari 24 data</div>
            <nav aria-label="Navigasi halaman">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Sebelumnya"><i
                                class="bi bi-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Berikutnya"><i
                                class="bi bi-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Potensi Desa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 field-group">
                                <label class="field-label">Nama UMKM</label>
                                <input type="text" class="form-control" name="nama" required>
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
                                <input type="text" class="form-control" name="lokasi" required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Pemilik</label>
                                <input type="text" class="form-control" name="pemilik" required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Kontak</label>
                                <input type="tel" class="form-control" name="kontak">
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Foto</label>
                                <input type="file" class="form-control" name="foto" accept="image/*">
                            </div>
                            <div class="col-12 field-group mb-0">
                                <label class="field-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-outline-soft" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-primary-green"><i class="bi bi-check2-circle"></i>
                            Simpan</button>
                    </div>
                </form>
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
                                <input type="text" class="form-control" name="lokasi" value="Dusun Krajan" required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Pemilik</label>
                                <input type="text" class="form-control" name="pemilik" value="Kelompok Tani Makmur"
                                    required>
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Kontak</label>
                                <input type="tel" class="form-control" name="kontak" value="081234567890">
                            </div>
                            <div class="col-md-6 field-group">
                                <label class="field-label">Foto</label>
                                <input type="file" class="form-control" name="foto" accept="image/*">
                            </div>
                            <div class="col-12 field-group mb-0">
                                <label class="field-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3" required>Hamparan sawah padi organik seluas ± 45 hektar yang dikelola secara berkelompok tanpa pestisida kimia.</textarea>
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
                        Data potensi desa ini akan dihapus permanen dan tidak lagi tampil kepada masyarakat. Tindakan ini
                        tidak dapat dibatalkan.
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
