<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Satu Jarak - Manage Layanan</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <!-- CSS khusus Manage Layanan -->
    <link rel="stylesheet" href="manageLayanan.css">
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
                <img src="logo.png" alt="Logo Satu Jarak">
            </div>

            <h2>Satu Jarak</h2>
            <span>Pelayanan Publik Desa</span>
        </div>


        <nav class="sidebar-nav">

            <a href="#" class="nav-item">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="managePengajuan.html" class="nav-item">
                <i class="bi bi-file-earmark-text-fill"></i>
                <span>Pengajuan</span>
            </a>

            <a href="manageLayanan.html" class="nav-item active">
                <i class="bi bi-briefcase-fill"></i>
                <span>Layanan</span>
                <i class="bi bi-chevron-right nav-arrow"></i>
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


        <div class="sidebar-bottom">

            <a href="#" class="logout-btn">
                <span>Log Out</span>
                <i class="bi bi-box-arrow-right"></i>
            </a>

        </div>

    </aside>


    <!-- ================= MAIN ================= -->
    <main class="main-content">

        <!-- Header -->
        <header class="top-header">

            <div class="mobile-menu">
                <button class="btn" id="mobileMenuBtn">
                    <i class="bi bi-list" id="menuIcon"></i>
                </button>
            </div>


            <div class="header-right">

                <!-- Search -->
                <div class="global-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        placeholder="Search..."
                    >

                </div>


                <!-- Notification -->
                <div class="header-dropdown">

                    <button
                        class="header-icon notification-btn"
                        id="notificationBtn"
                    >
                        <i class="bi bi-bell-fill"></i>
                        <span class="notification-dot"></span>
                    </button>


                    <div
                        class="notification-dropdown"
                        id="notificationDropdown"
                    >

                        <div class="notification-header">

                            <strong>Notifikasi</strong>

                            <a href="#">
                                Lihat Semua
                            </a>

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

                    <button
                        class="profile-btn"
                        id="profileBtn"
                    >

                        <div class="profile-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <i class="bi bi-chevron-down profile-arrow"></i>

                    </button>


                    <div
                        class="profile-dropdown"
                        id="profileDropdown"
                    >

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


        <!-- ================= CONTENT ================= -->
        <section class="content">


            <!-- Page Heading -->
            <div class="page-heading animate-item">

                <div>

                    <span class="heading-label">
                        ADMINISTRASI DESA
                    </span>

                    <h1>Manage Layanan</h1>

                    <p>
                        Kelola layanan yang tersedia untuk masyarakat
                    </p>

                </div>


                <div class="heading-decoration">

                    <i class="bi bi-briefcase-fill"></i>

                </div>

            </div>


            <!-- ================= STATISTIC ================= -->
            <div class="row g-3 statistic-row">

                <!-- Total -->
                <div class="col-12 col-sm-6 col-xl-4">

                    <div class="stat-card stat-total animate-item">

                        <div class="stat-icon">
                            <i class="bi bi-grid-fill"></i>
                        </div>

                        <div>
                            <span>Total Layanan</span>
                            <h3 id="totalService">30</h3>
                        </div>

                        <i class="bi bi-grid-3x3-gap-fill card-decoration"></i>

                    </div>

                </div>


                <!-- Aktif -->
                <div class="col-12 col-sm-6 col-xl-4">

                    <div class="stat-card stat-active animate-item">

                        <div class="stat-icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                        <div>
                            <span>Layanan Aktif</span>
                            <h3 id="activeService">24</h3>
                        </div>

                        <i class="bi bi-check-circle card-decoration"></i>

                    </div>

                </div>


                <!-- Tidak Aktif -->
                <div class="col-12 col-sm-6 col-xl-4">

                    <div class="stat-card stat-inactive animate-item">

                        <div class="stat-icon">
                            <i class="bi bi-pause-circle-fill"></i>
                        </div>

                        <div>
                            <span>Layanan Non Aktif</span>
                            <h3 id="inactiveService">6</h3>
                        </div>

                        <i class="bi bi-dash-circle card-decoration"></i>

                    </div>

                </div>

            </div>


            <!-- ================= FILTER ================= -->
            <div class="filter-wrapper animate-item">

                <div class="filter-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari layanan..."
                    >

                </div>


                <div class="filter-select-wrapper status-filter">

                    <i class="bi bi-list-ul"></i>

                    <select id="statusFilter">

                        <option value="">
                            Status
                        </option>

                        <option value="Aktif">
                            Aktif
                        </option>

                        <option value="Non Aktif">
                            Non Aktif
                        </option>

                    </select>

                    <i class="bi bi-chevron-down"></i>

                </div>


                <!-- Tombol tambah -->
                <button
                    type="button"
                    class="add-service-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#addServiceModal"
                >

                    <i class="bi bi-plus-lg"></i>

                    Tambah Layanan

                </button>

            </div>


            <!-- ================= TABLE ================= -->
            <div class="table-card animate-item">

                <div class="table-responsive">

                    <table class="table service-table">

                        <thead>

                            <tr>

                                <th>ID</th>

                                <th>Icon</th>

                                <th>Nama Layanan</th>

                                <th>Link</th>

                                <th>Deskripsi</th>

                                <th>Tanggal</th>

                                <th>Status</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody id="serviceTable">

                            <!-- Data dari JS -->

                        </tbody>

                    </table>

                </div>


                <!-- Table Footer -->
                <div class="table-footer">

                    <span id="dataInfo">
                        Menampilkan 1-5 dari 30 layanan
                    </span>


                    <nav>

                        <ul
                            class="pagination"
                            id="pagination"
                        ></ul>

                    </nav>

                </div>

            </div>

        </section>

    </main>

