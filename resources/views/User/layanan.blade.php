<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Layanan — SatuJarak</title>
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

* { box-sizing: border-box; }
html, body { height: 100%; }

body {
  margin: 0;
  font-family: var(--font-main);
  background: var(--bg-page);
  color: var(--text-main);
  font-size: 15px;
  line-height: 1.5;
}

a { text-decoration: none; color: inherit; }
button, input, select { font-family: inherit; }
button { cursor: pointer; }
h1, h2, h3, h4, h5, h6 { margin: 0; }

.app-shell { display: flex; min-height: 100vh; }

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

.topbar-left { display: flex; align-items: center; gap: 12px; min-width: 0; }

.topbar-toggle {
  width: 46px;
  height: 46px;
  border-radius: 50%;
  border: none;
  background: #EEF4F0;
  color: var(--forest);
  font-size: 24px;
  display: none;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: background 0.15s ease;
}
.topbar-toggle:hover { background: var(--mint-soft); }

.sidebar-backdrop { display: none; }

.topbar-title {
  font-size: 12.5px;
  font-weight: 800;
  letter-spacing: 1.2px;
  color: var(--mint);
  white-space: nowrap;
}

.topbar-search {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #EEF4F0;
  border-radius: 999px;
  padding: 11px 18px;
  width: 100%;
  max-width: 320px;
}

.topbar-search input {
  border: none;
  background: none;
  outline: none;
  font-size: 14px;
  color: var(--text-main);
  width: 100%;
}

.topbar-search input::placeholder { color: var(--muted); }
.topbar-search i { color: var(--muted); font-size: 16px; flex-shrink: 0; }

.page-body { padding: 36px 40px; flex: 1; }

.page-heading {
  font-size: 30px;
  font-weight: 800;
  color: var(--forest);
  letter-spacing: -0.3px;
  margin-bottom: 24px;
}

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

.sidebar > * { position: relative; z-index: 2; }

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

.brand-icon img { width: 100px; height: 100px; object-fit: contain; }

@keyframes logoFloat {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-5px); }
}

@media (prefers-reduced-motion: reduce) {
  .brand-icon { animation: none; }
}

.brand-name {
  color: #FFFFFF;
  font-size: 27px;
  font-weight: 800;
  line-height: 1.2;
  margin: 12px 0 1px;
}

.brand-sub { color: #D4E7DF; font-size: 12px; margin: 0; }

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

.nav-link i { font-size: 17px; }

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

.help-card {
  background: rgba(255, 255, 255, 0.07);
  border: 1px solid rgba(255, 255, 255, 0.14);
  border-radius: 20px;
  padding: 20px 18px;
  margin-top: 18px;
}

.help-title {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #FFFFFF;
  font-weight: 800;
  font-size: 14.5px;
  margin-bottom: 14px;
}

.help-title-icon {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: linear-gradient(145deg, var(--gold), var(--mint));
  color: var(--forest);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 15px;
  flex-shrink: 0;
}

.help-section-label {
  color: rgba(255, 255, 255, 0.55);
  font-size: 10.5px;
  font-weight: 800;
  letter-spacing: 0.6px;
  text-transform: uppercase;
  margin-bottom: 8px;
}

.help-schedule { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }

.help-schedule-row {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  gap: 10px;
  font-size: 12.5px;
}

.help-day { color: #FFFFFF; font-weight: 700; }
.help-hours { color: rgba(255, 255, 255, 0.65); font-weight: 600; white-space: nowrap; }

.help-divider {
  height: 1px;
  background: rgba(255, 255, 255, 0.12);
  margin: 14px 0;
  border: none;
}

.help-contact { display: flex; flex-direction: column; gap: 10px; }

.help-contact-link {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #FFFFFF;
  font-size: 12.5px;
  font-weight: 600;
  border-radius: 10px;
  padding: 6px 8px;
  margin: -6px -8px;
  transition: background 0.15s ease;
  word-break: break-all;
}

.help-contact-link:hover { background: rgba(255, 255, 255, 0.08); }

.help-contact-link i {
  width: 26px;
  height: 26px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.10);
  color: var(--mint);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 13px;
  flex-shrink: 0;
}

.welcome-banner {
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, var(--mint-soft) 0%, #BFE4D2 100%);
  border-radius: var(--radius-lg);
  padding: 34px 32px;
  margin-bottom: 28px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  gap: 16px;
}

.welcome-banner::before {
  content: "";
  position: absolute;
  width: 190px;
  height: 190px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.30);
  right: -70px;
  top: -90px;
  pointer-events: none;
}

.welcome-banner::after {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  border-radius: 50%;
  background: rgba(11, 56, 40, 0.06);
  right: 40px;
  bottom: -60px;
  pointer-events: none;
}

.welcome-icon {
  position: relative;
  z-index: 1;
  width: 76px;
  height: 76px;
  border-radius: 22px;
  background: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 8px 18px rgba(11, 59, 44, 0.14);
  padding: 10px;
}

.welcome-icon img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.welcome-banner-text {
  position: relative;
  z-index: 1;
  font-size: 24px;
  font-weight: 800;
  color: var(--forest);
  line-height: 1.25;
}

.welcome-banner-sub {
  position: relative;
  z-index: 1;
  font-size: 15px;
  font-weight: 600;
  color: var(--forest-light);
  margin-top: 4px;
}

.service-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
  gap: 14px;
}

.service-card {
  background: var(--card-bg);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-card);
  border: 1px solid transparent;
  padding: 14px;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 10px;
  text-align: center;
  transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
}

.service-card:hover {
  transform: translateY(-4px);
  border-color: var(--mint);
  box-shadow: 0 14px 30px rgba(11, 59, 44, 0.12);
}

