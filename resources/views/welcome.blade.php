<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SatuJarak — Pintu layanan digital Desa Jarak</title>
    <meta name="description"
        content="Temukan semua layanan dan sistem informasi Desa Jarak, Kecamatan Plosoklaten, Kabupaten Kediri, dari satu alamat.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bricolage-grotesque:600,700|figtree:400,500,600" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --ink: #12332D;
            --leaf: #1F5B4A;
            --kunyit: #E8A317;
            --mist: #F2F5F1;
            --line: #D5DDD6;
            --muted: #4C6159;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 5rem;
        }

        body {
            font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
            background: var(--mist);
            color: var(--ink);
        }

        .font-display {
            font-family: 'Bricolage Grotesque', 'Figtree', sans-serif;
            letter-spacing: -0.02em;
        }

        :focus-visible {
            outline: 3px solid var(--kunyit);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
        }

        details>summary {
            list-style: none;
        }

        details>summary::-webkit-details-marker {
            display: none;
        }
    </style>
</head>

@php
    /*
     * DATA: kalau controller mengirim $layanans / $informasis / $potensis (dari tabel
     * layanan, informasi_desa, potensi_desa), data itu yang dipakai. Kalau tidak, dipakai
     * contoh di bawah. Ganti link_url dengan alamat asli tiap sistem.
     * 'kategori' (masyarakat | aparatur) belum ada di ERD, lihat catatan di balasan.
     */
    $layanans = $layanans ?? [
        [
            'nama_layanan' => 'Antrean Online Dukcapil',
            'deskripsi' => 'Ambil nomor antrean untuk layanan administrasi kependudukan.',
            'link_url' => 'https://antriandukcapil.kedirikab.go.id/',
            'logo' => 'images/logo_kediri.png',
            'kategori' => 'masyarakat',
        ],
        [
            'nama_layanan' => 'ESPPT-I',
            'deskripsi' => 'Layanan terkait SPPT pajak bumi dan bangunan.',
            'link_url' => '#',
            'logo' => 'images/logo_kediri.png',
            'kategori' => 'masyarakat',
        ],
        [
            'nama_layanan' => 'PESONA',
            'deskripsi' => 'Informasi profil dan data kependudukan desa.',
            'link_url' => 'https://play.google.com/store/apps/details?id=com.ruwindo.pesonakediri&hl=id',
            'logo' => 'images/logo_kediri.png',
            'kategori' => 'masyarakat',
        ],
        [
            'nama_layanan' => 'SIKSNG',
            'deskripsi' => 'Sistem informasi untuk administrasi aparatur desa.',
            'link_url' => '#',
            'kategori' => 'aparatur',
        ],
        [
            'nama_layanan' => 'SIPENAK (SIMNANGKIS)',
            'deskripsi' => 'Sistem pendukung pekerjaan administrasi desa.',
            'link_url' => '#',
            'kategori' => 'aparatur',
        ],
        [
            'nama_layanan' => 'Sistem Kependudukan',
            'deskripsi' => 'Pengelolaan data kependudukan oleh aparatur desa.',
            'link_url' => '#',
            'kategori' => 'aparatur',
        ],
        [
            'nama_layanan' => 'SIMKAH 4',
            'deskripsi' => 'Sistem pendukung administrasi desa.',
            'link_url' => 'https://simkah4.kemenag.go.id/',
            'logo' => 'images/logo_simkah_withbg.png',
            'kategori' => 'aparatur',
        ],
        [
            'nama_layanan' => 'Website Desa Jarak',
            'deskripsi' => 'Profil, berita, dan potensi Desa Jarak.',
            'link_url' => 'https://desajarak.com',
            'logo' => 'images/logo_kediri.png',
            'kategori' => 'masyarakat',
        ],
    ];

    $informasis = $informasis ?? [
        ['judul' => 'Contoh judul informasi desa pertama', 'kategori' => 'Pengumuman', 'created_at' => '2026-09-01'],
        ['judul' => 'Contoh judul informasi desa kedua', 'kategori' => 'Kegiatan', 'created_at' => '2026-08-28'],
        ['judul' => 'Contoh judul informasi desa ketiga', 'kategori' => 'Layanan', 'created_at' => '2026-08-20'],
    ];

    $potensis = $potensis ?? [
        [
            'nama_umkm' => 'Contoh UMKM Satu',
            'pemilik' => 'Nama pemilik',
            'deskripsi' => 'Deskripsi singkat produk atau jasa UMKM warga Desa Jarak.',
        ],
        [
            'nama_umkm' => 'Contoh UMKM Dua',
            'pemilik' => 'Nama pemilik',
            'deskripsi' => 'Deskripsi singkat produk atau jasa UMKM warga Desa Jarak.',
        ],
        [
            'nama_umkm' => 'Contoh UMKM Tiga',
            'pemilik' => 'Nama pemilik',
            'deskripsi' => 'Deskripsi singkat produk atau jasa UMKM warga Desa Jarak.',
        ],
    ];
