<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') — SatuJarak</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --forest: #0B3828;
            --forest-light: #15533F;
            --mint: #70C69B;
            --sage: #A7B998;
            --gold: #D9A36A;
            --gold-light: #F9E1B9;
            --pink-light: #F9C8D7;
            --text: #173D30;
            --muted: #708078;
            --border: #E5ECE8;

            --mint-soft: #DCEFE6;
            --mint-mid: #BFE4D2;
            --peach-text: #B7791F;
            --pink-text: #D6336C;
            --red-dot: #FF4D6D;

            --bg-page: #F7FAF8;
            --card-bg: #FFFFFF;
            --text-main: #1C231F;
            --text-muted: var(--muted);
            --border-soft: var(--border);

            --font-main: "Inter", "Segoe UI", Arial, sans-serif;

            --radius-lg: 24px;
            --radius-md: 14px;
            --radius-sm: 10px;
            --shadow-card: 0 2px 4px rgba(11, 59, 44, 0.04), 0 10px 28px rgba(11, 59, 44, 0.07);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            margin: 0;
            font-family: var(--font-main);
            background: var(--bg-page);
            color: var(--text-main);
            font-size: 15px;
            line-height: 1.5;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        button {
            cursor: pointer;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
        }

        /* ---------- Shell ---------- */
        .app-shell {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            margin-left: 280px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 40px;
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
        }

        .topbar-title {
            font-size: 12.5px;
            font-weight: 800;
            letter-spacing: 1.2px;
            color: var(--mint);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .icon-btn {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: none;
            background: #EEF4F0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--forest);
            font-size: 18px;
            position: relative;
            transition: background 0.15s ease;
        }

        .icon-btn:hover {
            background: var(--mint-soft);
        }

        .icon-btn .dot {
            position: absolute;
            top: 10px;
            right: 12px;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--red-dot);
            border: 2px solid #EEF4F0;
        }

        .profile-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 13px;
        }

        .avatar-chip {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--mint);
            color: var(--forest);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            border: 3px solid #E4F4EC;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 0;
        }

        .topbar-toggle {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: none;
            background: #EEF4F0;
            color: var(--forest);
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: background 0.15s ease;
        }

        .topbar-toggle:hover {
            background: var(--mint-soft);
        }

        .sidebar-backdrop {
            display: none;
        }

        .page-body {
            padding: 36px 40px;
            flex: 1;
        }

        .page-heading {
            font-size: 30px;
            font-weight: 800;
            color: var(--forest);
            letter-spacing: -0.3px;
            margin-bottom: 2px;
        }

        .page-sub {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 26px;
        }

        /* ---------- Sidebar ---------- */
        .sidebar {
            width: 280px;
            min-height: 100vh;
            padding: 30px 24px;
            background: var(--forest);
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sidebar::before {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(112, 198, 155, 0.10);
            left: -110px;
            bottom: 40px;
            pointer-events: none;
        }

        .sidebar::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(217, 163, 106, 0.10);
            left: -90px;
            bottom: -50px;
            pointer-events: none;
        }

        .sidebar>* {
            position: relative;
            z-index: 2;
        }

        .brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0;
            margin-bottom: 38px;
        }

        .brand-icon {
            width: 82px;
            height: 82px;
            margin: auto;
            border-radius: 25px;
            background: linear-gradient(145deg, var(--gold), var(--mint));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--forest);
            font-size: 40px;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.16);
            flex-shrink: 0;
            animation: logoFloat 4s ease-in-out infinite;
        }

        .brand-icon img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        @keyframes logoFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .brand-icon {
                animation: none;
            }
        }

        .brand-name {
            color: #FFFFFF;
            font-size: 27px;
            font-weight: 800;
            line-height: 1.2;
            margin: 12px 0 1px;
        }

        .brand-sub {
            color: #D4E7DF;
            font-size: 12px;
            margin: 0;
        }

        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .nav-link {
            min-height: 46px;
            padding: 0 18px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.96);
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 15px;
            font-weight: 700;
            transition: all 0.25s ease;
        }

        .nav-link i {
            font-size: 17px;
        }

        .nav-link:hover {
            transform: translateX(5px);
            background: var(--mint);
            color: var(--forest);
        }

        .nav-link.active {
            background: var(--gold);
            color: var(--forest);
            box-shadow: 0 8px 18px rgba(217, 163, 106, 0.22);
        }

        .nav-link.active::after {
            content: "\F285";
            font-family: "bootstrap-icons";
            margin-left: auto;
        }

        .logout-btn {
            height: 48px;
            padding: 0 16px;
            border: none;
            border-radius: 30px;
            background: var(--mint);
            color: var(--forest);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            font-size: 15px;
            font-weight: 700;
            width: 100%;
            transition: 0.25s ease;
        }

        .logout-btn:hover {
            background: white;
            transform: translateY(-3px);
        }

        /* ---------- Shared components ---------- */
        .section-card {
            background: var(--card-bg);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            border: 1px solid var(--border);
            padding: 28px 32px;
            margin-bottom: 28px;
        }

        .section-title {
            font-size: 19px;
            font-weight: 800;
            color: var(--forest);
            margin-bottom: 18px;
        }

        .btn-primary-green {
            background: var(--forest);
            color: #fff;
            border: none;
            border-radius: 999px;
            padding: 12px 30px;
            font-weight: 700;
            font-size: 14.5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        .btn-primary-green:hover {
            background: var(--forest-light);
            color: #fff;
            transform: translateY(-2px);
        }

        .btn-outline-soft {
            background: #fff;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 12px 26px;
            font-weight: 700;
            font-size: 14.5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.25s ease;
        }

        .btn-outline-soft:hover {
            background: var(--mint-soft);
            color: var(--text);
        }

        .btn-gold {
            background: var(--gold);
            color: var(--forest);
            border: none;
            border-radius: 999px;
            padding: 12px 26px;
            font-weight: 700;
            font-size: 14.5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-gold:hover {
            color: var(--forest);
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(217, 163, 106, 0.28);
        }

        .btn-danger-soft {
            background: var(--pink-light);
            color: var(--pink-text);
            border: none;
            border-radius: 999px;
            padding: 12px 26px;
            font-weight: 700;
            font-size: 14.5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: transform 0.25s ease, background 0.25s ease, color 0.25s ease;
        }

        .btn-danger-soft:hover {
            background: var(--pink-text);
            color: #fff;
            transform: translateY(-2px);
        }

        .field-label {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
            display: block;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            font-size: 14.5px;
            background-color: #F8FAF9;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--mint);
            box-shadow: 0 0 0 3px rgba(112, 198, 155, 0.28);
            background-color: #fff;
        }

        .field-group {
            margin-bottom: 18px;
        }

        /* status badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 18px;
            border-radius: 999px;
            font-weight: 800;
            font-size: 13.5px;
            width: fit-content;
        }

        .status-badge.status-aktif {
            background: #FFFFFF;
            color: #2D9B6A;
        }

        .status-badge.status-nonaktif {
            background: var(--pink-light);
            color: var(--pink-text);
        }

        .status-badge.status-draft {
            background: var(--gold-light);
            color: var(--peach-text);
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .status-dot.status-aktif {
            background: #2D9B6A;
        }

        .status-dot.status-nonaktif {
            background: var(--pink-text);
        }

        .status-dot.status-draft {
            background: var(--peach-text);
        }

        /* small pills used in tables */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 12.5px;
            white-space: nowrap;
        }

        .pill-mint {
            background: var(--mint-soft);
            color: #2D9B6A;
        }

        .pill-gold {
            background: var(--gold-light);
            color: var(--peach-text);
        }

        .pill-pink {
            background: var(--pink-light);
            color: var(--pink-text);
        }

        /* ---------- Modal ---------- */
        .modal-content {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
        }

        .modal-header {
            border-bottom: 1px solid var(--border);
            padding: 20px 28px;
        }

        .modal-title {
            font-size: 19px;
            font-weight: 800;
            color: var(--forest);
        }

        .modal-body {
            padding: 24px 28px;
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 16px 28px;
            gap: 8px;
        }

        /* ---------- Responsive ---------- */
        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                left: -300px;
                transition: left 0.2s ease;
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.2);
            }

            .sidebar.open {
                left: 0;
            }

            .sidebar.open+.sidebar-backdrop {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(11, 56, 40, 0.45);
                z-index: 999;
            }

            .page-body {
                padding: 24px 20px;
            }

            .topbar {
                padding: 14px 20px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 260px;
                left: -280px;
                padding: 24px 18px;
            }

            .brand {
                margin-bottom: 28px;
            }

            .brand-icon {
                width: 68px;
                height: 68px;
                border-radius: 21px;
            }

            .brand-icon img {
                width: 83px;
                height: 83px;
            }

            .brand-name {
                font-size: 24px;
            }

            .page-heading {
                font-size: 24px;
            }

            .page-sub {
                font-size: 13px;
            }

            .section-card {
                padding: 20px;
                border-radius: 20px;
            }

            .section-title {
                font-size: 17px;
            }

            .btn-primary-green,
            .btn-outline-soft,
            .btn-gold,
            .btn-danger-soft {
                padding: 11px 22px;
                font-size: 14px;
            }

            .status-badge {
                font-size: 12.5px;
                padding: 8px 14px;
            }

            .topbar-title {
                font-size: 11px;
            }

            .icon-btn,
            .avatar-chip,
            .topbar-toggle {
                width: 40px;
                height: 40px;
            }

            .modal-header,
            .modal-body,
            .modal-footer {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    @php $activeMenu = trim($__env->yieldContent('active_menu')); @endphp

    <div class="app-shell">

        <aside class="sidebar">
            <div class="brand">
                <div class="brand-icon"><img src="{{ asset('images/logo.png') }}" alt="Logo SatuJarak"></div>
                <div>
                    <div class="brand-name">Satu Jarak</div>
                    <div class="brand-sub">Pelayanan Publik Desa</div>
                </div>
            </div>
            <ul class="nav-list">
                <li><a href="{{ url('/') }}" class="nav-link"><i class="bi bi-house-door-fill"></i> SatuJarak</a>
                </li>
                <li><a href="#" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}"><i
                            class="bi bi-grid-fill"></i> Dashboard</a></li>
                <li><a href="#" class="nav-link {{ $activeMenu == 'potensi' ? 'active' : '' }}"><i
                            class="bi bi-stars"></i> Potensi Desa</a></li>
                <li><a href="#" class="nav-link {{ $activeMenu == 'pengajuan' ? 'active' : '' }}"><i
                            class="bi bi-file-earmark-text-fill"></i> Pengajuan</a></li>
                <li><a href="#" class="nav-link {{ $activeMenu == 'layanan' ? 'active' : '' }}"><i
                            class="bi bi-gear-fill"></i> Layanan</a></li>
            </ul>
            <form method="POST" action="#">
                @csrf
                <button type="submit" class="logout-btn">Log Out <i class="bi bi-box-arrow-right"></i></button>
            </form>
        </aside>
        <div class="sidebar-backdrop" data-sidebar-backdrop></div>

        <div class="main-content">
            <div class="topbar">
                <div class="topbar-left">
                    <button class="topbar-toggle d-lg-none" data-sidebar-toggle aria-label="Buka menu"><i
                            class="bi bi-list"></i></button>
                    <div class="topbar-title">@yield('topbar_title', 'ADMIN')</div>
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn"><i class="bi bi-bell-fill"></i><span class="dot"></span></button>
                    <div class="profile-chip">
                        <div class="avatar-chip"><i class="bi bi-person-fill"></i></div>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
            </div>

            <div class="page-body">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function initSidebarToggle() {
            const toggleBtn = document.querySelector('[data-sidebar-toggle]');
            const backdrop = document.querySelector('[data-sidebar-backdrop]');
            const sidebar = document.querySelector('.sidebar');
            if (!toggleBtn || !sidebar) return;

            toggleBtn.addEventListener('click', () => sidebar.classList.toggle('open'));
            if (backdrop) backdrop.addEventListener('click', () => sidebar.classList.remove('open'));
        }

        document.addEventListener('DOMContentLoaded', () => {
            initSidebarToggle();
        });
    </script>

    @stack('scripts')
</body>

</html>
