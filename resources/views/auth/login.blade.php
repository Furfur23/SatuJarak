<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk — SatuJarak</title>

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
            --error: #B42318;
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
    </style>
</head>

<body class="antialiased">
    <div class="grid min-h-screen md:grid-cols-[minmax(0,5fr)_minmax(0,6fr)]">

        {{-- Panel kiri: identitas --}}
        <aside class="hidden flex-col justify-between bg-[var(--ink)] p-12 text-white md:flex">
            <a href="{{ url('/') }}" class="font-display text-2xl font-bold">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SatuJarak" class="h-12 mr-2">
                Satu<span class="text-[var(--kunyit)]">Jarak</span>
            </a>
            <div>
                <p class="font-display max-w-sm text-4xl font-bold leading-tight">
                    Ajukan kerja sama riset atau KKN dengan Desa Jarak.
                </p>
                <p class="mt-4 max-w-sm leading-relaxed text-white/75">
                    Masuk untuk mengirim proposal dan memantau status pengajuan Anda.
                </p>
            </div>
            <p class="text-sm text-white/60">Desa Jarak, Kecamatan Plosoklaten, Kabupaten Kediri</p>
        </aside>

        {{-- Panel kanan: form --}}
        <main class="flex items-center justify-center px-5 py-12">
            <div class="w-full max-w-md">
                <a href="{{ url('/') }}" class="font-display mb-8 block text-xl font-bold md:hidden">
                    Satu<span class="text-[var(--leaf)]">Jarak</span>
                </a>

                <h1 class="font-display text-3xl font-bold">Masuk ke akun Anda</h1>
                <p class="mt-2 text-[var(--muted)]">Gunakan email dan kata sandi yang Anda daftarkan.</p>

                @if (session('status'))
                <p class="mt-6 rounded-md border border-[var(--leaf)]/30 bg-white px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="mt-8 space-y-5" novalidate>
                    @csrf

                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-semibold">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                            placeholder="nama@email.com"
                            @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                            class="w-full rounded-md border bg-white px-4 py-3 outline-none focus:border-[var(--leaf)] focus:ring-2 focus:ring-[var(--kunyit)] @error('email') border-[var(--error)] @else border-[var(--line)] @enderror">
                        @error('email')
                        <p id="email-error" class="mt-1.5 text-sm text-[var(--error)]">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-semibold">Kata sandi</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required autocomplete="current-password"
                                @error('password') aria-invalid="true" aria-describedby="password-error" @enderror
                                class="w-full rounded-md border bg-white py-3 pl-4 pr-20 outline-none focus:border-[var(--leaf)] focus:ring-2 focus:ring-[var(--kunyit)] @error('password') border-[var(--error)] @else border-[var(--line)] @enderror">
                            <button type="button" id="tampil" aria-controls="password" aria-pressed="false"
                                class="absolute right-2 top-1/2 -translate-y-1/2 rounded p-2 text-[var(--muted)] hover:text-[var(--leaf)] hover:bg-[var(--mist)] transition-colors"
                                title="Tampilkan kata sandi">

                                {{-- Ikon Mata Terbuka (Lihat) --}}
                                <svg id="ikon-mata" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                {{-- Ikon Mata Tercoret (Sembunyikan) - Disembunyikan secara default --}}
                                <svg id="ikon-mata-coret" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                        <p id="password-error" class="mt-1.5 text-sm text-[var(--error)]">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" id="masuk"
                        class="w-full rounded-md bg-[var(--ink)] px-5 py-3 font-semibold text-white hover:bg-[var(--leaf)] disabled:opacity-60">
                        Masuk
                    </button>
                </form>

                <p class="mt-8 text-sm text-[var(--muted)]">
                    Belum punya akun?
                    <a href="{{ route('daftar') }}" class="font-semibold text-[var(--leaf)] underline underline-offset-4">Daftar sebagai pemohon</a>
                </p>
                <p class="mt-3 text-sm">
                    <a href="{{ url('/') }}" class="text-[var(--muted)] underline underline-offset-4">Kembali ke beranda</a>
                </p>
            </div>
        </main>
    </div>

    <script>
        (function() {
            var pw = document.getElementById('password');
            var tombol = document.getElementById('tampil');
            var ikonMata = document.getElementById('ikon-mata');
            var ikonMataCoret = document.getElementById('ikon-mata-coret');
            tombol.addEventListener('click', function() {
                var tampil = pw.type === 'password';

                // Ubah tipe input
                pw.type = tampil ? 'text' : 'password';
                tombol.setAttribute('aria-pressed', tampil);
                tombol.title = tampil ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi';

                // Ganti ikon dengan toggle class 'hidden'
                if (tampil) {
                    ikonMata.classList.add('hidden');
                    ikonMataCoret.classList.remove('hidden');
                } else {
                    ikonMata.classList.remove('hidden');
                    ikonMataCoret.classList.add('hidden');
                }
            });

            document.querySelector('form').addEventListener('submit', function() {
                var b = document.getElementById('masuk');
                b.disabled = true;
                b.textContent = 'Memproses...';
            });
        })();
    </script>
</body>

</html>