</div>

<!-- ================================================= -->
<!-- MODAL TAMBAH LAYANAN -->
<!-- ================================================= -->

<div
    class="modal fade"
    id="addServiceModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content action-modal service-modal">

            <!-- Modal Header -->
            <div class="modal-header">

                <div class="modal-top">

                    <div class="modal-action-icon service">

                        <i class="bi bi-plus-circle-fill"></i>

                    </div>


                    <span class="modal-label service">
                        Layanan Baru
                    </span>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <!-- Modal Body -->
            <div class="modal-body">

                <h4>
                    Tambah Layanan
                </h4>

                <p class="modal-description">
                    Tambahkan layanan baru yang dapat digunakan
                    oleh masyarakat Desa Jarak.
                </p>


                <!-- ID -->
                <div class="modal-form-group">

                    <label for="serviceId">
                        <i class="bi bi-hash"></i>
                        ID Layanan
                    </label>

                    <input
                        type="text"
                        id="serviceId"
                        placeholder="Contoh: LYN-001"
                    >

                </div>


                <!-- Icon -->
                <div class="modal-form-group">
                    <label for="serviceIcon">
                        <i class="bi bi-image"></i>
                        Icon Layanan
                    </label>

                    <input
                        type="file"
                        id="serviceIcon"
                        accept="image/*"
                    >

                    <div id="iconPreview" class="icon-preview"></div>

                    <small>
                        Upload gambar icon layanan. Format JPG, PNG, atau SVG.
                    </small>
                </div>


                <!-- Nama -->
                <div class="modal-form-group">

                    <label for="serviceName">

                        <i class="bi bi-briefcase"></i>

                        Nama Layanan

                    </label>

                    <input
                        type="text"
                        id="serviceName"
                        placeholder="Masukkan nama layanan"
                    >

                </div>


                <!-- Link -->
                <div class="modal-form-group">

                    <label for="serviceLink">

                        <i class="bi bi-link-45deg"></i>

                        Link Layanan

                    </label>

                    <input
                        type="url"
                        id="serviceLink"
                        placeholder="https://..."
                    >

                </div>


                <!-- Deskripsi -->
                <div class="modal-form-group">

                    <label for="serviceDescription">

                        <i class="bi bi-text-paragraph"></i>

                        Deskripsi

                    </label>

                    <textarea
                        id="serviceDescription"
                        rows="3"
                        placeholder="Jelaskan fungsi layanan..."
                    ></textarea>

                </div>


                <!-- Tanggal -->
                <div class="modal-form-group">

                    <label for="serviceDate">

                        <i class="bi bi-calendar3"></i>

                        Tanggal Dibuat

                    </label>

                    <input
                        type="date"
                        id="serviceDate"
                    >

                </div>

            </div>


            <!-- Modal Footer -->
            <div class="modal-footer">

                <button
                    type="button"
                    class="modal-cancel-btn"
                    data-bs-dismiss="modal"
                >
                    Batal
                </button>


                <button
                    type="button"
                    class="modal-submit-btn"
                    id="saveServiceBtn"
                >

                    <i class="bi bi-plus-lg"></i>

                    Tambah Layanan

                </button>

            </div>

        </div>

    </div>

</div>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

<script src="manageLayanan.js"></script>

</body>

</html>