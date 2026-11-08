<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Web - SatuJarak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <!-- style-zone -->
    <style>
        :root {
            --forest: #0B3828;
            --mint: #70C69B;
            --gold: #D9A36A;
            --gold-light: #F9E1B9;
            --pink-light: #F9C8D7;
            --text: #173D30;
            --muted: #708078;
            --border: #E5ECE8;

            --c-forest: var(--forest);
            --c-heading: var(--forest);
            --c-orange: var(--gold);
            --c-mint: var(--mint);
            --c-mint-soft: #DCEFE6;
            --c-mint-mid: #BFE4D2;
            --c-peach: var(--gold-light);
            --c-peach-text: #B7791F;
            --c-pink: var(--pink-light);
            --c-pink-text: #D6336C;
            --c-red-dot: #FF4D6D;

            --bg-page: #F7FAF8;
            --card-bg: #FFFFFF;
            --text-main: #1C231F;
            --text-muted: var(--muted);
            --border-soft: var(--border);

            --font-main: "Inter", "Segoe UI", Arial, sans-serif;
            --shadow-card: 0 2px 4px rgba(11, 59, 44, 0.04), 0 10px 28px rgba(11, 59, 44, 0.07);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Inter", "Segoe UI", Arial, sans-serif;

        }

        body {
            font-family: var(--font-main);
            background: var(--bg-page);
            color: var(--text-main);
            position: absolute;
            overflow-x: hidden;
        }

        .header img {
            width: 5rem;
            height: 5rem;
        }

        .header .title-container {
            display: flex;
            gap: .5rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #0B3828;
            position: absolute;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 9999999;
            padding: 0 1rem;
            overflow: hidden;
        }

        .header .title {
            padding-top: 1.6rem;
            color: #DCEFE6;
        }

        .header .title h3 {
            font-size: 1.5rem;
        }

        .header nav {
            display: flex;
            gap: 2rem;
            text-decoration: none;
        }

        .header nav a {
            color: #DCEFE6;
        }

        a {
            text-decoration: none;
        }

        .hero .hero-container .image img {
            width: 32rem;
            height: 25rem;
            border-radius: 2rem;
            margin-top: 2rem;
        }

        .hero {
            margin-top: 3rem;
            padding: 2.5rem;
            background-color: #70C69B;
            overflow-y: hidden;
        }

        .hero .hero-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            border-radius: 2rem;
        }

        .hero .hero-container .content h3 {
            line-height: 1.5rem;
            color: #DCEFE6;
            text-align: start;
            width: 25rem;
            min-width: 300px;
            font-weight: bold;
        }

        .hero .hero-container .content p {
            color: white;
            padding-right: -.5rem;
            font-weight: light;
            width: 30rem;
            text-align: start;
            margin-top: 1rem;
        }

        .hero .hero-container .content .btn {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
        }

        .hero .hero-container .content .btn a {
            padding: 8px 16px;
            background-color: #DCEFE6;
            border-radius: 1rem;
            color: var(--text);
            cursor: pointer
        }

        .hero .hero-container .content .btn a:hover {
            background-color: #0B3828;
            color: #BFE4D2;
        }

        /* section pemesanan */
        .pemesanan {
            margin-top: 3rem;
            padding: 2.5rem;
            background-color: #D9A36A
        }

        .pemesanan .title-pesan {
            text-align: center;
            color: #0B3828;
        }

        .pemesanan .container-pesan {
            display: flex;
            gap: 5rem;
            margin-top: 3rem;
        }

        .pemesanan .container-pesan .block {
            padding: 2rem;
            background-color: #173D30;
            border-radius: 2rem;
        }

        .pemesanan .container-pesan .block .block-content {
            padding: 1rem;
        }

        .pemesanan .container-pesan .block .block-content h3 {
            color: #DCEFE6;
            text-align: start;
        }

        .pemesanan .container-pesan .block .block-content h4 {
            color: #DCEFE6;
        }

        .pemesanan .container-pesan .block .block-content p {
            color: #DCEFE6;
            text-align: start;
        }

        /* produk-zone */
        .produk {
            margin-top: 3rem;
            padding: 2rem;
        }

        .produk .title-produk h3,
        p {
            color: #0B3828;
            text-align: center;
        }

        .produk .produk-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            align-items: center;
            padding-top: 3rem;
        }

        .produk .produk-container .block-produk img {
            display: block;
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .produk .produk-container .block-produk {
            box-shadow: 1px 1px 10px grey;
            overflow: hidden;
            border-radius: 10px;
        }

        .produk .produk-container .block-produk .content-produk h3 {
            font-size: 1rem;
            font-weight: bold;
        }

        .produk .produk-container .block-produk .content-produk p {
            text-align: start;
      
        }
         .produk .produk-container .block-produk .content-produk{
            padding: .5rem;
         }
    </style>

    <div class="header">
        <div class="title-container">
            <img src="/images/logo.png" alt="">
            <div class="title">
                <h3>SatuJarak</h3>
            </div>

        </div>

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
                <h3>Selamat Datang
                    di pusat UMKM Desa Jarak</h3>
                <p>Desa jarak Desa Jarak merupakan salah satu desa yang ada di Kecamatan Plosoklaten, Kabupaten Kediri,
                    yang memiliki produk unggulan UMKM berupa produk jadi, Kerajinan, dan masih banyak lagi. </p>
                <div class="btn">
                    <a href="">Lihat Produk</a>
                    <a href="">Lihat Kerajinan</a>
                </div>
            </div>
            <div class="image">
                <img src="images/logoumkm.jpg" alt="">
            </div>
        </div>
    </section>


    <section class="pemesanan">
        <div class="title-pesan">
            <h3>Cara Pemesanan? mudah saja</h3>
        </div>
        <div class="container-pesan">
            <div class="block">
                <div class="block-content">
                    <h3>1</h3>
                    <h4>Pilih Produk</h4>
                    <p>Telusuri kaatlog dan pilih produk yang kamu suka</p>
                </div>
            </div>
            <div class="block">
                <div class="block-content">
                    <h3>2</h3>
                    <h4>Chat via WhatsApp</h4>
                    <p>Hubungi nomor kontak yang tertera pada gambar produk</p>
                </div>
            </div>
            <div class="block">
                <div class="block-content">
                    <h3>3</h3>
                    <h4>Terima di rumah</h4>
                    <p>Sepakati pembayaran & pengiriman, atau ambil langsung</p>
                </div>
            </div>
        </div>
    </section>
    <section class="produk">
        <div class="title-produk">
            <h3>Produk Unggulan UMKM</h3>
            <p>Pilihan terlaris dari para pelaku usaha desa
                Temukan apa saja yang kamu butuhkan</p>
        </div>
        <div class="produk-container">
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/Antari_kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>Antari Kembang Goyang</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Laela Tul Khudriyah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec.Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081703551126</span>
                    </div>

                </div>
            </div>



        </div>
    </section>






































    <!-- javascript-zone -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>