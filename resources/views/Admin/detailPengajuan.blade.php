<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satu Jarak - Detail Pengajuan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/admin/detailPengajuan.css') }}">
</head>

<body>

<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="sidebar">

        <!-- Mobile Close Button -->
        <button class="sidebar-close" id="sidebarCloseBtn">
            <i class="bi bi-x-lg"></i>
        </button>

        <div class="sidebar-brand">

            <div class="logo-mark">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Satu Jarak">
            </div>

            <h2>Satu Jarak</h2>
            <span>Pelayanan Publik Desa</span>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <a href="#" class="nav-item">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="managePengajuan.html" class="nav-item active">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Pengajuan</span>
                <i class="bi bi-chevron-right nav-arrow"></i>
            </a>

            <a href="#" class="nav-item">
                <i class="bi bi-briefcase-fill"></i>
                <span>Layanan</span>
            </a>

            <a href="#" class="nav-item">
                <i class="bi bi-building-fill"></i>
                <span>Profile Desa</span>
            </a>

            <a href="#" class="nav-item">
                <i class="bi bi-people-fill"></i>
                <span>User</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="sidebar-bottom">
            <a href="#" class="logout-btn">
                <span>Log Out</span>
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Header -->
        <header class="top-header">

            <div class="mobile-menu">
                <button class="btn" id="mobileMenuBtn">
                    <i class="bi bi-list" id="menuIcon"></i>
                </button>
            </div>

            <div class="header-right">

                <div class="global-search">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search...">
                </div>


                <!-- Notification -->
                <div class="header-dropdown">

                    <button class="header-icon notification-btn" id="notificationBtn">
                        <i class="bi bi-bell-fill"></i>
                        <span class="notification-dot"></span>
                    </button>

                    <div class="notification-dropdown" id="notificationDropdown">

                        <div class="notification-header">
                            <strong>Notifikasi</strong>
                            <a href="#">Lihat Semua</a>
                        </div>

                        <div class="notification-item">
                            <div class="notification-dot-item pink"></div>

                            <div>
                                <strong>Pengajuan PGJ-004</strong>
                                <p>telah berubah menjadi Sedang Diproses</p>
                                <small>2 jam yang lalu</small>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-dot-item green"></div>

                            <div>
                                <strong>Pengajuan PGJ-003</strong>
                                <p>telah selesai</p>
                                <small>5 jam yang lalu</small>
                            </div>
                        </div>

                        <div class="notification-item">
                            <div class="notification-dot-item gold"></div>

                            <div>
                                <strong>Pengajuan PGJ-002</strong>
                                <p>menunggu verifikasi</p>
                                <small>1 hari yang lalu</small>
                            </div>
                        </div>

                    </div>

                </div>


                <!-- Profile -->
                <div class="header-dropdown">

                    <button class="profile-btn" id="profileBtn">
                        <div class="profile-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <i class="bi bi-chevron-down profile-arrow"></i>
                    </button>

                    <div class="profile-dropdown" id="profileDropdown">

                        <div class="profile-info">
                            <div class="profile-avatar large">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <div>
                                <strong>Admin Desa</strong>
                                <small>Administrator</small>
                            </div>
                        </div>

                        <hr>

                        <a href="#">
                            <i class="bi bi-person"></i>
                            Profil
                        </a>

                        <a href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            Log Out
                        </a>

                    </div>

                </div>

            </div>

        </header>

        <!-- Content -->
        <section class="content">

            <!-- Page Heading -->
            <div class="page-heading animate-item">
                <div>
                    <span class="heading-label">ADMINISTRASI DESA</span>
                    <h1>Detail Pengajuan</h1>
                    <p>Informasi lengkap dan pengelolaan pengajuan masyarakat Desa Jarak</p>
                </div>

                <a href="managePengajuan.html" class="back-button">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>

            <!-- Status -->
            <div class="detail-status-card animate-item">

                <div class="status-left">
                    <div class="status-icon">
                        <i class="bi bi-file-earmark-check-fill"></i>
                    </div>

                    <div>
                        <span class="small-label">ID PENGAJUAN</span>
                        <h3 id="applicationId">PGJ-001</h3>
                    </div>
                </div>

                <div class="status-right">
                    <span class="status-label">Status Saat Ini</span>

                    <span class="status-badge waiting" id="applicationStatus">
                        <i class="bi bi-clock-fill"></i>
                        Menunggu Verifikasi
                    </span>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="detail-grid">

                <!-- Detail Main -->
                <div class="detail-main">

                    <!-- Data Pemohon -->
                    <div class="detail-card animate-item">
                        <div class="card-heading">
                            <div class="heading-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            <div>
                                <h3>Data Pemohon</h3>
                                <p>Informasi identitas pemohon</p>
                            </div>
                        </div>

                        <div class="info-grid">
                            <div class="info-item">
                                <span>Nama Lengkap</span>
                                <strong id="applicantName">Ahmad Fauzi</strong>
                            </div>

                            <div class="info-item">
                                <span>Email</span>
                                <strong id="applicantEmail">ahmadfauzi@email.com</strong>
                            </div>

                            <div class="info-item">
                                <span>No. Telepon</span>
                                <strong id="applicantPhone">0812-3456-7890</strong>
                            </div>

                            <div class="info-item">
                                <span>Instansi</span>
                                <strong id="institution">Universitas Nusantara</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Pengajuan -->
                    <div class="detail-card animate-item">
                        <div class="card-heading">
                            <div class="heading-icon gold">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>

                            <div>
                                <h3>Detail Pengajuan</h3>
                                <p>Informasi pengajuan yang diajukan</p>
                            </div>
                        </div>

                        <div class="info-grid">
                            <div class="info-item full">
                                <span>Judul Pengajuan</span>
                                <strong id="applicationTitle">Pengajuan Kerjasama KKN</strong>
                            </div>

                            <div class="info-item">
                                <span>Jenis Layanan</span>
                                <strong id="applicationService">KKN</strong>
                            </div>

                            <div class="info-item">
                                <span>Tanggal Pengajuan</span>
                                <strong id="applicationDate">25 September 2026</strong>
                            </div>

                            <div class="info-item">
                                <span>Lokasi Kegiatan</span>
                                <strong>Desa Jarak</strong>
                            </div>

                            <div class="info-item">
                                <span>Periode Kegiatan</span>
                                <strong>Oktober - Desember 2026</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Dokumen -->
                    <div class="detail-card animate-item">
                        <div class="card-heading">
                            <div class="heading-icon green">
                                <i class="bi bi-folder-fill"></i>
                            </div>

                            <div>
                                <h3>Dokumen Persyaratan</h3>
                                <p>Dokumen yang dilampirkan oleh pemohon</p>
                            </div>
                        </div>

                        <div class="document-list">

                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>

                                <div class="document-info">
                                    <strong>Surat Pengantar KKN.pdf</strong>
                                    <span>1.2 MB · PDF</span>
                                </div>

                                <button class="document-btn" type="button">
                                    <i class="bi bi-eye"></i>
                                    Lihat
                                </button>
                            </div>

                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </div>

                                <div class="document-info">
                                    <strong>Proposal KKN.pdf</strong>
                                    <span>2.8 MB · PDF</span>
                                </div>

                                <button class="document-btn" type="button">
                                    <i class="bi bi-eye"></i>
                                    Lihat
                                </button>
                            </div>

                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="bi bi-file-earmark-image-fill"></i>
                                </div>

                                <div class="document-info">
                                    <strong>Surat Pernyataan.jpg</strong>
                                    <span>850 KB · JPG</span>
                                </div>

                                <button class="document-btn" type="button">
                                    <i class="bi bi-eye"></i>
                                    Lihat
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- Catatan Pemohon -->
                    <div class="detail-card animate-item">
                        <div class="card-heading">
                            <div class="heading-icon gold">
                                <i class="bi bi-chat-left-text-fill"></i>
                            </div>

                            <div>
                                <h3>Catatan Pemohon</h3>
                                <p>Catatan atau keterangan dari pemohon</p>
                            </div>
                        </div>

                        <div class="applicant-note">
                            Kami bermaksud mengajukan kerja sama
                            pelaksanaan kegiatan KKN di Desa Jarak
                            untuk mendukung kegiatan pemberdayaan
                            masyarakat desa.
                        </div>
                    </div>

                    <!-- Aksi Pengajuan -->
                    <div class="detail-card action-card animate-item">
                        <div class="card-heading">
                            <div class="heading-icon action">
                                <i class="bi bi-lightning-charge-fill"></i>
                            </div>

                            <div>
                                <h3>Aksi Pengajuan</h3>
                                <p>Pilih tindakan yang ingin dilakukan terhadap pengajuan ini</p>
                            </div>
                        </div>

                        <div class="action-buttons">

                            <!-- Tombol Perlu Perbaikan -->
                            <button type="button" class="action-btn repair-btn" data-bs-toggle="modal" data-bs-target="#repairModal">
                                <div class="action-btn-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </div>

                                <div class="action-btn-text">
                                    <strong>Perlu Perbaikan</strong>
                                    <span>Minta pemohon memperbaiki data</span>
                                </div>

                                <i class="bi bi-arrow-right action-arrow"></i>
                            </button>

                            <!-- Tombol Tolak -->
                            <button type="button" class="action-btn reject-btn" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <div class="action-btn-icon">
                                    <i class="bi bi-x-circle-fill"></i>
                                </div>

                                <div class="action-btn-text">
                                    <strong>Tolak Pengajuan</strong>
                                    <span>Tolak pengajuan dari pemohon</span>
                                </div>

                                <i class="bi bi-arrow-right action-arrow"></i>
                            </button>

                            <!-- Tombol Verifikasi -->
                            <button type="button" class="action-btn verify-btn" data-bs-toggle="modal" data-bs-target="#verifyModal">
                                <div class="action-btn-icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>

                                <div class="action-btn-text">
                                    <strong>Verifikasi</strong>
                                    <span>Setujui dan proses pengajuan</span>
                                </div>

                                <i class="bi bi-arrow-right action-arrow"></i>
                            </button>

                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>
