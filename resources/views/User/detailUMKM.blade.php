<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail UMKM - Satu Jarak</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --forest: #0B3828;
            --forest-light: #164B36;
            --hover-green: #2E5A43;
            --mint: #B7E4C7;
            --gold: #D8B45A;
            --background: #F4F7F4;
            --text: #24352B;
            --muted: #718077;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 280px;
            padding: 30px 20px 22px;
            background: var(--forest);
            border-radius: 0 24px 24px 0;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 6px 0 24px rgba(11, 56, 40, 0.10);
        }

        /* LOGO DI TENGAH, NAMA DI BAWAH */
        .brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 14px;
            margin-bottom: 38px;
            padding-top: 10px;
            width: 100%;
        }

        .brand-logo {
            width: 86px;
            height: 86px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            border-radius: 23px;
            background: linear-gradient(135deg, var(--gold), var(--mint));
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.22);
            animation: logoFloat 3s ease-in-out infinite;
        }

        .brand-logo img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 800;
            color: var(--white);
            letter-spacing: 0.3px;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #C5D9CE;
            margin-top: 5px;
            letter-spacing: 0.6px;
        }

        @keyframes logoFloat {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        /* MENU */
        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 10px;
            margin-bottom: 25px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            gap: 13px;
            width: 100%;
            min-height: 48px;
            padding: 13px 17px;
            border: none;
            border-radius: 15px;
            background: var(--white);
            color: var(--forest);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.25s ease,
                        color 0.25s ease,
                        transform 0.25s ease,
                        box-shadow 0.25s ease;
        }

        .nav-link-custom i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            flex-shrink: 0;
            font-size: 19px;
        }

        .nav-link-custom:hover {
            background: var(--hover-green);
            color: var(--white);
            transform: translateX(4px);
            box-shadow: 0 5px 14px rgba(0, 0, 0, 0.12);
        }

        .nav-link-custom.active {
            background: var(--mint);
            color: var(--forest);
            font-weight: 800;
            box-shadow: 0 5px 15px rgba(183, 228, 199, 0.12);
        }

        .nav-link-custom.active:hover {
            background: #C8F0D4;
            color: var(--forest);
        }

        /* DASHBOARD TIDAK BISA DIKLIK */
        /* .dashboard-disabled {
            cursor: not-allowed;
            opacity: 0.72;
        } */

        .dashboard-disabled:hover {
            background: var(--white);
            color: var(--forest);
            transform: none;
            box-shadow: none;
        }

        /* KARTU BANTUAN */
        .help-card {
            margin-top: auto;
            padding: 20px 17px;
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.08);
            color: var(--white);
        }

        .help-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            margin-bottom: 12px;
            border-radius: 13px;
            background: var(--mint);
            color: var(--forest);
            font-size: 23px;
        }

        .help-card h3 {
            margin: 0 0 7px;
            font-size: 16px;
            font-weight: 800;
        }

        .help-label {
            margin-top: 15px;
            margin-bottom: 5px;
            color: var(--mint);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .help-card p {
            margin: 0;
            color: #E0EBE4;
            font-size: 11px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        /* AREA KONTEN */
        .main-content {
            min-height: 100vh;
            margin-left: 280px;
            padding: 30px 34px 40px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }

        .page-heading h1 {
            margin: 0;
            color: var(--forest);
            font-size: 28px;
            font-weight: 800;
        }

        .page-heading p {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .user-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            border: 1px solid #E2EAE3;
            border-radius: 30px;
            background: var(--white);
            color: var(--forest);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .user-avatar {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--mint);
            font-size: 18px;
        }

        /* BANNER */
        .welcome-banner {
            position: relative;
            padding: 28px 30px;
            margin-bottom: 27px;
            overflow: hidden;
            border-radius: 22px;
            background: linear-gradient(120deg, var(--forest), #236747);
            color: var(--white);
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            top: -65px;
            right: -30px;
            width: 210px;
            height: 210px;
            border: 35px solid rgba(255, 255, 255, 0.07);
            border-radius: 50%;
        }

        .welcome-banner h2 {
            position: relative;
            z-index: 1;
            margin: 0 0 10px;
            font-size: 23px;
            font-weight: 800;
        }

        .welcome-banner p {
            position: relative;
            z-index: 1;
            max-width: 650px;
            margin: 0;
            color: #DCEBE1;
            font-size: 13px;
            line-height: 1.8;
        }

        /* PENCARIAN */
        .search-panel {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px;
            margin-bottom: 25px;
            border: 1px solid #E6ECE6;
            border-radius: 18px;
            background: var(--white);
            box-shadow: 0 5px 20px rgba(20, 50, 30, 0.03);
        }

        .search-box {
            position: relative;
            flex: 1;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 15px;
            color: var(--muted);
            transform: translateY(-50%);
        }

        .search-box input {
            width: 100%;
            min-height: 45px;
            padding: 12px 15px 12px 43px;
            border: 1px solid #E0E8E0;
            border-radius: 12px;
            outline: none;
            background: #FAFCFA;
            font-size: 13px;
        }

        .search-box input:focus {
            border-color: #6BA883;
            box-shadow: 0 0 0 3px rgba(107, 168, 131, 0.12);
        }

        .filter-select {
            min-width: 180px;
            min-height: 45px;
            padding: 10px 13px;
            border: 1px solid #E0E8E0;
            border-radius: 12px;
            background: var(--white);
            color: var(--text);
            font-size: 13px;
            outline: none;
        }

        /* JUDUL BAGIAN */
        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 17px;
        }

        .section-heading h2 {
            margin: 0;
            color: var(--forest);
            font-size: 19px;
            font-weight: 800;
        }

        .result-count {
            color: var(--muted);
            font-size: 12px;
        }

        /* KARTU POTENSI */
        .potential-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .potential-card {
            overflow: hidden;
            border: 1px solid #E6ECE6;
            border-radius: 19px;
            background: var(--white);
            box-shadow: 0 6px 20px rgba(20, 50, 30, 0.035);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .potential-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 13px 28px rgba(20, 50, 30, 0.09);
        }

        .card-visual {
            display: grid;
            place-items: center;
            height: 155px;
            background: linear-gradient(135deg, #DDEFE1, #F0F6E8);
            color: var(--forest);
            font-size: 48px;
        }

        .card-visual.gold {
            background: linear-gradient(135deg, #F4E7C1, #FBF5E5);
        }

        .card-visual.blue {
            background: linear-gradient(135deg, #DDEBF0, #EFF6F7);
        }

        .card-body-custom {
            padding: 20px;
        }

        .category-badge {
            display: inline-block;
            padding: 6px 10px;
            margin-bottom: 12px;
            border-radius: 20px;
            background: #E6F4EA;
            color: #286341;
            font-size: 10px;
            font-weight: 800;
        }

        .category-badge.gold {
            background: #FAF0D6;
            color: #87631A;
        }

        .category-badge.blue {
            background: #E5F0F4;
            color: #326478;
        }

        .card-body-custom h3 {
            margin: 0 0 9px;
            color: var(--forest);
            font-size: 17px;
            font-weight: 800;
        }

        .card-description {
            min-height: 60px;
            margin: 0 0 17px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        .card-footer-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding-top: 14px;
            border-top: 1px solid #EDF1ED;
        }

        .location-label {
            color: var(--muted);
            font-size: 11px;
        }

        .detail-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #246B45;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
        }

        .detail-link:hover {
            color: var(--forest);
        }

        .empty-state {
            display: none;
            padding: 40px 20px;
            border: 1px dashed #C9D8CC;
            border-radius: 18px;
            background: var(--white);
            color: var(--muted);
            text-align: center;
        }

        .empty-state i {
            display: block;
            margin-bottom: 12px;
            color: #9BB5A2;
            font-size: 35px;
        }

        .empty-state h3 {
            color: var(--forest);
            font-size: 17px;
            font-weight: 800;
        }

        .empty-state p {
            margin-bottom: 0;
            font-size: 12px;
        }

        
        /* ====== UMKM PAGE ====== */
        .back-link{display:inline-flex;align-items:center;gap:6px;margin-bottom:10px;color:var(--muted);font-size:12px;font-weight:700;text-decoration:none}
        .back-link:hover{color:var(--forest)}
        .card-visual{position:relative}
        .card-visual.green{background:linear-gradient(135deg,#DDEFE1,#F0F6E8)}
        .card-visual .category-badge{position:absolute;top:12px;left:12px;margin:0;background:var(--forest);color:#fff;font-size:10px}
        .potential-card{display:flex;flex-direction:column}
        .card-body-custom{display:flex;flex-direction:column;flex:1}
        .card-description{min-height:0;flex:1}
        .search-panel{margin-bottom:22px}

        /* PAGINATION */
        .pagination-wrap{display:flex;align-items:center;justify-content:space-between;gap:14px;flex-wrap:wrap;margin-top:28px}
        .pagination-info{color:var(--muted);font-size:12px}
        .pagination-custom{display:flex;align-items:center;gap:8px;flex-wrap:wrap}
        .page-btn{min-width:40px;height:40px;padding:0 12px;display:inline-flex;align-items:center;justify-content:center;border:1px solid #E0E8E0;border-radius:12px;background:var(--white);color:var(--forest);font-size:13px;font-weight:700;cursor:pointer;transition:background .2s,color .2s,transform .2s}
        .page-btn:hover:not(:disabled):not(.active){background:var(--hover-green);color:#fff;transform:translateY(-2px)}
        .page-btn.active{background:var(--forest);border-color:var(--forest);color:#fff}
        .page-btn:disabled{opacity:.4;cursor:not-allowed}

        /* MOBILE SIDEBAR TOGGLE */
        .menu-toggle{display:none;width:42px;height:42px;border:1px solid #E2EAE3;border-radius:12px;background:var(--white);color:var(--forest);font-size:22px;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0}
        .sidebar-backdrop{display:none;position:fixed;inset:0;background:rgba(11,56,40,.45);z-index:999}
        .topbar-left{display:flex;align-items:flex-start;gap:14px}

        /* RESPONSIVE */
        @media (max-width:1200px){
            .potential-grid{grid-template-columns:repeat(2,minmax(0,1fr))}
            .main-content{padding-left:25px;padding-right:25px}
        }
        @media (max-width:992px){
            .sidebar{transform:translateX(-100%);transition:transform .3s ease;width:270px}
            #navToggle:checked~.sidebar{transform:translateX(0)}
            #navToggle:checked~.sidebar-backdrop{display:block}
            .main-content{margin-left:0}
            .menu-toggle{display:inline-flex}
        }
        @media (max-width:640px){
            .main-content{padding:22px 16px 32px}
            .potential-grid{grid-template-columns:1fr}
            .page-heading h1{font-size:24px}
            .user-label span:last-child{display:none}
            .user-label{padding:6px}
            .search-panel{flex-direction:column;align-items:stretch}
            .filter-select{width:100%}
            .pagination-wrap{justify-content:center;flex-direction:column}
        }

        /* ====== PHP VERSION ADDITIONS ====== */
        .card-visual{overflow:hidden}
        .card-visual img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:1}
        .card-visual .placeholder-icon{font-size:48px;color:var(--forest);opacity:.45}
        .card-visual .category-badge{z-index:2}
        .card-description{display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:12px}
        .meta-label{font-size:10px;font-weight:800;letter-spacing:.5px;color:var(--forest);text-transform:uppercase}
        .price-tag{display:inline-flex;align-items:center;gap:6px;align-self:flex-start;margin-bottom:10px;padding:5px 10px;border-radius:20px;background:#FAF0D6;color:#87631A;font-size:11px;font-weight:800}
        .meta-row{display:flex;gap:7px;margin-bottom:16px;color:var(--muted);font-size:11px;line-height:1.6}
        .meta-row i{margin-top:2px}
        .search-btn,.reset-btn{min-height:45px;padding:0 20px;border:0;border-radius:12px;background:var(--forest);color:#fff;font-size:13px;font-weight:700;display:inline-flex;align-items:center;text-decoration:none}
        .reset-btn{background:#EDF1ED;color:var(--forest)}
        .page-btn{text-decoration:none}
        .page-btn.disabled{opacity:.4;cursor:not-allowed}
        .menu-toggle{cursor:pointer}
        @media (max-width:640px){.search-btn,.reset-btn{justify-content:center}}

        /* ====== DETAIL UMKM ====== */
        .detail-layout{display:grid;grid-template-columns:minmax(0,2fr) minmax(280px,1fr);gap:24px;align-items:start}
        .detail-card,.info-card{background:var(--white);border-radius:24px;box-shadow:0 10px 30px rgba(11,56,40,.07);overflow:hidden}
        .detail-visual{position:relative;height:360px;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#E3EEF8,#EEF4FA)}
        .detail-visual img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:1}
        .detail-visual .placeholder-icon{font-size:72px;color:var(--forest);opacity:.4}
        .detail-visual .category-badge{position:absolute;top:16px;left:16px;z-index:2;margin:0;background:var(--forest);color:#fff;font-size:11px}
        .detail-body{padding:28px}
        .detail-body h2{margin:0 0 12px;color:var(--forest);font-size:28px;font-weight:800}
        .detail-subtitle{margin:22px 0 10px;color:var(--forest);font-size:15px;font-weight:800}
        .detail-text{margin:0;color:var(--muted);font-size:14px;line-height:1.9}
        .price-tag{display:inline-flex;align-items:center;gap:6px;padding:6px 12px;border-radius:20px;background:#FAF0D6;color:#87631A;font-size:12px;font-weight:800}
        .info-card{padding:24px}
        .info-card .detail-subtitle{margin-top:0;margin-bottom:18px}
        .info-item{display:flex;gap:14px;padding:14px 0;border-bottom:1px solid #EDF1ED}
        .info-item:last-of-type{border-bottom:0}
        .info-item p{margin:2px 0 0;color:var(--forest);font-size:13px;font-weight:600;line-height:1.6}
        .info-icon{width:38px;height:38px;flex-shrink:0;display:inline-flex;align-items:center;justify-content:center;border-radius:12px;background:#E2F2E6;color:var(--forest);font-size:17px}
        .meta-label{font-size:10px;font-weight:800;letter-spacing:.5px;color:var(--muted);text-transform:uppercase}
        .wa-btn,.back-btn{display:flex;align-items:center;justify-content:center;gap:8px;min-height:46px;margin-top:12px;border-radius:14px;font-size:13px;font-weight:700;text-decoration:none;transition:transform .2s,background .2s}
        .wa-btn{margin-top:20px;background:var(--forest);color:#fff}
        .wa-btn:hover{background:var(--hover-green);color:#fff;transform:translateY(-2px)}
        .back-btn{background:#EDF1ED;color:var(--forest)}
        .back-btn:hover{background:#E0E8E0;color:var(--forest)}
        @media (max-width:1200px){.detail-layout{grid-template-columns:1fr}}
        @media (max-width:640px){.detail-visual{height:230px}.detail-body{padding:20px}.detail-body h2{font-size:22px}}
    </style>
</head>

<body>
    <input type="checkbox" id="navToggle" hidden>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <!-- Logo di atas, tulisan di bawah, semuanya di tengah -->
        <div class="brand">
            <div class="brand-logo">
                <img
                    src="/images/logo.png"
                    alt="Logo Satu Jarak"
                    onerror="this.style.display='none'"
                >
            </div>

            <div>
                <div class="brand-name">Satu Jarak</div>
                <div class="brand-subtitle">Pelayanan Publik Desa</div>
            </div>
        </div>

        <!-- MENU NAVIGASI -->
        <nav class="nav-menu">
            <a
                href="/"
                class="nav-link-custom"
            >
                <i class="bi bi-grid-1x2"></i>
                <span>Dashboard</span>
            </a>

            <a
                href="/potensi-desa"
                class="nav-link-custom active"
                aria-current="page"
            >
                <i class="bi bi-stars"></i>
                <span>Potensi Desa</span>
            </a>

            <a
                href="/userpengajuan"
                class="nav-link-custom"
            >
                <i class="bi bi-file-earmark-text"></i>
                <span>Pengajuan</span>
            </a>
        </nav>

        <!-- INFORMASI BANTUAN -->
        <section class="help-card">
            <div class="help-icon">
                <i class="bi bi-headset"></i>
            </div>

            <h3>Butuh Bantuan?</h3>

            <div class="help-label">JAM OPERASIONAL KANTOR DESA</div>
            <p>
                Senin–Kamis: 08.00–13.00 WIB<br>
                Jumat: 08.00–11.00 WIB
            </p>

            <div class="help-label">EMAIL</div>
            <p>
                <i class="bi bi-envelope"></i>
                desajarak204@gmail.com
            </p>

            <div class="help-label">INSTAGRAM</div>
            <p>
                <i class="bi bi-instagram"></i>
                @ds.jarak
            </p>
        </section>
    </aside>
    <label for="navToggle" class="sidebar-backdrop"></label>

    <!-- KONTEN UTAMA -->
    <main class="main-content">
        <header class="topbar">
            <div class="topbar-left">
                <label for="navToggle" class="menu-toggle" aria-label="Buka menu"><i class="bi bi-list"></i></label>
                <div class="page-heading">
                    <a href="/potensi-desa" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Potensi UMKM</a>
                    <h1>Detail UMKM</h1>
                    <p>Informasi lengkap produk dan kontak pelaku usaha Desa Jarak.</p>
                </div>
            </div>

            <div class="user-label">
                <span class="user-avatar"><i class="bi bi-person"></i></span>
                <span>Pengunjung</span>
            </div>
        </header>

        <section class="detail-layout">

            <!-- KIRI: GAMBAR + DESKRIPSI -->
            <article class="detail-card">
                <div class="detail-visual">
                    <i class="bi bi-image placeholder-icon"></i>
                    <img src="/images/umkm/supari-blangkon.jpg" alt="Supari Blangkon" onerror="this.remove()">
                    <span class="category-badge">UMKM</span>
                </div>

                <div class="detail-body">
                    <h2>Supari Blangkon</h2>
                    <div class="price-tag"><i class="bi bi-tag"></i> Rp14.000 - Rp150.000</div>

                    <h3 class="detail-subtitle">Tentang Usaha</h3>
                    <p class="detail-text">
                        Usaha ini merupakan kerajinan tangan asli warga Desa Jarak yang telah diproduksi secara mandiri sejak tahun 2018.
                        Setiap blankon dibuat secara manual dengan teknik jahit menggunakan kain udeng, sehingga menghasilkan produk yang
                        autentik dengan sentuhan khas pengrajin lokal. Tersedia dalam berbagai jenis, seperti Blangkon Solo dan Blangkon Jogja.
                    </p>
                </div>
            </article>

            <!-- KANAN: INFORMASI -->
            <aside class="info-column">
                <div class="info-card">
                    <h3 class="detail-subtitle">Informasi Usaha</h3>

                    <div class="info-item">
                        <span class="info-icon"><i class="bi bi-tag"></i></span>
                        <div><span class="meta-label">Harga</span><p>Rp14.000 - Rp150.000</p></div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon"><i class="bi bi-geo-alt"></i></span>
                        <div><span class="meta-label">Lokasi</span><p>Dsn. Jarak Kidul Ds. Jarak Kec. Plosoklaten</p></div>
                    </div>

                    <div class="info-item">
                        <span class="info-icon"><i class="bi bi-telephone"></i></span>
                        <div><span class="meta-label">Kontak</span><p>085655367521</p></div>
                    </div>

                    <a href="https://wa.me/6285655367521" target="_blank" rel="noopener" class="wa-btn">
                        <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                    <a href="/potensi-desa/umkm" class="back-btn">
                        <i class="bi bi-arrow-left"></i> Kembali ke daftar UMKM
                    </a>
                </div>
            </aside>

        </section>
    </main>
</body>
</html>