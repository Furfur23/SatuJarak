<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Detail Pengajuan — SatuJarak</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

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
button,
input,
select { font-family: inherit; }
button { cursor: pointer; }
h1, h2, h3, h4, h5, h6 { margin: 0; }

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
  border-bottom: 1px solid var(--border-soft);
}

.topbar-title {
  font-size: 12.5px;
  font-weight: 800;
  letter-spacing: 1.2px;
  color: var(--c-mint);
}

.topbar-actions { display: flex; align-items: center; gap: 14px; }

.icon-btn {
  width: 46px;
  height: 46px;
  border-radius: 50%;
  border: none;
  background: #EEF4F0;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--c-forest);
  font-size: 18px;
  position: relative;
  transition: background 0.15s ease;
}
.icon-btn:hover { background: var(--c-mint-soft); }

.icon-btn .dot {
  position: absolute;
  top: 10px;
  right: 12px;
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: var(--c-red-dot);
  border: 2px solid #EEF4F0;
}

.avatar-chip {
  width: 46px;
  height: 46px;
  border-radius: 50%;
  background: var(--c-mint);
  color: var(--c-forest);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  border: 3px solid #E4F4EC;
}

.profile-menu { position: relative; }

.profile-chip {
  display: flex;
  align-items: center;
  gap: 8px;
  background: none;
  border: none;
  padding: 0;
  color: var(--text-muted);
  font-size: 13px;
}

.profile-chip .bi-chevron-down {
  font-size: 13px;
  color: var(--muted);
  transition: transform 0.2s ease;
}
.profile-chip[aria-expanded="true"] .bi-chevron-down { transform: rotate(180deg); }

.profile-dropdown {
  display: none;
  position: absolute;
  top: calc(100% + 12px);
  right: 0;
  width: 260px;
  background: var(--card-bg);
  border-radius: 18px;
  box-shadow: 0 14px 36px rgba(11, 59, 44, 0.16);
  border: 1px solid var(--border);
  padding: 18px;
  z-index: 1200;
}
.profile-dropdown.open { display: block; }

.profile-dropdown-head {
  display: flex;
  align-items: center;
  gap: 12px;
  padding-bottom: 14px;
  margin-bottom: 8px;
  border-bottom: 1px solid var(--border);
}

.profile-dropdown-avatar {
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: var(--mint);
  color: var(--forest);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}

.profile-dropdown-name { font-weight: 800; font-size: 15px; color: var(--text-main); }
.profile-dropdown-role { font-size: 12.5px; color: var(--text-muted); }

.profile-dropdown-list { list-style: none; padding: 0; margin: 0; }

