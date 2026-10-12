<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar — SatuJarak</title>

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
                    Buat akun untuk mengajukan kerja sama dengan Desa Jarak.
                </p>
                <p class="mt-4 max-w-sm leading-relaxed text-white/75">
                    Satu akun cukup untuk mengirim proposal riset atau KKN dan memantau statusnya.
                </p>
            </div>
            <p class="text-sm text-white/60">Desa Jarak, Kecamatan Plosoklaten, Kabupaten Kediri</p>
        </aside>

        {{-- Panel kanan: form --}}
        <main class="flex items-center justify-center px-5 py-12">
            <div class="w-full max-w-md">
                <a href="{{ url('/') }}" class="font-display mb-8 flex items-center gap-2 text-xl font-bold md:hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="h-9 w-auto" onerror="this.remove()">
                    <span>Satu<span class="text-[var(--leaf)]">Jarak</span></span>
                </a>

                <h1 class="font-display text-3xl font-bold">Daftar akun pemohon</h1>
                <p class="mt-2 text-[var(--muted)]">Isi data diri Anda. Semua kolom wajib diisi.</p>

                @if (session('status'))
                    <p class="mt-6 rounded-md border border-[var(--leaf)]/30 bg-white px-4 py-3 text-sm" role="status">{{ session('status') }}</p>
                @endif

                <form method="POST" action="{{ route('daftar.submit') }}" class="mt-8 space-y-5">
                    @csrf

                    {{-- Nama lengkap --}}
                    <div>
                        <label for="name" class="mb-1.5 block text-sm font-semibold">Nama lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                               required autofocus autocomplete="name" maxlength="150"
                               @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                               class="w-full rounded-md border bg-white px-4 py-3 outline-none focus:border-[var(--leaf)] focus:ring-2 focus:ring-[var(--kunyit)] @error('name') border-[var(--error)] @else border-[var(--line)] @enderror">
                        @error('name')
                            <p id="name-error" class="mt-1.5 text-sm text-[var(--error)]">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-semibold">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                               required autocomplete="email" maxlength="100" placeholder="nama@email.com"
                               @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                               class="w-full rounded-md border bg-white px-4 py-3 outline-none focus:border-[var(--leaf)] focus:ring-2 focus:ring-[var(--kunyit)] @error('email') border-[var(--error)] @else border-[var(--line)] @enderror">
                        @error('email')
                            <p id="email-error" class="mt-1.5 text-sm text-[var(--error)]">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kata sandi --}}
                    <div>
                        <label for="password" class="mb-1.5 block text-sm font-semibold">Kata sandi</label>
                        <input id="password" name="password" type="password" required minlength="8" autocomplete="new-password"
                               aria-describedby="password-hint @error('password') password-error @enderror"
                               @error('password') aria-invalid="true" @enderror
                               class="w-full rounded-md border bg-white px-4 py-3 outline-none focus:border-[var(--leaf)] focus:ring-2 focus:ring-[var(--kunyit)] @error('password') border-[var(--error)] @else border-[var(--line)] @enderror">
                        <p id="password-hint" class="mt-1.5 text-sm text-[var(--muted)]">Minimal 8 karakter.</p>
                        @error('password')
                            <p id="password-error" class="mt-1 text-sm text-[var(--error)]">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Konfirmasi kata sandi --}}
                    <div>
                        <label for="password_confirmation" class="mb-1.5 block text-sm font-semibold">Ulangi kata sandi</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password"
                               class="w-full rounded-md border border-[var(--line)] bg-white px-4 py-3 outline-none focus:border-[var(--leaf)] focus:ring-2 focus:ring-[var(--kunyit)]">
                        <p id="cocok" class="mt-1.5 hidden text-sm text-[var(--error)]" role="alert">Kata sandi tidak sama.</p>
                    </div>

                    <label class="flex items-center gap-2 text-sm text-[var(--muted)]">
                        <input type="checkbox" id="tampil" class="h-4 w-4 accent-[var(--leaf)]">
                        Tampilkan kata sandi
                    </label>

                    <button type="submit" id="daftar"
                            class="w-full rounded-md bg-[var(--ink)] px-5 py-3 font-semibold text-white hover:bg-[var(--leaf)] disabled:opacity-60">
                        Buat akun
                    </button>
                </form>

                <p class="mt-8 text-sm text-[var(--muted)]">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-semibold text-[var(--leaf)] underline underline-offset-4">Masuk</a>
                </p>
                <p class="mt-3 text-sm">
                    <a href="{{ url('/') }}" class="text-[var(--muted)] underline underline-offset-4">Kembali ke beranda</a>
                </p>
            </div>
        </main>
    </div>

    <script>
        (function () {
            var form = document.querySelector('form');
            var pw = document.getElementById('password');
            var pw2 = document.getElementById('password_confirmation');
            var cocok = document.getElementById('cocok');

            // Tampilkan/sembunyikan kedua kolom kata sandi
            document.getElementById('tampil').addEventListener('change', function (e) {
                var tipe = e.target.checked ? 'text' : 'password';
                pw.type = tipe;
                pw2.type = tipe;
            });

            // Cek kecocokan kata sandi
            function periksa() {
                var beda = pw2.value !== '' && pw.value !== pw2.value;
                cocok.classList.toggle('hidden', !beda);
                return !beda;
            }
            pw.addEventListener('input', periksa);
            pw2.addEventListener('input', periksa);

            form.addEventListener('submit', function (e) {
                if (!periksa()) { e.preventDefault(); pw2.focus(); return; }
                var b = document.getElementById('daftar');
                b.disabled = true;
                b.textContent = 'Memproses...';
            });
        })();
    </script>
</body>
</html>