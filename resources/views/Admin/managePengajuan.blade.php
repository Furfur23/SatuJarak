<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Satu Jarak - Manage Pengajuan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="managePengajuan.css">
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

        <div class="sidebar-bottom">

            <a href="#" class="logout-btn">
                <span>Log Out</span>
                <i class="bi bi-box-arrow-right"></i>
            </a>

        </div>

    </aside>


    <!-- Main -->
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
                            <i class="bi bi-gear"></i>
                            Pengaturan
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
                    <span class="heading-label">
                        ADMINISTRASI DESA
                    </span>

                    <h1>Manage Pengajuan</h1>

                    <p>
                        Pantau dan kelola pengajuan masyarakat Desa Jarak
                    </p>
                </div>

                <div class="heading-decoration">
                    <i class="bi bi-file-earmark-check-fill"></i>
                </div>

            </div>


            <!-- Pengajuan Banner -->
            <div class="submission-banner animate-item">

                <div class="banner-decoration decoration-one"></div>
                <div class="banner-decoration decoration-two"></div>

                <div class="banner-icon">
                    <i class="bi bi-clipboard-check-fill"></i>
                </div>

                <div class="banner-content">
                    <span>DATA PENGAJUAN</span>

                    <h2>Pengajuan</h2>

                    <p>
                        <strong id="totalBanner">128</strong>
                        pengajuan terdaftar
                    </p>
                </div>

                <div class="month-select">

                    <i class="bi bi-calendar3"></i>

                    <select id="monthFilter">
                        <option>September 2026</option>
                        <option>Agustus 2026</option>
                        <option>Juli 2026</option>
                    </select>

                    <i class="bi bi-chevron-down"></i>

                </div>

            </div>


            <!-- Statistic Cards -->
            <div class="row g-3 statistic-row">

                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card stat-total animate-item">

                        <div class="stat-icon">
                           <i class="bi bi-file-earmark-text-fill"></i>
                        </div>

                        <div>
                            <span>Total Pengajuan</span>
                            <h3 id="totalApplication">128</h3>
                        </div>

                        <i class="bi bi-file-earmark-text-fill card-decoration"></i>

                    </div>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card stat-waiting animate-item">

                        <div class="stat-icon">
                            <i class="bi bi-clock-fill"></i>
                        </div>

                        <div>
                            <span>Menunggu Verifikasi</span>
                            <h3 id="waitingApplication">32</h3>
                        </div>

                        <i class="bi bi-hourglass-split card-decoration"></i>

                    </div>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card stat-process animate-item">

                        <div class="stat-icon">
                            <i class="bi bi-gear-fill"></i>
                        </div>

                        <div>
                            <span>Sedang Diproses</span>
                            <h3 id="processApplication">41</h3>
                        </div>

                        <i class="bi bi-arrow-repeat card-decoration"></i>

                    </div>

                </div>


                <div class="col-12 col-sm-6 col-xl-3">

                    <div class="stat-card stat-complete animate-item">

                        <div class="stat-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>

                        <div>
                            <span>Selesai</span>
                            <h3 id="completeApplication">55</h3>
                        </div>

                        <i class="bi bi-check-circle card-decoration"></i>

                    </div>

                </div>

            </div>


            <!-- Filter -->
            <div class="filter-wrapper animate-item">

                <div class="filter-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Cari pengajuan..."
                    >

                </div>


                <div class="filter-select-wrapper status-filter">

                    <i class="bi bi-list-ul"></i>

                    <select id="statusFilter">
                        <option value="">Status</option>
                        <option value="Menunggu Verifikasi">
                            Menunggu Verifikasi
                        </option>
                        <option value="Sedang Diproses">
                            Sedang Diproses
                        </option>
                        <option value="Selesai">
                            Selesai
                        </option>
                    </select>

                    <i class="bi bi-chevron-down"></i>

                </div>


                <div class="filter-select-wrapper service-filter">

                    <i class="bi bi-grid-3x3-gap-fill"></i>

                    <select id="serviceFilter">
                        <option value="">Layanan</option>
                        <option value="KKN">KKN</option>
                        <option value="Penelitian">Penelitian</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Kependudukan">Kependudukan</option>
                        <option value="Surat Keterangan">
                            Surat Keterangan
                        </option>
                    </select>

                    <i class="bi bi-chevron-down"></i>

                </div>

            </div>


            <!-- Table -->
            <div class="table-card animate-item">
                <div class="table-responsive">
                    <table class="table application-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pemohon</th>
                                <th>Judul Kerjasama</th>
                                <th>Nama Instansi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-center">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody id="applicationTable">
                        </tbody>
                    </table>
                </div>


                <!-- Table Footer -->
                <div class="table-footer">

                    <span id="dataInfo">
                        Menampilkan 1-5 dari 8 pengajuan
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="managePengajuan.js"></script>

</body>
</html>