</div>


<!-- =========================================================
     MODAL PERLU PERBAIKAN
========================================================= -->
<div class="modal fade" id="repairModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content action-modal repair-modal">

            <!-- Header -->
            <div class="modal-header">
                <div class="modal-top">
                    <div class="modal-action-icon repair">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <span class="modal-label repair">
                        Perbaikan
                    </span>
                </div>
            </div>

            <!-- Body -->
            <div class="modal-body">

                <h5 class="modal-title">
                    Perbaiki Data
                </h5>

                <p class="modal-description">
                    Minta pemohon memperbaiki data atau dokumen pengajuan.
                </p>

                <div class="modal-form-group">
                    <textarea
                        id="repairNote"
                        rows="4"
                        placeholder="Dokumen atau data yang perlu diperbaiki dapat dijelaskan melalui catatan."
                    ></textarea>
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button" class="modal-cancel-btn" data-bs-dismiss="modal">
                    Batal
                </button>

                <button
                    type="button"
                    id="repairSubmit"
                    class="modal-submit-btn repair"
                >
                    Perbaiki Data
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>

        </div>
    </div>
</div>


<!-- =========================================================
     MODAL TOLAK PENGAJUAN
========================================================= -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content action-modal reject-modal">

            <!-- Header -->
            <div class="modal-header">
                <div class="modal-top">
                    <div class="modal-action-icon reject">
                        <i class="bi bi-x-circle-fill"></i>
                    </div>

                    <span class="modal-label reject">
                        Penolakan
                    </span>
                </div>
            </div>

            <!-- Body -->
            <div class="modal-body">

                <h5 class="modal-title">
                    Penolakan Pengajuan
                </h5>

                <p class="modal-description">
                    Tolak pengajuan apabila tidak memenuhi persyaratan.
                </p>

                <div class="modal-form-group">
                    <textarea
                        id="rejectNote"
                        rows="4"
                        placeholder="Berikan alasan penolakan agar dapat dipahami oleh pemohon."
                    ></textarea>
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button" class="modal-cancel-btn" data-bs-dismiss="modal">
                    Batal
                </button>

                <button
                    type="button"
                    id="rejectSubmit"
                    class="modal-submit-btn reject"
                >
                    Tolak Pengajuan
                    <i class="bi bi-x-lg"></i>
                </button>

            </div>

        </div>
    </div>
</div>


<!-- =========================================================
     MODAL VERIFIKASI
========================================================= -->
<div class="modal fade" id="verifyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content action-modal verify-modal">

            <!-- Header -->
            <div class="modal-header">
                <div class="modal-top">
                    <div class="modal-action-icon verify">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>

                    <span class="modal-label verify">
                        Verifikasi
                    </span>
                </div>
            </div>

            <!-- Body -->
            <div class="modal-body">

                <h5 class="modal-title">
                    Verifikasi Pengajuan
                </h5>

                <p class="modal-description">
                    Apakah Anda yakin ingin memverifikasi pengajuan ini?
                </p>

                <div class="modal-info-box">
                    Pengajuan akan diteruskan ke tahap selanjutnya setelah
                    diverifikasi.
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button" class="modal-cancel-btn" data-bs-dismiss="modal">
                    Batal
                </button>

                <button
                    type="button"
                    id="verifySubmit"
                    class="modal-submit-btn verify"
                >
                    Verifikasi Pengajuan
                    <i class="bi bi-check-lg"></i>
                </button>

            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/admin/detailPengajuan.js') }}"></script>

</body>
</html>