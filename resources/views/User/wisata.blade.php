<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Sumber Ubalan - Satu Jarak</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --forest: #0B3828;
            --forest-light: #164B36;
            --hover-green: #2E5A43;
            --mint: #B7E4C7;
            --gold: #D8B45A;
            --sky: #4F8EA6;
            --sky-light: #E5F0F4;
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

        /* ============================================================
           SIDEBAR (sama persis dengan potensidesa.blade.php)
           ============================================================ */
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
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

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
            transition: background 0.25s ease, color 0.25s ease, transform 0.25s ease, box-shadow 0.25s ease;
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

        /* ============================================================
           AREA KONTEN (shell sama dengan potensidesa.blade.php)
           ============================================================ */
        .main-content {
            min-height: 100vh;
            margin-left: 280px;
            padding: 30px 34px 50px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-link:hover { color: var(--forest); }

        /* ============================================================
           HERO
           ============================================================ */
        .detail-hero {
            position: relative;
            height: 340px;
            margin-bottom: 22px;
            border-radius: 24px;
            overflow: hidden;
            background: linear-gradient(135deg, #DDEBF0, #EFF6F7);
        }

        .detail-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .detail-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(11, 56, 40, 0.80) 0%, rgba(11, 56, 40, 0.18) 55%, rgba(11, 56, 40, 0) 100%);
        }

        .detail-hero-text {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            padding: 26px 32px;
            color: var(--white);
        }

        .detail-category-badge {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 10px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.18);
            color: var(--white);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.3px;
            backdrop-filter: blur(2px);
        }

        .detail-hero-tagline {
            display: block;
            margin-bottom: 4px;
            color: var(--gold);
            font-size: 13.5px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .detail-hero-text h1 {
            margin: 0 0 10px;
            font-size: 40px;
            font-weight: 800;
            line-height: 1.1;
        }

        .detail-hero-location {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13.5px;
            color: #E4EFE8;
        }

        /* ============================================================
           QUICK INFO BAR — tiket, jam, lokasi, tombol maps
           ============================================================ */
        .quick-info-bar {
            display: grid;
            grid-template-columns: repeat(3, 1fr) auto;
            gap: 16px;
            align-items: stretch;
            padding: 20px 24px;
            margin-bottom: 28px;
            border: 1px solid #E6ECE6;
            border-radius: 20px;
            background: var(--white);
            box-shadow: 0 6px 20px rgba(20, 50, 30, 0.035);
        }

        .quick-info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .quick-info-item + .quick-info-item {
            padding-left: 16px;
            border-left: 1px solid #EDF1ED;
        }

        .quick-info-icon {
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            font-size: 17px;
        }

        .quick-info-icon.gold { background: #FAF0D6; color: #87631A; }
        .quick-info-icon.green { background: #E6F4EA; color: #286341; }
        .quick-info-icon.blue { background: var(--sky-light); color: var(--sky); }

        .quick-info-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 3px;
        }

        .quick-info-value {
            color: var(--text);
            font-size: 13.5px;
            font-weight: 700;
            line-height: 1.5;
        }

        .quick-info-value small {
            display: block;
            color: var(--muted);
            font-size: 11.5px;
            font-weight: 500;
            margin-top: 2px;
        }

        .maps-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0 24px;
            border: none;
            border-radius: 14px;
            background: var(--forest);
            color: var(--white);
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            transition: background 0.2s ease;
        }

        .maps-btn:hover { background: var(--hover-green); color: var(--white); }

        /* ============================================================
           LAYOUT 2 KOLOM — konten kiri, galeri kanan
           ============================================================ */
        .detail-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 320px;
            gap: 24px;
            align-items: start;
        }

        .detail-card {
            padding: 26px 28px;
            margin-bottom: 24px;
            border: 1px solid #E6ECE6;
            border-radius: 20px;
            background: var(--white);
            box-shadow: 0 6px 20px rgba(20, 50, 30, 0.035);
        }

        .detail-card h2 {
            margin: 0 0 14px;
            color: var(--forest);
            font-size: 18px;
            font-weight: 800;
        }

        .detail-card p {
            margin: 0 0 14px;
            color: var(--text);
            font-size: 13.5px;
            line-height: 1.85;
        }

        .detail-card p:last-child { margin-bottom: 0; }

        /* ---------- Daftar aktivitas ---------- */
        .activity-item {
            display: flex;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px dashed #E3EAE3;
        }

        .activity-item:last-child { border-bottom: none; padding-bottom: 0; }
        .activity-item:first-child { padding-top: 4px; }

        .activity-number {
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 40px;
            height: 40px;
            border-radius: 13px;
            background: var(--sky-light);
            color: var(--sky);
            font-size: 18px;
        }

        .activity-text h3 {
            margin: 0 0 5px;
            color: var(--forest);
            font-size: 14.5px;
            font-weight: 800;
        }

        .activity-text p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        /* ---------- Galeri (kolom kanan, sticky) ---------- */
        .gallery-sidebar {
            position: sticky;
            top: 24px;
        }

        .gallery-card {
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #E6ECE6;
            border-radius: 20px;
            background: var(--white);
            box-shadow: 0 6px 20px rgba(20, 50, 30, 0.035);
        }

        .gallery-card h2 {
            margin: 0 0 14px;
            color: var(--forest);
            font-size: 16px;
            font-weight: 800;
        }

        .gallery-photo {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .gallery-photo:last-child { margin-bottom: 0; }

        .gallery-photo img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-photo:hover img {
            transform: scale(1.05);
        }

        /* ============================================================
           RESPONSIVE (breakpoint sama dengan potensidesa.blade.php)
           ============================================================ */
        @media (max-width: 1200px) {
            .main-content { padding-right: 25px; padding-left: 25px; }
            .detail-layout { grid-template-columns: 1fr; }
            .gallery-sidebar { position: static; }
            .quick-info-bar {
                grid-template-columns: repeat(2, 1fr);
            }
            .maps-btn {
                grid-column: 1 / -1;
                padding: 12px;
            }
        }

        @media (max-width: 850px) {
            .sidebar { width: 230px; padding-right: 15px; padding-left: 15px; }
            .main-content { margin-left: 230px; }
            .brand-name { font-size: 20px; }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: 0;
                border-radius: 0 0 22px 22px;
            }
            .brand { margin-bottom: 25px; }
            .brand-logo { width: 72px; height: 72px; border-radius: 20px; }
            .brand-logo img { width: 59px; height: 59px; }
            .nav-menu { gap: 9px; }
            .help-card { margin-top: 22px; }
            .main-content { margin-left: 0; padding: 24px 16px; }
            .detail-hero { height: 220px; }
            .detail-hero-text { padding: 18px 20px; }
            .detail-hero-text h1 { font-size: 26px; }
            .detail-card { padding: 20px; }
            .quick-info-bar {
                grid-template-columns: 1fr;
                padding: 16px 18px;
            }
            .quick-info-item + .quick-info-item {
                padding-left: 0;
                padding-top: 14px;
                margin-top: 2px;
                border-left: none;
                border-top: 1px solid #EDF1ED;
            }
            .maps-btn { grid-column: auto; padding: 12px; }
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
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

        <nav class="nav-menu">
            <a href="{{ route('home') }}" class="nav-link-custom">
                <i class="bi bi-grid-1x2"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ url('/potensi-desa') }}" class="nav-link-custom active" aria-current="page">
                <i class="bi bi-stars"></i>
                <span>Potensi Desa</span>
            </a>

            <a href="{{ url('/userpengajuan') }}" class="nav-link-custom">
                <i class="bi bi-file-earmark-text"></i>
                <span>Pengajuan</span>
            </a>
        </nav>

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

        <a href="{{ url('/potensi-desa') }}" class="back-link">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Potensi Desa
        </a>

        <!-- HERO -->
        <div class="detail-hero">
            <img
                src="{{ asset('Potensi Desa/Wisata/sumber_ubalan_renang.webp') }}"
                alt="Kolam renang alami Sumber Ubalan"
            >
            <div class="detail-hero-text">
                <span class="detail-category-badge">Wisata</span>
                <h1>Sumber Ubalan</h1>
                <div class="detail-hero-location">
                    <i class="bi bi-geo-alt-fill"></i>
                    Dusun Kalasan, Desa Jarak, Kec. Plosoklaten, Kab. Kediri
                </div>
            </div>
        </div>

        <!-- QUICK INFO BAR -->
        <div class="quick-info-bar">
            <div class="quick-info-item">
                <div class="quick-info-icon gold"><i class="bi bi-ticket-perforated-fill"></i></div>
                <div>
                    <div class="quick-info-label">Harga Tiket</div>
                    <div class="quick-info-value">
                        Weekdays Rp4.000
                        <small>Weekend (Sab–Min) Rp10.000</small>
                    </div>
                </div>
            </div>

            <div class="quick-info-item">
                <div class="quick-info-icon green"><i class="bi bi-clock-fill"></i></div>
                <div>
                    <div class="quick-info-label">Jam Operasional</div>
                    <div class="quick-info-value">
                        08.00 – 17.00 WIB
                        <small>Buka setiap hari</small>
                    </div>
                </div>
            </div>

            <div class="quick-info-item">
                <div class="quick-info-icon blue"><i class="bi bi-geo-alt-fill"></i></div>
                <div>
                    <div class="quick-info-label">Lokasi</div>
                    <div class="quick-info-value">
                        Dusun Kalasan
                        <small>±18 km timur Kota Kediri</small>
                    </div>
                </div>
            </div>

            <a
                href="https://www.google.com/maps/search/?api=1&query=Sumber+Ubalan+Desa+Jarak+Plosoklaten+Kediri"
                target="_blank"
                rel="noopener"
                class="maps-btn"
            >
                <i class="bi bi-map-fill"></i>
                Buka Maps
            </a>
        </div>

        <!-- LAYOUT 2 KOLOM -->
        <div class="detail-layout">

            <!-- KOLOM KONTEN -->
            <div>
                <div class="detail-card">
                    <h2>Tentang Sumber Ubalan</h2>
                    <p>
                        Rasakan keasrian dan kemurnian alam yang menenangkan di Sumber Ubalan,
                        destinasi wisata air impian yang menyuguhkan kesegaran mata air pegunungan
                        alami sepanjang tahun. Berbeda dari objek wisata air konvensional, Sumber
                        Ubalan menawarkan kejernihan air yang memukau begitu bening hingga kawanan
                        ikan kecil terlihat menari indah di dalamnya.
                    </p>
                    <p>
                        Kaya akan mineral alami yang diyakini mampu menyegarkan kembali tubuh dan
                        pikiran, setiap bilasan airnya menghadirkan sensasi relaksasi yang nyata.
                        Tersembunyi jauh dari hiruk-pikuk perkotaan, tempat ini menyajikan suasana
                        yang tenang, damai, dan asri, menjadikannya suaka sempurna bagi Anda yang
                        merindukan kedamaian dan ingin melepas penat di dekapan alam.
                    </p>
                </div>

                <div class="detail-card">
                    <h2>Aktivitas Seru di Sumber Ubalan</h2>

                    <div class="activity-item">
                        <div class="activity-number"><i class="bi bi-water"></i></div>
                        <div class="activity-text">
                            <h3>1. Sensasi Berenang di Kolam Alami</h3>
                            <p>
                                Salah satu aktivitas favorit di sini adalah berenang di kolam alami
                                yang terisi air jernih dari mata air. Kolam-kolam tersebut dikelilingi
                                oleh pepohonan hijau dan batuan alam yang menambah keasrian suasana.
                            </p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-number"><i class="bi bi-basket2-fill"></i></div>
                        <div class="activity-text">
                            <h3>2. Piknik</h3>
                            <p>
                                Bagi yang tidak ingin berenang, kamu masih bisa menikmati kesegaran
                                air dengan cara lainnya, seperti berendam di tepian kolam atau sekadar
                                mencelupkan kaki. Kamu juga bisa berpiknik di sekitar kolam bersama
                                orang-orang tersayang sambil menikmati bekal bawaan dan pemandangan
                                alam yang hijau.
                            </p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-number"><i class="bi bi-fire"></i></div>
                        <div class="activity-text">
                            <h3>3. Camping</h3>
                            <p>
                                Bagi kamu yang ingin menghabiskan waktu lebih lama di Sumber Ubalan,
                                ada fasilitas camping ground atau area perkemahan yang sangat cocok
                                untuk kegiatan berkemah. Nikmati suasana alam di malam hari, dengarkan
                                suara alam yang menenangkan, dan tidur di bawah bintang.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="detail-card">
                    <h2>Lokasi dan Akses</h2>
                    <p>
                        Wisata Sumber Ubalan terletak di Dusun Kalasan, Desa Jarak, Kecamatan
                        Plosoklaten, Kabupaten Kediri, Jawa Timur. Lokasinya berada sekitar 18
                        kilometer ke arah timur dari pusat Kota Kediri, atau sekitar 30 menit
                        perjalanan menggunakan kendaraan pribadi.
                    </p>
                    <p>
                        Jika ingin mencapai Sumber Ubalan, kamu dapat memulai perjalanan dari
                        Simpang Lima Gumul, Kediri. Dari sana, ikuti jalan menuju Ubalan dan
                        teruskan perjalanan hingga mencapai lokasi wisata. Jalan menuju Sumber
                        Ubalan cukup mudah diakses dan cocok untuk kendaraan roda dua maupun
                        roda empat.
                    </p>
                    <p>
                        Bagi kamu yang tidak membawa kendaraan pribadi, tersedia layanan
                        transportasi umum dari pusat Kota Kediri menuju Kecamatan Plosoklaten.
                        Setelah tiba di Plosoklaten, kamu bisa melanjutkan perjalanan menggunakan
                        ojek atau angkutan desa menuju Dusun Kalasan. Perlu diingat bahwa akses
                        transportasi umum menuju Sumber Ubalan terbatas, sehingga disarankan untuk
                        menggunakan kendaraan pribadi atau menyewa kendaraan untuk kenyamanan dan
                        efisiensi waktu.
                    </p>
                </div>
            </div>

            <!-- KOLOM GALERI -->
            <div class="gallery-sidebar">
                <div class="gallery-card">
                    <h2>Galeri Foto</h2>

                    <div class="gallery-photo">
                        <img
                            src="{{ asset('Potensi Desa/Wisata/sumber_ubalan_renang.webp') }}"
                            alt="Kolam renang alami Sumber Ubalan"
                        >
                    </div>

                    <div class="gallery-photo">
                        <img
                            src="{{ asset('Potensi Desa/Wisata/wisata_ubalan_taman.jpg') }}"
                            alt="Taman di sekitar Sumber Ubalan"
                        >
                    </div>

                    <div class="gallery-photo">
                        <img
                            src="{{ asset('Potensi Desa/Wisata/Sumber_Ubalan_Kediri_Permainan.jpg') }}"
                            alt="Wahana permainan di Sumber Ubalan"
                        >
                    </div>

                    <div class="gallery-photo">
                        <img
                            src="{{ asset('Potensi Desa/Wisata/ubalan_kediri_tradisi.jpg') }}"
                            alt="Tradisi dan budaya sekitar Sumber Ubalan"
                        >
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>