.service-logo-box {
  width: 100%;
  height: 64px;
  border-radius: var(--radius-sm);
  background: #F3F6F4;
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 8px;
  flex-shrink: 0;
}

.service-logo-box img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.service-name {
  width: 100%;
  min-height: 2.5em;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  font-weight: 800;
  font-size: 12.5px;
  line-height: 1.25;
  color: var(--text-main);
}

@media (max-width: 992px) {
  .main-content { margin-left: 0; }
  .topbar-toggle { display: flex; }

  .sidebar {
    left: -300px;
    transition: left 0.2s ease;
    box-shadow: 10px 0 30px rgba(0,0,0,0.2);
  }
  .sidebar.open { left: 0; }

  .sidebar.open + .sidebar-backdrop {
    display: block;
    position: fixed;
    inset: 0;
    background: rgba(11, 56, 40, 0.45);
    z-index: 999;
  }

  .page-body { padding: 24px 20px; }
  .topbar { padding: 14px 20px; }
  .topbar-search { max-width: 220px; }
}

@media (max-width: 576px) {
  .sidebar { width: 260px; left: -280px; padding: 24px 18px; }
  .brand { margin-bottom: 28px; }
  .brand-icon { width: 68px; height: 68px; border-radius: 21px; }
  .brand-icon img { width: 83px; height: 83px; }
  .brand-name { font-size: 24px; }
  .help-card { padding: 16px 14px; margin-top: 14px; }

  .page-heading { font-size: 24px; }
  .welcome-banner { padding: 24px 18px; gap: 12px; }
  .welcome-icon { width: 60px; height: 60px; border-radius: 18px; }
  .welcome-banner-text { font-size: 18px; }
  .welcome-banner-sub { font-size: 13px; }
  .topbar-title { font-size: 11px; }
  .topbar-toggle { width: 40px; height: 40px; }
  .topbar-search { max-width: 160px; padding: 9px 14px; }
  .service-grid { grid-template-columns: repeat(auto-fill, minmax(108px, 1fr)); gap: 10px; }
  .service-logo-box { height: 52px; }
}
</style>
</head>
<body>

@php
    $layananList = $layananList ?? [
        (object) ['nama' => 'Antrian Dukcapil',   'logo' => 'logo_kediri.png', 'link' => null],
        (object) ['nama' => 'SIMKAH',             'logo' => 'logo_simkah.png', 'link' => null],
        (object) ['nama' => 'Pengajuan Riset/KKN','logo' => 'logo_kkn.png',    'link' => null],
        (object) ['nama' => 'Web Desa',           'logo' => 'logo_kediri.png', 'link' => null],
    ];
@endphp

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
      <li><a href="#" onclick="return false;" class="nav-link"><i class="bi bi-grid-fill"></i> Dashboard</a></li>
      <li><a href="#" onclick="return false;" class="nav-link"><i class="bi bi-stars"></i> Potensi Desa</a></li>
      <li><a href="{{ route('layanan') }}" class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}"><i class="bi bi-gear-fill"></i> Layanan</a></li>
    </ul>

    <div class="help-card">
      <div class="help-title">
        <span class="help-title-icon"><i class="bi bi-headset"></i></span>
        Butuh Bantuan?
      </div>

      <div class="help-section-label">Jam Operasional Kantor Desa</div>
      <div class="help-schedule">
        <div class="help-schedule-row">
          <span class="help-day">Senin - Kamis</span>
          <span class="help-hours">08.00 - 13.00 WIB</span>
        </div>
        <div class="help-schedule-row">
          <span class="help-day">Jumat</span>
          <span class="help-hours">08.00 - 11.00 WIB</span>
        </div>
      </div>

      <hr class="help-divider">

      <div class="help-contact">
        <a href="mailto:desajarak204@gmail.com" class="help-contact-link">
          <i class="bi bi-envelope-fill"></i> desajarak204@gmail.com
        </a>
        <a href="https://instagram.com/ds.jarak" target="_blank" rel="noopener" class="help-contact-link">
          <i class="bi bi-instagram"></i> @ds.jarak
        </a>
      </div>
    </div>
  </aside>
  <div class="sidebar-backdrop" data-sidebar-backdrop></div>

  <div class="main-content">
    <div class="topbar">
      <div class="topbar-left">
        <button class="topbar-toggle d-lg-none" data-sidebar-toggle aria-label="Buka menu"><i class="bi bi-list"></i></button>
        <div class="topbar-title">USER · LAYANAN</div>
      </div>
      <div class="topbar-search">
        <input type="text" placeholder="Cari layanan...">
        <i class="bi bi-search"></i>
      </div>
    </div>

    <div class="page-body">
      <h1 class="page-heading">Layanan</h1>

      <div class="welcome-banner">
        <div class="welcome-icon">
          <img src="{{ asset('images/logo.png') }}" alt="Logo SatuJarak">
        </div>
        <div>
          <div class="welcome-banner-text">Selamat Datang di Layanan Desa Jarak</div>
          <div class="welcome-banner-sub">Semua layanan desa bisa diakses dari satu tempat.</div>
        </div>
      </div>

      <div class="service-grid">
        @foreach($layananList as $layanan)
          <a href="{{ $layanan->link ?? '#' }}" target="_blank" rel="noopener" class="service-card">
            <div class="service-logo-box">
              <img src="{{ asset('images/' . $layanan->logo) }}" alt="Logo {{ $layanan->nama }}">
            </div>
            <div class="service-name">{{ $layanan->nama }}</div>
          </a>
        @endforeach
      </div>
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
</body>
</html>