.profile-dropdown-item {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  padding: 10px 8px;
  border: none;
  background: none;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 600;
  color: var(--text-main);
  text-align: left;
  transition: background 0.15s ease;
}
.profile-dropdown-item i { font-size: 15px; color: var(--muted); width: 18px; }
.profile-dropdown-item:hover { background: var(--mint-soft, #DCEFE6); }

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
.topbar-toggle:hover { background: var(--mint-soft, #DCEFE6); }

.sidebar-backdrop { display: none; }

.page-body {
  padding: 36px 40px;
  flex: 1;
  max-width: 720px;
}

.page-heading {
  font-size: 30px;
  font-weight: 800;
  color: var(--c-heading);
  letter-spacing: -0.3px;
  margin-bottom: 2px;
}

.page-sub {
  color: var(--text-muted);
  font-size: 14px;
  margin-bottom: 26px;
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
  .brand-icon { animation: none; }
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
  content: "\F285"; /* bi-chevron-right */
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
.summary-card {
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, var(--c-mint-soft) 0%, var(--c-mint-mid) 100%);
  border-radius: 24px;
  padding: 28px 32px;
  margin-bottom: 24px;
}

.summary-card::after {
  content: "";
  position: absolute;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  background: rgba(108, 199, 160, 0.35);
  right: -60px;
  top: -80px;
  pointer-events: none;
}

.summary-card > * { position: relative; z-index: 1; }

.summary-code {
  font-size: 12.5px;
  font-weight: 800;
  color: #3FA57B;
  letter-spacing: 1.2px;
  margin-bottom: 6px;
}

.summary-title {
  font-size: 20px;
  font-weight: 800;
  color: var(--c-heading);
  margin-bottom: 20px;
  line-height: 1.35;
}

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

.status-badge.status-menunggu  { background: var(--c-peach); color: var(--c-peach-text); }
.status-badge.status-disetujui { background: #FFFFFF;        color: #2D9B6A; }
.status-badge.status-ditolak   { background: var(--c-pink);  color: var(--c-pink-text); }

.status-dot { width: 10px; height: 10px; border-radius: 50%; }
.status-dot.status-menunggu  { background: var(--c-peach-text); }
.status-dot.status-disetujui { background: #2D9B6A; }
.status-dot.status-ditolak   { background: var(--c-pink-text); }

.timeline-card {
  background: linear-gradient(135deg, #FDEBD3 0%, #FBE3C0 100%);
  border-radius: 24px;
  padding: 24px;
  margin-bottom: 28px;
}

#timeline-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.timeline-step-item {
  background: #FFFFFF;
  border-radius: 16px;
  padding: 16px 20px;
  display: flex;
  align-items: flex-start;
  gap: 16px;
  box-shadow: 0 2px 8px rgba(183, 121, 31, 0.10);
}

.step-icon {
  font-size: 24px;
  line-height: 1;
  flex-shrink: 0;
  margin-top: 2px;
}

.step-content {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.step-title {
  font-size: 16px;
  font-weight: 800;
  color: var(--c-heading);
  line-height: 1.3;
}

.step-time {
  font-size: 14px;
  color: var(--text-muted);
  font-weight: 500;
}

/* ---------- BANTUAN (sidebar) ---------- */
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

@media (max-width: 992px) {
  .main-content { margin-left: 0; }

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

  .page-body { padding: 24px 20px; max-width: 100%; }
  .topbar { padding: 14px 20px; }
}

@media (max-width: 576px) {
  .sidebar { width: 260px; left: -280px; padding: 24px 18px; }
  .brand { margin-bottom: 28px; }
  .brand-icon { width: 68px; height: 68px; border-radius: 21px; }
  .brand-icon img { width: 83px; height: 83px; }
  .brand-name { font-size: 24px; }
  .page-heading { font-size: 24px; }
  .summary-card { padding: 22px; }
  .summary-title { font-size: 17px; }
  .timeline-card { padding: 16px; }
  .timeline-step-item { padding: 14px 16px; gap: 12px; }
  .step-icon { font-size: 20px; }
  .step-title { font-size: 15px; }
  .step-time { font-size: 13px; }
  .status-badge { font-size: 12.5px; padding: 8px 14px; }
  .topbar-title { font-size: 11px; }
  .icon-btn, .avatar-chip, .topbar-toggle { width: 40px; height: 40px; }
  .profile-dropdown { width: 230px; right: -8px; }
  .help-card { padding: 16px 14px; margin-top: 14px; }
}
</style>
</head>
<body>

@php
    $kode        = $pengajuan->kode ?? 'KKN-2025-0001';
    $judul       = $pengajuan->judul_kegiatan ?? 'Pemberdayaan UMKM Desa Kediri Berbasis Digital';
    $status      = $pengajuan->status ?? 'menunggu';

    $statusConfig = [
        'menunggu'  => ['label' => 'Menunggu Persetujuan', 'class' => 'status-menunggu'],
        'disetujui' => ['label' => 'Disetujui', 'class' => 'status-disetujui'],
        'ditolak'   => ['label' => 'Ditolak', 'class' => 'status-ditolak'],
    ];
    $cfg = $statusConfig[$status] ?? $statusConfig['menunggu'];

    $timelineSteps = $timeline ?? [
        (object) ['icon' => '✅', 'title' => 'Permohonan Dikirim', 'time' => '22 Sep 2025 · 10:30 WIB'],
        (object) ['icon' => '⏳', 'title' => 'Menunggu Persetujuan', 'time' => 'Sejak 22 Sep 2025 · 10:31 WIB'],
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
    <li><a href="#" onclick="return false;" class="nav-link"> {{-- TODO: ganti ke route('dashboard') kalau halamannya sudah ada --}}<i class="bi bi-grid-fill"></i> Dashboard</a></li>
    <li><a href="#" onclick="return false;" class="nav-link"> {{-- TODO: ganti ke route('potensi-desa') --}}<i class="bi bi-stars"></i> Potensi Desa</a></li>
    <li><a href="#" onclick="return false;" class="nav-link"> {{-- TODO: ganti ke route('layanan') --}}<i class="bi bi-gear-fill"></i> Layanan</a></li>
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
        <div class="topbar-title">USER · DETAIL PENGAJUAN</div>
      </div>
      <div class="topbar-actions">
        <button class="icon-btn"><i class="bi bi-bell-fill"></i><span class="dot"></span></button>

        <div class="profile-menu">
          <button class="profile-chip" type="button" data-profile-toggle aria-haspopup="true" aria-expanded="false">
            <div class="avatar-chip"><i class="bi bi-person-fill"></i></div>
            <i class="bi bi-chevron-down"></i>
          </button>

          <div class="profile-dropdown" data-profile-dropdown>
            <div class="profile-dropdown-head">
              <span class="profile-dropdown-avatar"><i class="bi bi-person-fill"></i></span>
              <div>
                <div class="profile-dropdown-name">{{ Auth::user()->name ?? 'User' }}</div>
                <div class="profile-dropdown-role">Mahasiswa</div>
              </div>
            </div>
            <ul class="profile-dropdown-list">
              <li><a href="#" onclick="return false;" class="profile-dropdown-item"><i class="bi bi-person"></i> Profil</a></li>
              <li><a href="#" onclick="return false;" class="profile-dropdown-item"><i class="bi bi-gear"></i> Pengaturan</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="profile-dropdown-item"><i class="bi bi-box-arrow-right"></i> Log Out</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="page-body">
      <h1 class="page-heading">Detail Pengajuan</h1>
      <p class="page-sub">Pantau status dan riwayat proses pengajuan kamu di sini.</p>

      <div class="summary-card">
        <div class="summary-code">{{ $kode }}</div>
        <div class="summary-title">{{ $judul }}</div>
        <div id="status-badge" class="status-badge {{ $cfg['class'] }}">
          <span class="status-dot {{ $cfg['class'] }}"></span> {{ $cfg['label'] }}
        </div>
      </div>

      <div class="timeline-card">
        <div id="timeline-list">
          @foreach($timelineSteps as $step)
            <div class="timeline-step-item">
              <div class="step-icon">{{ $step->icon }}</div>
              <div class="step-content">
                <div class="step-title">{{ $step->title }}</div>
                <div class="step-time">{{ $step->time }}</div>
              </div>
            </div>
          @endforeach
        </div>
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

function initProfileDropdown() {
  const toggleBtn = document.querySelector('[data-profile-toggle]');
  const dropdown = document.querySelector('[data-profile-dropdown]');
  if (!toggleBtn || !dropdown) return;

  const closeDropdown = () => {
    dropdown.classList.remove('open');
    toggleBtn.setAttribute('aria-expanded', 'false');
  };

  toggleBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = dropdown.classList.toggle('open');
    toggleBtn.setAttribute('aria-expanded', String(isOpen));
  });

  document.addEventListener('click', (e) => {
    if (!dropdown.contains(e.target) && !toggleBtn.contains(e.target)) closeDropdown();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeDropdown();
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initSidebarToggle();
  initProfileDropdown();
});
</script>
</body>
</html>