@endphp

<body class="antialiased">

    {{-- NAVBAR --}}
    <header class="sticky top-0 z-40 border-b border-[var(--line)] bg-[var(--mist)]/95 backdrop-blur">
        <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-5">
            <a href="{{ url('/') }}" class="font-display flex items-center text-xl font-bold text-[var(--ink)]">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SatuJarak" class="h-12 mr-2">
                Satu<span class="text-[var(--leaf)]">Jarak</span>
            </a>

            <nav class="hidden items-center gap-7 text-sm font-medium md:flex" aria-label="Navigasi utama">
                <a href="#layanan" class="hover:underline underline-offset-4">Layanan</a>
                <a href="#informasi" class="hover:underline underline-offset-4">Informasi desa</a>
                <a href="#potensi" class="hover:underline underline-offset-4">Potensi desa</a>
                <a href="#kerja-sama" class="hover:underline underline-offset-4">Kerja sama</a>
                @auth
                    <a href="{{ route('pengajuan.index') }}"
                        class="rounded-md bg-[var(--ink)] px-4 py-2 text-white hover:bg-[var(--leaf)]">Pengajuan Saya</a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md bg-[var(--ink)] px-4 py-2 text-white hover:bg-[var(--leaf)]">Masuk</a>
                @endauth
            </nav>

            {{-- Menu mobile tanpa JavaScript --}}
            <details class="relative md:hidden">
                <summary class="cursor-pointer rounded-md border border-[var(--line)] px-3 py-2 text-sm font-medium">
                    Menu</summary>
                <div
                    class="absolute right-0 mt-2 flex w-56 flex-col gap-1 rounded-lg border border-[var(--line)] bg-white p-2 text-sm shadow-lg">
                    <a href="#layanan" class="rounded px-3 py-2 hover:bg-[var(--mist)]">Layanan</a>
                    <a href="#informasi" class="rounded px-3 py-2 hover:bg-[var(--mist)]">Informasi desa</a>
                    <a href="#potensi" class="rounded px-3 py-2 hover:bg-[var(--mist)]">Potensi desa</a>
                    <a href="#kerja-sama" class="rounded px-3 py-2 hover:bg-[var(--mist)]">Kerja sama</a>
                    @auth
                        <a href="{{ route('pengajuan.index') }}"
                            class="rounded bg-[var(--ink)] px-3 py-2 text-center font-medium text-white">Pengajuan Saya</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded bg-[var(--ink)] px-3 py-2 text-center font-medium text-white">Masuk</a>
                    @endauth
                </div>
            </details>
        </div>
    </header>

    <main>
        {{-- HERO --}}
        <section class="bg-[var(--ink)] text-white">
            <div class="mx-auto max-w-6xl px-5 pb-16 pt-14 md:pb-24 md:pt-20">
                <p class="text-sm text-white/70">Desa Jarak, Kecamatan Plosoklaten, Kabupaten Kediri</p>
                <h1 class="font-display mt-4 max-w-3xl text-4xl font-bold leading-[1.05] sm:text-5xl md:text-6xl">
                    Semua layanan Desa Jarak, dari satu alamat.
                </h1>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-white/80">
                    Tidak perlu lagi mengingat alamat tiap website. Cari layanan yang Anda butuhkan, lalu buka langsung.
                </p>

                <form role="search" class="mt-9 max-w-2xl" onsubmit="return false">
                    <label for="cari" class="sr-only">Cari layanan</label>
                    <div
                        class="flex items-center gap-3 rounded-lg bg-white px-4 py-3 text-[var(--ink)] ring-2 ring-transparent focus-within:ring-[var(--kunyit)]">
                        <svg class="h-5 w-5 shrink-0 text-[var(--muted)]" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="11" cy="11" r="7" />
                            <path d="m20 20-3.5-3.5" />
                        </svg>
                        <input id="cari" type="search" autocomplete="off"
                            placeholder="Cari layanan, misalnya antrean Dukcapil"
                            class="w-full bg-transparent text-base outline-none placeholder:text-[var(--muted)]/70">
                    </div>
                </form>
            </div>
        </section>

        {{-- DIREKTORI LAYANAN --}}
        <section id="layanan" class="mx-auto max-w-6xl px-5 py-14 md:py-20">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="font-display text-3xl font-bold">Daftar layanan</h2>
                    <p id="hitung" class="mt-1 text-[var(--muted)]" aria-live="polite"></p>
                </div>

                <div class="inline-flex rounded-lg border border-[var(--line)] bg-white p-1 text-sm font-medium"
                    role="group" aria-label="Filter pengguna">
                    <button type="button" data-filter="semua" class="filter-btn rounded-md px-4 py-2">Semua</button>
                    <button type="button" data-filter="masyarakat"
                        class="filter-btn rounded-md px-4 py-2">Masyarakat</button>
                    <button type="button" data-filter="aparatur" class="filter-btn rounded-md px-4 py-2">Aparatur
                        desa</button>
                </div>
            </div>

            <ul id="daftar" class="mt-8 divide-y divide-[var(--line)] border-y border-[var(--line)]">
                @foreach ($layanans as $l)
                    @php
                        $nama = data_get($l, 'nama_layanan');
                        $kat = data_get($l, 'kategori', 'masyarakat');
                    @endphp
                    <li class="layanan-item" data-kategori="{{ $kat }}"
                        data-teks="{{ strtolower($nama . ' ' . data_get($l, 'deskripsi')) }}">
                        <a href="{{ data_get($l, 'link_url', '#') }}" target="_blank" rel="noopener noreferrer"
                            class="group grid grid-cols-[auto_1fr_auto] items-center gap-4 py-5 hover:bg-white sm:px-3">
                            <span
                                class="font-display flex h-12 w-12 items-center justify-center rounded-lg bg-[var(--leaf)] text-lg font-bold text-white"
                                aria-hidden="true">
                                {{-- {{ strtoupper(mb_substr($nama, 0, 1)) }} --}}
                                @if (data_get($l, 'logo'))
                                    <img src="{{ asset(data_get($l, 'logo')) }}" alt=""
                                        class="h-10 w-10 object-contain">
                                @else
                                    {{ strtoupper(mb_substr($nama, 0, 1)) }}
                                @endif
                            </span>
                            <span>
                                <span
                                    class="block text-lg font-semibold group-hover:underline underline-offset-4">{{ $nama }}</span>
                                <span
                                    class="mt-0.5 block max-w-xl text-[var(--muted)]">{{ data_get($l, 'deskripsi') }}</span>
                            </span>
                            <span class="hidden flex-col items-end gap-1 text-sm sm:flex">
                                <span class="rounded-full border border-[var(--line)] px-3 py-0.5 text-[var(--muted)]">
                                    {{ $kat === 'aparatur' ? 'Aparatur desa' : 'Masyarakat' }}
                                </span>
                                <span class="font-medium text-[var(--leaf)]">Buka layanan</span>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <p id="kosong" class="hidden py-10 text-center text-[var(--muted)]">
                Tidak ada layanan yang cocok. Coba kata kunci lain atau pilih "Semua".
            </p>
        </section>

        {{-- INFORMASI DESA --}}
        <section id="informasi" class="border-t border-[var(--line)] bg-white">
            <div class="mx-auto max-w-6xl px-5 py-14 md:py-20">
                <h2 class="font-display text-3xl font-bold">Informasi desa</h2>
                <ul class="mt-8 divide-y divide-[var(--line)] border-y border-[var(--line)]">
                    @foreach ($informasis as $i)
                        <li class="flex flex-col gap-1 py-5 sm:flex-row sm:items-baseline sm:justify-between sm:gap-8">
                            <div>
                                <span
                                    class="text-sm font-medium text-[var(--leaf)]">{{ data_get($i, 'kategori') }}</span>
                                <p class="text-lg font-semibold">{{ data_get($i, 'judul') }}</p>
                            </div>
                            <time class="shrink-0 text-sm text-[var(--muted)]"
                                datetime="{{ \Illuminate\Support\Carbon::parse(data_get($i, 'created_at'))->toDateString() }}">
                                {{ \Illuminate\Support\Carbon::parse(data_get($i, 'created_at'))->translatedFormat('j F Y') }}
                            </time>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        {{-- POTENSI DESA --}}
        <section id="potensi" class="mx-auto max-w-6xl px-5 py-14 md:py-20">
            <div class="flex items-center justify-between">
                <h2 class="font-display text-3xl font-bold">Potensi desa</h2>
                <a href="{{ route('potensi-desa') }}" class="font-semibold text-primary hover:underline">
                    Lihat lebih detail
                </a>
            </div>
            <p class="mt-1 max-w-xl text-[var(--muted)]">Usaha warga Desa Jarak yang bisa Anda hubungi langsung.</p>

            <div class="mt-8 grid gap-x-10 gap-y-8 md:grid-cols-3">
                @foreach ($potensis as $p)
                    <article class="border-t-4 border-[var(--kunyit)] pt-4">
                        <h3 class="font-display text-xl font-bold">{{ data_get($p, 'nama_umkm') }}</h3>
                        <p class="text-sm text-[var(--muted)]">Dikelola {{ data_get($p, 'pemilik') }}</p>
                        <p class="mt-3 leading-relaxed">{{ data_get($p, 'deskripsi') }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- KERJA SAMA --}}
        <section id="kerja-sama" class="bg-[var(--leaf)] text-white">
            <div
                class="mx-auto flex max-w-6xl flex-col gap-6 px-5 py-14 md:flex-row md:items-center md:justify-between md:py-16">
                <div class="max-w-xl">
                    <h2 class="font-display text-3xl font-bold">Ingin riset atau KKN di Desa Jarak?</h2>
                    <p class="mt-2 leading-relaxed text-white/85">
                        Masuk dengan akun Anda, isi data kerja sama, dan unggah proposal. Status pengajuan bisa dipantau
                        dari akun yang sama.
                    </p>
                </div>
                <<div class="flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('pengajuan.index') }}"
                            class="rounded-md bg-[var(--kunyit)] px-6 py-3 font-semibold text-[var(--ink)] hover:brightness-95">Buat
                            Pengajuan Baru</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="rounded-md bg-[var(--kunyit)] px-6 py-3 font-semibold text-[var(--ink)] hover:brightness-95">Masuk
                            untuk mengajukan</a>
                        <a href="{{ route('daftar') }}"
                            class="rounded-md border border-white/60 px-6 py-3 font-semibold hover:bg-white/10">Buat
                            akun</a>
                    @endauth
            </div>
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[var(--ink)] text-sm text-white/75">
        <div class="mx-auto flex max-w-6xl flex-col gap-3 px-5 py-8 md:flex-row md:justify-between">
            <p>
                <span class="font-semibold text-white">Pemerintah Desa Jarak</span><br>
                Kecamatan Plosoklaten, Kabupaten Kediri, Jawa Timur
            </p>
            <p class="md:text-right">
                Dikembangkan oleh mahasiswa UNESA, Unesatechquest 5,<br>
                bersama Yayasan Sagasitas Indonesia.
            </p>
        </div>
    </footer>

    <script>
        (function() {
            var items = Array.prototype.slice.call(document.querySelectorAll('.layanan-item'));
            var input = document.getElementById('cari');
            var buttons = document.querySelectorAll('.filter-btn');
            var hitung = document.getElementById('hitung');
            var kosong = document.getElementById('kosong');
            var daftar = document.getElementById('daftar');
            var aktif = 'semua';

            function terapkan() {
                var q = input.value.trim().toLowerCase();
                var tampil = 0;
                items.forEach(function(li) {
                    var cocokKat = aktif === 'semua' || li.dataset.kategori === aktif;
                    var cocokTeks = !q || li.dataset.teks.indexOf(q) !== -1;
                    var ok = cocokKat && cocokTeks;
                    li.hidden = !ok;
                    if (ok) tampil++;
                });
                hitung.textContent = tampil + ' dari ' + items.length + ' layanan';
                kosong.classList.toggle('hidden', tampil !== 0);
                daftar.classList.toggle('hidden', tampil === 0);
            }

            function tandai() {
                buttons.forEach(function(b) {
                    var on = b.dataset.filter === aktif;
                    b.setAttribute('aria-pressed', on);
                    b.style.background = on ? 'var(--ink)' : 'transparent';
                    b.style.color = on ? '#fff' : 'inherit';
                });
            }

            buttons.forEach(function(b) {
                b.addEventListener('click', function() {
                    aktif = b.dataset.filter;
                    tandai();
                    terapkan();
                });
            });
            input.addEventListener('input', function() {
                terapkan();
                if (input.value.trim()) document.getElementById('layanan').scrollIntoView({
                    block: 'start'
                });
            });

            tandai();
            terapkan();
        })();
    </script>
</body>

</html>
