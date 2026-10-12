<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potensi Desa - Satu Jarak</title>

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
        .dashboard-disabled {
            cursor: not-allowed;
            opacity: 0.72;
        }

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

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .potential-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .main-content {
                padding-right: 25px;
                padding-left: 25px;
            }
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 230px;
                padding-right: 15px;
                padding-left: 15px;
            }

            .main-content {
                margin-left: 230px;
            }

            .brand-name {
                font-size: 20px;
            }

            .potential-grid {
                grid-template-columns: 1fr;
            }

            .search-panel {
                align-items: stretch;
                flex-direction: column;
            }

            .filter-select {
                width: 100%;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: 0;
                border-radius: 0 0 22px 22px;
            }

            .brand {
                margin-bottom: 25px;
            }

            .brand-logo {
                width: 72px;
                height: 72px;
                border-radius: 20px;
            }

            .brand-logo img {
                width: 59px;
                height: 59px;
            }

            .nav-menu {
                gap: 9px;
            }

            .help-card {
                margin-top: 22px;
            }

            .main-content {
                margin-left: 0;
                padding: 24px 16px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                margin-bottom: 22px;
            }

            .page-heading h1 {
                font-size: 24px;
            }

            .welcome-banner {
                padding: 23px 20px;
            }

            .welcome-banner h2 {
                font-size: 20px;
            }

            .potential-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <!-- Logo di atas, tulisan di bawah, semuanya di tengah -->
        <div class="brand">
            <div class="brand-logo">
                <img
                    src="{{ asset('images/logo.png') }}"
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
            <span
                class="nav-link-custom dashboard-disabled"
                aria-disabled="true"
                title="Dashboard belum tersedia"
            >
                <i class="bi bi-grid-1x2"></i>
                <span>Dashboard</span>
            </span>

            <a
                href="{{ url('/potensi-desa') }}"
                class="nav-link-custom active"
                aria-current="page"
            >
                <i class="bi bi-stars"></i>
                <span>Potensi Desa</span>
            </a>

            <a
                href="{{ url('/userpengajuan') }}"
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

    <!-- KONTEN UTAMA -->
    <main class="main-content">
        <header class="topbar">
            <div class="page-heading">
                <h1>Potensi Desa</h1>
                <p>Kenali potensi, produk, dan keunggulan Desa Jarak.</p>
            </div>

            <div class="user-label">
                <span class="user-avatar">
                    <i class="bi bi-person"></i>
                </span>
                <span>Pengunjung</span>
            </div>
        </header>

        <!-- BANNER SAMBUTAN -->
        <section class="welcome-banner">
            <h2>Jelajahi Potensi Desa Jarak</h2>
            <p>
                Temukan berbagai potensi unggulan desa, mulai dari produk
                UMKM, hasil pertanian, hingga potensi wisata yang dapat
                dikembangkan untuk meningkatkan kesejahteraan masyarakat.
            </p>
        </section>

        <!-- PENCARIAN DAN FILTER -->
        <section class="search-panel">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Cari nama potensi atau deskripsi..."
                    aria-label="Cari potensi desa"
                >
            </div>

            <select
                id="categoryFilter"
                class="filter-select"
                aria-label="Filter kategori potensi"
            >
                <option value="all">Semua Kategori</option>
                <option value="umkm">UMKM</option>
                <option value="pertanian">Pertanian</option>
                <option value="wisata">Wisata</option>
            </select>
        </section>

        <!-- DAFTAR POTENSI -->
        <section>
            <div class="section-heading">
                <h2>Potensi Unggulan</h2>
                <span class="result-count" id="resultCount">
                    3 potensi ditemukan
                </span>
            </div>

            <div class="potential-grid" id="potentialGrid">
                <!-- KARTU 1 -->
                <article
                    class="potential-card"
                    data-category="umkm"
                    data-search="umkm produk olahan makanan usaha masyarakat desa"
                >
                    <div class="card-visual gold">
                        <i class="bi bi-shop"></i>
                    </div>

                    <div class="card-body-custom">
                        <span class="category-badge gold">UMKM</span>
                        <h3>Produk UMKM Desa</h3>
                        <p class="card-description">
                            Produk usaha masyarakat desa yang berpotensi
                            dikembangkan dan dipasarkan secara lebih luas.
                        </p>

                        <div class="card-footer-custom">
                            <span class="location-label">
                                <i class="bi bi-geo-alt"></i>
                                Desa Jarak
                            </span>

                            <a
                                href="javascript:void(0)"
                                class="detail-link"
                                onclick="showPlaceholder(event)"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- KARTU 2 -->
                <article
                    class="potential-card"
                    data-category="pertanian"
                    data-search="pertanian hasil bumi perkebunan tanaman"
                >
                    <div class="card-visual">
                        <i class="bi bi-flower1"></i>
                    </div>

                    <div class="card-body-custom">
                        <span class="category-badge">Pertanian</span>
                        <h3>Hasil Pertanian</h3>
                        <p class="card-description">
                            Potensi hasil bumi dan kegiatan pertanian
                            masyarakat yang dapat mendukung ekonomi desa.
                        </p>

                        <div class="card-footer-custom">
                            <span class="location-label">
                                <i class="bi bi-geo-alt"></i>
                                Desa Jarak
                            </span>

                            <a
                                href="javascript:void(0)"
                                class="detail-link"
                                onclick="showPlaceholder(event)"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- KARTU 3 -->
                <article
                    class="potential-card"
                    data-category="wisata"
                    data-search="wisata alam pemandangan lingkungan desa"
                >
                    <div class="card-visual blue">
                        <i class="bi bi-tree"></i>
                    </div>

                    <div class="card-body-custom">
                        <span class="category-badge blue">Wisata</span>
                        <h3>Potensi Wisata Desa</h3>
                        <p class="card-description">
                            Potensi lingkungan dan keindahan alam desa
                            yang dapat menjadi daya tarik pengunjung.
                        </p>

                        <div class="card-footer-custom">
                            <span class="location-label">
                                <i class="bi bi-geo-alt"></i>
                                Desa Jarak
                            </span>

                            <a
                                href="javascript:void(0)"
                                class="detail-link"
                                onclick="showPlaceholder(event)"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- TAMPIL JIKA HASIL PENCARIAN KOSONG -->
            <div class="empty-state" id="emptyState">
                <i class="bi bi-search"></i>
                <h3>Potensi tidak ditemukan</h3>
                <p>
                    Coba gunakan kata kunci lain atau pilih kategori berbeda.
                </p>
            </div>
        </section>
    </main>

    <script>
        const searchInput = document.getElementById('searchInput');
        const categoryFilter = document.getElementById('categoryFilter');
        const potentialCards = document.querySelectorAll('.potential-card');
        const resultCount = document.getElementById('resultCount');
        const emptyState = document.getElementById('emptyState');
        const potentialGrid = document.getElementById('potentialGrid');

        function filterPotentials() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            const selectedCategory = categoryFilter.value;
            let visibleCount = 0;

            potentialCards.forEach((card) => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('.card-description').textContent.toLowerCase();
                const searchableText = card.dataset.search.toLowerCase();

                const matchesSearch =
                    title.includes(searchTerm) ||
                    description.includes(searchTerm) ||
                    searchableText.includes(searchTerm);

                const matchesCategory =
                    selectedCategory === 'all' ||
                    card.dataset.category === selectedCategory;

                const isVisible = matchesSearch && matchesCategory;

                card.style.display = isVisible ? '' : 'none';

                if (isVisible) {
                    visibleCount++;
                }
            });

            resultCount.textContent = `${visibleCount} potensi ditemukan`;
            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
            potentialGrid.style.display = visibleCount === 0 ? 'none' : 'grid';
        }

        searchInput.addEventListener('input', filterPotentials);
        categoryFilter.addEventListener('change', filterPotentials);

        function showPlaceholder(event) {
            event.preventDefault();
            alert('Halaman detail potensi belum tersedia.');
        }
    </script>
</body>
</html>