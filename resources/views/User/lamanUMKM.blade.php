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
            border: none;
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

        .produk .title-produk h3 {
            color: #0B3828;
            text-align: center;
        }

        .produl .title-produk p {
            text-align: center;
            color: black;
        }

        .kerajinan,
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

        .produk .produk-container .block-produk .content-produk {
            padding: .5rem;
        }

        .produk-paragraf {
            text-align: center;
            color: #0B3828;
        }

        /* kerajinan-zone */
        .kerajinan {
            margin-top: 3rem;
            padding: 2rem;
            background-color: #173D30;
            color: #DCEFE6;
        }

        .kerajinan .title-kerajinan h3,
        p {
            color: #DCEFE6;
            text-align: center;
        }

        .kerajinan .kerajinan-container .block-produk img {
            display: block;
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .kerajinan .kerajinan-container .block-produk {
            box-shadow: 1px 1px 10px #38705d;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;

        }

        .kerajinan .kerajinan-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 4rem;
            margin-top: 2rem
        }

        .kerajinan .kerajinan-container .block-produk .content-produk {
            padding: .5rem;
        }

        /* footer-zone */
        footer {
            padding: 2rem;
            background-color: #70C69B;
            margin-top: 3rem;
        }

        footer h3 {
            color: #DCEFE6;
            text-align: center;
        }

        footer .footer-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2rem;
        }

        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 3rem;
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
                    <a href="#produk">Lihat Produk</a>
                    <a href="#kerajinan">Lihat Kerajinan</a>
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
    <section class="produk" id="produk">
        <div class="title-produk">
            <h3>Produk Unggulan UMKM</h3>
            <p class="produk-paragraf">Pilihan terlaris dari para pelaku usaha desa
                Temukan apa saja yang kamu butuhkan</p>
        </div>
        <div class="produk-container">
            <div class="block-produk">
                <img src="/images/bolen_pisang_ash.jpeg" alt="">
                <div class="content-produk">
                    <h3>BOLEN PISANG ASH</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Nurry Nurhayati Yuski</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Dsn. Mloko, RT 04/RW 03, Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085736995477</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/keripik_gothe.jpeg" alt="">
                <div class="content-produk">
                    <h3>KERIPIK GOTHE JAJANAN NDESO</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Sriane</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 02/RW 05 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085607441974</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/kembang_goyang.jpeg" alt="">
                <div class="content-produk">
                    <h3>KEMBANG GOYANG</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Mazroah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 03/RW 06 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">081553670809</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/kemiri_bakery.jpeg" alt="">
                <div class="content-produk">
                    <h3>KEMIRI BAKERY</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Sufyan</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085895693754</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/bolu_jadul.jpeg" alt="">
                <div class="content-produk">
                    <h3>BOLU JADUL</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Sulistiani</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 01/RW 02 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085777736478</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/sambel_pecel_khas_kediri.jpeg" alt="">
                <div class="content-produk">
                    <h3>SAMBAL PECEL KHAS KEDIRI</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Sulistiani</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 01/RW 02 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085777736478</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/krupuk_rambak.jpeg" alt="">
                <div class="content-produk">
                    <h3>KRUPUK RAMBAK TAPIOKA</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Setya Eka Kristanto</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Dsn. Kalasan Ds. Jarak RT 04/RW 08 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085790470092</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/keripik_gothe.jpeg" alt="">
                <div class="content-produk">
                    <h3>KERIPIK GOTHE</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Miftahul Jannah</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 01/RW 06 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085735337410</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/stick_labu.jpeg" alt="">
                <div class="content-produk">
                    <h3>STICK LABU</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Siti Maryam</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 05 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085606022247</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/peyek_kriuk.jpeg" alt="">
                <div class="content-produk">
                    <h3>Peyek Kriuk Mbak Titin</h3>
                    <div class="info">
                        <span class="label">Pemilik:</span>
                        <span class="value">Kristiana</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Ds. Jarak RT 05/RW 03 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085736680383</span>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="kerajinan" id="kerajinan">
        <div class="title-kerajinan">
            <h3>Produk Kerajinan UMKM</h3>
            <p>Usaha ini merupakan kerajinan tangan asli warga Desa Jarak yang
                telah diproduksi secara mandiri sejak tahun 2018. .</p>
        </div>
        <div class="kerajinan-container">
            <div class="block-produk">
                <img src="/images/SUPARI_BLANGKON.png" alt="">
                <div class="content-produk">
                    <h3>SUPARI BLANGKON</h3>
                    <div class="info">
                        <span class="label">Harga:</span>
                        <span class="value">Rp14.000 - Rp150.000</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Dsn. Jarak Kidul Ds. Jarak Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085655367521</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/NUR_ADANU_CRAFT.jpg" alt="">
                <div class="content-produk">
                    <h3>NUR ADANU CRAFT</h3>
                    <div class="info">
                        <span class="label">Harga:</span>
                        <span class="value">Rp7.000 - Rp110.000</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Dsn. Jarak Lor Ds. Jarak Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085853668333</span>
                    </div>

                </div>
            </div>
            <div class="block-produk">
                <img src="/images/riff_art.jpg" alt="">
                <div class="content-produk">
                    <h3>RIFF ART</h3>
                    <div class="info">
                        <span class="label">Harga:</span>
                        <span class="value">Rp200.000 - Rp1.000.000</span>
                    </div>
                    <div class="info">
                        <span class="label">Lokasi:</span>
                        <span class="value">Dsn. Sagi Ds. Jarak RT 05/RW 05 Kec. Plosoklaten</span>
                    </div>
                    <div class="info">
                        <span class="label"> Kontak:</span>
                        <span class="value">085936153446</span>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <footer>
        <h3>Alamat Kami</h3>

        <div class="footer-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46213
    .41738325836!2d112.12777087204466!3d-7.877575829088392!2m3!1f0!2f0!3f0!3m2
    !1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78f5eec832ce1f%3A0x2224716a3c5c4c53!2sJarak%2C%20Kec.%20Plosoklaten%2C%20Kabupaten%20Kediri%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1794120849270!5m2!1sid!2sid"
                width="900" height="450" style="border:0;"></iframe>
        </div>






    </footer>





































    <!-- javascript-zone -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>