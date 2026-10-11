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
        body { font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif; background: var(--mist); color: var(--ink); }
        .font-display { font-family: 'Bricolage Grotesque', 'Figtree', sans-serif; letter-spacing: -0.02em; }
        :focus-visible { outline: 3px solid var(--kunyit); outline-offset: 2px; }
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
                                    class="absolute right-2 top-1/2 -translate-y-1/2 rounded px-3 py-1 text-sm font-medium text-[var(--leaf)] hover:bg-[var(--mist)]">
                                Lihat
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
        (function () {
            var pw = document.getElementById('password');
            var tombol = document.getElementById('tampil');
            tombol.addEventListener('click', function () {
                var tampil = pw.type === 'password';
                pw.type = tampil ? 'text' : 'password';
                tombol.textContent = tampil ? 'Sembunyikan' : 'Lihat';
                tombol.setAttribute('aria-pressed', tampil);
            });
            document.querySelector('form').addEventListener('submit', function () {
                var b = document.getElementById('masuk');
                b.disabled = true;
                b.textContent = 'Memproses...';
            });
        })();
    </script>
</body>
</html> 