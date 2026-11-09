<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Web - SatuJarak</title>
    <script>document.documentElement.classList.add('js');</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- style-zone -->
    <style>
        :root {
            --forest: #0B3828;
            --forest-2: #173D30;
            --mint: #70C69B;
            --mint-soft: #DCEFE6;
            --mint-mid: #BFE4D2;
            --gold: #D9A36A;
            --gold-light: #F9E1B9;
            --text: #173D30;
            --text-main: #1C231F;
            --muted: #708078;
            --bg-page: #F7FAF8;
            --font-main: "Inter", "Segoe UI", Arial, sans-serif;
            --ease: cubic-bezier(.22, .8, .3, 1);
            --header-h: 4.5rem;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: var(--font-main); }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg-page);
            color: var(--text-main);
            overflow-x: hidden;
            padding-top: var(--header-h);
            -webkit-font-smoothing: antialiased;
        }

        a { text-decoration: none; color: inherit; }
        section { scroll-margin-top: calc(var(--header-h) + 1rem); }
        img { max-width: 100%; }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeUp { from { opacity: 0; transform: translateY(28px); } to { opacity: 1; transform: none; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floaty { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
        @keyframes drop { from { opacity: 0; transform: translateY(-100%); } to { opacity: 1; transform: none; } }

        .js .reveal { opacity: 0; transform: translateY(30px); transition: opacity .7s var(--ease), transform .7s var(--ease); }
        .js .reveal.visible { opacity: 1; transform: none; }

        /* ===== HEADER ===== */
        .header {
            position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
            height: var(--header-h);
            display: flex; justify-content: space-between; align-items: center;
            padding: 0 clamp(1rem, 4vw, 2.5rem);
            background: rgba(11, 56, 40, .92);
            backdrop-filter: blur(10px);
            animation: drop .6s var(--ease) both;
            transition: box-shadow .3s, background .3s;
        }
        .header.scrolled { box-shadow: 0 8px 28px rgba(11, 56, 40, .35); background: rgba(11, 56, 40, .98); }

        .header .title-container { display: flex; align-items: center; gap: .6rem; }
        .header .title-container img { width: 3.2rem; height: 3.2rem; object-fit: contain; transition: transform .4s var(--ease); }
        .header .title-container:hover img { transform: rotate(-8deg) scale(1.08); }
        .header .title h3 { color: var(--mint-soft); font-size: 1.3rem; font-weight: 800; letter-spacing: .3px; }

        .header nav { display: flex; gap: 1.8rem; align-items: center; }
        .header nav a {
            position: relative; color: var(--mint-soft);
            font-size: .92rem; font-weight: 500; padding: .35rem 0;
            transition: color .25s;
        }
        .header nav a::after {
            content: ""; position: absolute; left: 0; bottom: 0; height: 2px; width: 100%;
            background: var(--mint); border-radius: 2px;
            transform: scaleX(0); transform-origin: right; transition: transform .35s var(--ease);
        }
        .header nav a:hover { color: #fff; }
        .header nav a:hover::after { transform: scaleX(1); transform-origin: left; }

        .nav-check { display: none; }
        .nav-burger { display: none; color: var(--mint-soft); font-size: 1.9rem; cursor: pointer; line-height: 1; }

        /* ===== HERO ===== */
        .hero {
            position: relative; overflow: hidden;
            padding: clamp(2rem, 6vw, 4.5rem) clamp(1rem, 5vw, 3rem);
            background: linear-gradient(135deg, #70C69B 0%, #4FB184 55%, #3E9E75 100%);
        }
        .hero::before, .hero::after {
            content: ""; position: absolute; border-radius: 50%; background: rgba(255, 255, 255, .1); pointer-events: none;
        }
        .hero::before { width: 380px; height: 380px; top: -140px; left: -120px; }
        .hero::after { width: 260px; height: 260px; bottom: -100px; right: 35%; }

        .hero .hero-container {
            position: relative; z-index: 1;
            max-width: 1200px; margin: 0 auto;
            display: flex; justify-content: space-between; align-items: center; gap: 3rem; flex-wrap: wrap;
        }
        .hero .content { flex: 1 1 340px; animation: fadeUp .9s var(--ease) .15s both; }
        .hero .content h3 {
            color: #fff; font-size: clamp(1.8rem, 4vw, 2.8rem); line-height: 1.2; font-weight: 800; max-width: 26rem;
        }
        .hero .content p {
            color: rgba(255, 255, 255, .92); max-width: 32rem; margin-top: 1.2rem; line-height: 1.8; text-align: left; font-size: .98rem;
        }
        .hero .content .btn { display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 2rem; padding: 0; border: none; }
        .hero .content .btn a {
            padding: .75rem 1.5rem; border-radius: 999px; font-weight: 700; font-size: .9rem;
            background: var(--mint-soft); color: var(--forest);
            box-shadow: 0 8px 20px rgba(11, 56, 40, .18);
            transition: transform .3s var(--ease), background .3s, color .3s, box-shadow .3s;
        }
        .hero .content .btn a:nth-child(2) { background: transparent; color: #fff; box-shadow: inset 0 0 0 2px rgba(255, 255, 255, .85); }
        .hero .content .btn a:hover { background: var(--forest); color: var(--mint-mid); transform: translateY(-4px); box-shadow: 0 14px 28px rgba(11, 56, 40, .28); }

        .hero .image { flex: 0 1 460px; animation: fadeIn 1s ease .3s both; }
        .hero .image img {
            width: 100%; height: auto; max-height: 420px; object-fit: cover;
            border-radius: 2rem; background: var(--mint-soft);
            box-shadow: 0 25px 50px rgba(11, 56, 40, .3);
            animation: floaty 6s ease-in-out infinite;
        }

        /* ===== PEMESANAN ===== */
        .pemesanan {
            padding: clamp(2.5rem, 6vw, 4rem) clamp(1rem, 5vw, 3rem);
            background: linear-gradient(180deg, #E0B07A, var(--gold));
        }
        .pemesanan .title-pesan h3 { color: var(--forest); text-align: center; font-size: clamp(1.4rem, 3vw, 2rem); font-weight: 800; }
        .pemesanan .container-pesan {
            max-width: 1100px; margin: 2.5rem auto 0;
            display: flex; flex-wrap: wrap; gap: 1.5rem;
        }
        .pemesanan .container-pesan .block {
            flex: 1 1 250px; padding: 1.6rem; border-radius: 1.5rem;
            background: var(--forest-2);
            box-shadow: 0 10px 24px rgba(11, 56, 40, .25);
            transition: transform .4s var(--ease), box-shadow .4s, background .4s;
        }
        .pemesanan .container-pesan .block:hover { transform: translateY(-8px); box-shadow: 0 20px 36px rgba(11, 56, 40, .38); background: var(--forest); }
        .pemesanan .block-content h3 {
            display: inline-flex; align-items: center; justify-content: center;
            width: 2.6rem; height: 2.6rem; margin-bottom: 1rem;
            border-radius: 50%; background: var(--mint); color: var(--forest); font-weight: 800;
            transition: transform .4s var(--ease);
        }
        .pemesanan .block:hover .block-content h3 { transform: scale(1.15) rotate(-6deg); }
        .pemesanan .block-content h4 { color: var(--mint-soft); font-size: 1.1rem; font-weight: 700; margin-bottom: .4rem; }
        .pemesanan .block-content p { color: var(--mint-mid); text-align: left; font-size: .9rem; line-height: 1.7; }

        /* ===== PRODUK & KERAJINAN (shared) ===== */
        .produk, .kerajinan { padding: clamp(2.5rem, 6vw, 4rem) clamp(1rem, 5vw, 3rem); }
        .produk .title-produk h3, .kerajinan .title-kerajinan h3 { text-align: center; font-size: clamp(1.4rem, 3vw, 2rem); font-weight: 800; }
        .produk .title-produk h3 { color: var(--forest); }
        .produk-paragraf { text-align: center; color: var(--muted); margin-top: .5rem; line-height: 1.7; }

        .produk-container, .kerajinan-container {
            max-width: 1200px; margin: 2.5rem auto 0;
            display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.8rem;
        }
        .card-link { display: block; height: 100%; }

        .block-produk {
            height: 100%; overflow: hidden; border-radius: 1.2rem; background: #fff;
            box-shadow: 0 4px 14px rgba(11, 56, 40, .08);
            transition: transform .4s var(--ease), box-shadow .4s;
        }
        .block-produk:hover { transform: translateY(-8px); box-shadow: 0 22px 40px rgba(11, 56, 40, .18); }

        .block-produk .img-wrap { overflow: hidden; background: linear-gradient(135deg, var(--mint-soft), #F0F6E8); }
        .block-produk img { display: block; width: 100%; height: 240px; object-fit: cover; transition: transform .6s var(--ease); }
        .block-produk:hover img { transform: scale(1.08); }

        .content-produk { padding: 1.1rem 1.2rem 1.3rem; }
        .content-produk h3 { color: var(--forest); font-size: 1rem; font-weight: 800; line-height: 1.35; margin-bottom: .7rem; text-transform: uppercase; letter-spacing: .2px; }
        .info { display: flex; gap: .4rem; font-size: .82rem; line-height: 1.6; margin-top: .3rem; }
        .info .label { flex-shrink: 0; min-width: 52px; font-weight: 700; color: var(--forest); }
        .info .value { color: var(--muted); }

        /* kerajinan (dark) */
        .kerajinan { background: linear-gradient(180deg, var(--forest-2), var(--forest)); color: var(--mint-soft); margin-top: 3rem; }
        .kerajinan .title-kerajinan h3 { color: var(--mint-soft); }
        .kerajinan .title-kerajinan p { color: var(--mint-mid); text-align: center; margin: .5rem auto 0; max-width: 40rem; line-height: 1.7; }
        .kerajinan .kerajinan-container { grid-template-columns: repeat(auto-fit, minmax(260px, 340px)); justify-content: center; }
        .kerajinan .block-produk { background: #1F4A3B; box-shadow: 0 6px 18px rgba(0, 0, 0, .25); cursor: pointer; }
        .kerajinan .block-produk:hover { box-shadow: 0 22px 44px rgba(0, 0, 0, .45); }
        .kerajinan .block-produk .img-wrap { background: #2A5B49; }
        .kerajinan .content-produk h3 { color: var(--mint-soft); }
        .kerajinan .info .label { color: var(--gold-light); }
        .kerajinan .info .value { color: var(--mint-mid); }

        /* ===== FOOTER ===== */
        footer { padding: clamp(2.5rem, 6vw, 4rem) clamp(1rem, 5vw, 3rem); background: linear-gradient(180deg, #70C69B, #5BB488); }
        footer h3 { color: var(--forest); text-align: center; font-size: clamp(1.4rem, 3vw, 2rem); font-weight: 800; }
        footer .footer-container { display: flex; justify-content: center; margin-top: 2rem; }
        footer iframe {
            width: 100%; max-width: 900px; height: 420px; border: 0; border-radius: 1.5rem;
            box-shadow: 0 18px 40px rgba(11, 56, 40, .3);
            transition: transform .4s var(--ease), box-shadow .4s;
        }
        footer iframe:hover { transform: translateY(-4px); box-shadow: 0 26px 50px rgba(11, 56, 40, .38); }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 860px) {
            .nav-burger { display: block; }
            .header nav {
                position: absolute; top: var(--header-h); left: 0; right: 0;
                flex-direction: column; align-items: stretch; gap: 0;
                background: var(--forest); padding: .5rem 1.2rem 1rem;
                max-height: 0; overflow: hidden; opacity: 0; padding-block: 0;
                transition: max-height .4s var(--ease), opacity .3s, padding .3s;
            }
            .header nav a { padding: .85rem 0; border-bottom: 1px solid rgba(220, 239, 230, .1); }
            .header nav a::after { display: none; }
            .nav-check:checked ~ nav { max-height: 360px; opacity: 1; padding-block: .5rem 1rem; }
            .hero .hero-container { justify-content: center; text-align: center; }
            .hero .content h3, .hero .content p { margin-left: auto; margin-right: auto; text-align: center; }
            .hero .content .btn { justify-content: center; }
            .hero .image { flex-basis: 100%; max-width: 420px; }
        }
        @media (max-width: 520px) {
            .produk-container { grid-template-columns: 1fr; }
            footer iframe { height: 320px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
            .js .reveal { opacity: 1; transform: none; }
        }
    </style>
</head>

<body>
    <div class="header" id="header">
        <div class="title-container">
            <img src="/images/logo.png" alt="Logo SatuJarak">
            <div class="title">
                <h3>SatuJarak</h3>
            </div>
        </div>

        <input type="checkbox" id="navCheck" class="nav-check">
        <label for="navCheck" class="nav-burger" aria-label="Buka menu"><i class="bi bi-list"></i></label>

        <nav>
            <a href="">Dashboard</a>
            <a href="">Potensi Desa</a>
            <a href="">Pengajuan</a>
            <a href="">Layanan</a>
            <a href="">UMKM</a>
        </nav>
    </div>

    <section class="hero">
        <div class="hero-container">
            <div class="content">
                <h3>Selamat Datang di pusat UMKM Desa Jarak</h3>
                <p>Desa Jarak merupakan salah satu desa yang ada di Kecamatan Plosoklaten, Kabupaten Kediri,
                    yang memiliki produk unggulan UMKM berupa produk jadi, Kerajinan, dan masih banyak lagi. </p>
                <div class="btn">
                    <a href="#produk">Lihat Produk</a>
                    <a href="#kerajinan">Lihat Kerajinan</a>
                </div>
            </div>
            <div class="image">
                <img src="/images/logoumkm.jpg" alt="UMKM Desa Jarak">
            </div>
        </div>
    </section>

    <section class="pemesanan">
        <div class="title-pesan reveal">
            <h3>Cara Pemesanan? Mudah saja</h3>
        </div>
        <div class="container-pesan">
            <div class="block reveal">
                <div class="block-content">
                    <h3>1</h3>
                    <h4>Pilih Produk</h4>
                    <p>Telusuri katalog dan pilih produk yang kamu suka</p>
                </div>
            </div>
            <div class="block reveal">
                <div class="block-content">
                    <h3>2</h3>
                    <h4>Chat via WhatsApp</h4>
                    <p>Hubungi nomor kontak yang tertera pada gambar produk</p>
                </div>
            </div>
            <div class="block reveal">
                <div class="block-content">
                    <h3>3</h3>
                    <h4>Terima di rumah</h4>
                    <p>Sepakati pembayaran &amp; pengiriman, atau ambil langsung</p>
                </div>
            </div>
        </div>
    </section>

    <section class="produk" id="produk">
        <div class="title-produk reveal">
            <h3>Produk Unggulan UMKM</h3>
            <p class="produk-paragraf">Pilihan terlaris dari para pelaku usaha desa.<br>Temukan apa saja yang kamu butuhkan</p>
        </div>
        <div class="produk-container">
            <div class="reveal">
            <a href="{{ route('detail-produk') }}" class="card-link">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/bolen_pisang_ash.jpeg" alt="BOLEN PISANG ASH" loading="lazy"></div>
                <div class="content-produk">
                    <h3>BOLEN PISANG ASH</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Nurry Nurhayati Yuski</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Dsn. Mloko, RT 04/RW 03, Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085736995477</span></div>
                </div>
            </div>
            </a>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/keripik_gothe.jpeg" alt="KERIPIK GOTHE JAJANAN NDESO" loading="lazy"></div>
                <div class="content-produk">
                    <h3>KERIPIK GOTHE JAJANAN NDESO</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Sriane</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 02/RW 05 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085607441974</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/kembang_goyang.jpeg" alt="KEMBANG GOYANG" loading="lazy"></div>
                <div class="content-produk">
                    <h3>KEMBANG GOYANG</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Mazroah</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 03/RW 06 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">081553670809</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/kemiri_bakery.jpeg" alt="KEMIRI BAKERY" loading="lazy"></div>
                <div class="content-produk">
                    <h3>KEMIRI BAKERY</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Sufyan</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 05/RW 05 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085895693754</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/bolu_jadul.jpeg" alt="BOLU JADUL" loading="lazy"></div>
                <div class="content-produk">
                    <h3>BOLU JADUL</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Sulistiani</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 01/RW 02 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085777736478</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/sambel_pecel_khas_kediri.jpeg" alt="SAMBAL PECEL KHAS KEDIRI" loading="lazy"></div>
                <div class="content-produk">
                    <h3>SAMBAL PECEL KHAS KEDIRI</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Sulistiani</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 01/RW 02 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085777736478</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/krupuk_rambak.jpeg" alt="KRUPUK RAMBAK TAPIOKA" loading="lazy"></div>
                <div class="content-produk">
                    <h3>KRUPUK RAMBAK TAPIOKA</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Setya Eka Kristanto</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Dsn. Kalasan Ds. Jarak RT 04/RW 08 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085790470092</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/keripik_gothe.jpeg" alt="KERIPIK GOTHE" loading="lazy"></div>
                <div class="content-produk">
                    <h3>KERIPIK GOTHE</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Miftahul Jannah</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 01/RW 06 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085735337410</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/stick_labu.jpeg" alt="STICK LABU" loading="lazy"></div>
                <div class="content-produk">
                    <h3>STICK LABU</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Siti Maryam</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 05/RW 05 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085606022247</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/peyek_kriuk.jpeg" alt="Peyek Kriuk Mbak Titin" loading="lazy"></div>
                <div class="content-produk">
                    <h3>Peyek Kriuk Mbak Titin</h3>
                    <div class="info"><span class="label">Pemilik:</span><span class="value">Kristiana</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Ds. Jarak RT 05/RW 03 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085736680383</span></div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="kerajinan" id="kerajinan">
        <div class="title-kerajinan reveal">
            <h3>Produk Kerajinan UMKM</h3>
            <p>Usaha ini merupakan kerajinan tangan asli warga Desa Jarak yang
                telah diproduksi secara mandiri sejak tahun 2018.</p>
        </div>
        <div class="kerajinan-container">
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/SUPARI_BLANGKON.png" alt="SUPARI BLANGKON" loading="lazy"></div>
                <div class="content-produk">
                    <h3>SUPARI BLANGKON</h3>
                    <div class="info"><span class="label">Harga:</span><span class="value">Rp14.000 - Rp150.000</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Dsn. Jarak Kidul Ds. Jarak Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085655367521</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/NUR_ADANU_CRAFT.jpg" alt="NUR ADANU CRAFT" loading="lazy"></div>
                <div class="content-produk">
                    <h3>NUR ADANU CRAFT</h3>
                    <div class="info"><span class="label">Harga:</span><span class="value">Rp7.000 - Rp110.000</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Dsn. Jarak Lor Ds. Jarak Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085853668333</span></div>
                </div>
            </div>
            </div>
            <div class="reveal">
            <div class="block-produk">
                <div class="img-wrap"><img src="/images/riff_art.jpg" alt="RIFF ART" loading="lazy"></div>
                <div class="content-produk">
                    <h3>RIFF ART</h3>
                    <div class="info"><span class="label">Harga:</span><span class="value">Rp200.000 - Rp1.000.000</span></div>
                    <div class="info"><span class="label">Lokasi:</span><span class="value">Dsn. Sagi Ds. Jarak RT 05/RW 05 Kec. Plosoklaten</span></div>
                    <div class="info"><span class="label">Kontak:</span><span class="value">085936153446</span></div>
                </div>
            </div>
            </div>
        </div>
    </section>

    <footer>
        <h3 class="reveal">Alamat Kami</h3>
        <div class="footer-container reveal">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46213.41738325836!2d112.12777087204466!3d-7.877575829088392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78f5eec832ce1f%3A0x2224716a3c5c4c53!2sJarak%2C%20Kec.%20Plosoklaten%2C%20Kabupaten%20Kediri%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1794120849270!5m2!1sid!2sid"
                loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Peta Desa Jarak"></iframe>
        </div>
    </footer>

    <!-- javascript-zone -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bayangan header saat di-scroll
        const header = document.getElementById('header');
        const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 10);
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();

        // Animasi muncul saat di-scroll (dengan jeda bertahap per baris)
        const items = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) { e.target.classList.add('visible'); io.unobserve(e.target); }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
            items.forEach((el, i) => { el.style.transitionDelay = ((i % 4) * 90) + 'ms'; io.observe(el); });
        } else {
            items.forEach(el => el.classList.add('visible'));
        }

        // Tutup menu mobile setelah link diklik
        document.querySelectorAll('.header nav a').forEach(a =>
            a.addEventListener('click', () => document.getElementById('navCheck').checked = false));
    </script>
</body>

</html>