<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin — Dashboard SatuJarak</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

:root {
  /* Warna dasar — disamakan dengan palet halaman user */
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

  --c-darkest: var(--forest);
  --c-dark: var(--forest);
  --c-primary: var(--forest);
  --c-mid: var(--forest-light);
  --c-accent: var(--mint);
  --c-mint: var(--mint);
  --c-tan: var(--gold);
  --c-pink: var(--pink-light);

  --bg-page: #F7FAF8;
  --card-bg: #FFFFFF;
  --text-main: #1C231F;
  --text-muted: var(--muted);
  --border-soft: var(--border);

  --status-menunggu-bg: var(--gold-light);
  --status-disetujui-bg: var(--mint-soft);
  --status-ditolak-bg: var(--pink-light);

  --radius-lg: 16px;
  --radius-md: 12px;
  --shadow-card: 0 2px 4px rgba(11, 59, 44, 0.04), 0 10px 28px rgba(11, 59, 44, 0.07);
}

* { box-sizing: border-box; }
html, body { height: 100%; }

body {
  margin: 0;
  font-family: "Inter", "Segoe UI", Arial, sans-serif;
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
h1, h2, h3, h4, h5, h6, p { margin: 0; }

.app-shell { display: flex; min-height: 100vh; }
.main-content {
  flex: 1;
  min-width: 0;
  display: flex;
  flex-direction: column;
  margin-left: 280px; /* selebar sidebar (fixed) */
}

.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 40px;
  border-bottom: 1px solid var(--border-soft);
  background: var(--card-bg);
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
.topbar-toggle:hover { background: var(--mint-soft); }

.sidebar-backdrop { display: none; }

.topbar-title { font-size: 12.5px; font-weight: 800; letter-spacing: 1.2px; color: var(--mint); }
.topbar-actions { display: flex; align-items: center; gap: 14px; }

.topbar-search {
  display: flex;
  align-items: center;
  gap: 10px;
  background: #EEF4F0;
  border-radius: 999px;
  padding: 11px 18px;
  min-width: 220px;
  color: var(--muted);
}

.topbar-search i { font-size: 15px; }

.topbar-search input {
  border: none;
  outline: none;
  background: transparent;
  font-size: 14px;
  color: var(--text-main);
  width: 100%;
}

.topbar-search input::placeholder { color: var(--muted); }

.profile-menu { position: relative; }

.profile-chip {
  display: flex;
  align-items: center;
  gap: 6px;
  background: none;
  border: none;
  color: var(--muted);
  font-size: 16px;
  padding: 0;
}

.profile-avatar {
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
  flex-shrink: 0;
}

.profile-dropdown {
  position: absolute;
  top: calc(100% + 14px);
  right: 0;
  width: 260px;
  background: #FFFFFF;
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-card);
  padding: 18px;
  display: none;
  z-index: 1200;
}

.profile-dropdown.open { display: block; }

.profile-dropdown-head {
  display: flex;
  align-items: center;
  gap: 12px;
  padding-bottom: 16px;
  margin-bottom: 8px;
  border-bottom: 1px solid var(--border-soft);
}

.profile-dropdown-avatar {
  width: 46px;
  height: 46px;
  border-radius: 50%;
  background: var(--mint);
  color: var(--forest);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  flex-shrink: 0;
}

.profile-dropdown-name { font-weight: 800; font-size: 15px; color: var(--text-main); }
.profile-dropdown-role { font-size: 12.5px; color: var(--text-muted); }

.profile-dropdown-list { list-style: none; padding: 0; margin: 0; }

.profile-dropdown-item {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 8px;
  border-radius: var(--radius-sm, 10px);
  font-size: 14px;
  font-weight: 600;
  color: var(--text-main);
  background: none;
  border: none;
  width: 100%;
  text-align: left;
}

.profile-dropdown-item i { font-size: 15px; color: var(--muted); width: 18px; }
.profile-dropdown-item:hover { background: var(--mint-soft); }

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
.icon-btn:hover { background: var(--mint-soft); }

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

.page-body { padding: 36px 40px; flex: 1; }
.page-heading { font-size: 30px; font-weight: 800; color: var(--forest); letter-spacing: -0.3px; line-height: 1.2; }
.page-sub { color: var(--text-muted); font-size: 14.5px; font-weight: 600; margin-bottom: 26px; }

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

.admin-profile {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 0;
  margin-bottom: 38px;
}

.admin-avatar {
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

.admin-avatar img {
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
  .admin-avatar { animation: none; }
}

.admin-profile-name {
  color: #FFFFFF;
  font-size: 27px;
  font-weight: 800;
  line-height: 1.2;
  margin: 12px 0 1px;
}

.admin-profile-role {
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

.nav-pill {
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

.nav-pill i { font-size: 17px; }

.nav-pill:hover {
  transform: translateX(5px);
  background: var(--mint);
  color: var(--forest);
}

.nav-pill.active {
  background: var(--gold);
  color: var(--forest);
  box-shadow: 0 8px 18px rgba(217, 163, 106, 0.22);
}

.nav-pill.active::after {
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

.total-card {
  background: var(--c-dark);
  color: #fff;
  border-radius: var(--radius-lg);
  padding: 26px 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  flex-wrap: wrap;
  margin-bottom: 32px;
  position: relative;
  overflow: hidden;
}

.total-card::after {
  content: '';
  position: absolute;
  right: -60px;
  top: -80px;
  width: 240px;
  height: 240px;
  border-radius: 50%;
  background: rgba(112, 198, 155, 0.10);
}

.total-label { font-weight: 700; font-size: 15px; color: var(--c-mint); }
.total-value { font-size: 44px; font-weight: 800; line-height: 1.1; margin-top: 4px; }

.total-breakdown { display: flex; gap: 28px; position: relative; z-index: 1; }
.breakdown-item { display: flex; flex-direction: column; gap: 2px; }
.breakdown-num { font-size: 22px; font-weight: 800; }
.breakdown-label { font-size: 12.5px; color: rgba(255,255,255,0.65); display: flex; align-items: center; gap: 6px; }

.breakdown-dot { width: 8px; height: 8px; border-radius: 50%; }
.breakdown-dot.menunggu { background: var(--c-tan); }
.breakdown-dot.disetujui { background: var(--c-accent); }
.breakdown-dot.ditolak { background: var(--c-pink); }

.section-heading { font-size: 17px; font-weight: 800; color: var(--c-dark); margin-bottom: 14px; }

.menu-card {
  background: var(--card-bg);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  padding: 20px;
  height: 100%;
  display: flex;
  flex-direction: column;
  border: 1px solid transparent;
  transition: transform 0.15s ease, border-color 0.15s ease;
}

.menu-card:hover { transform: translateY(-3px); border-color: var(--c-mint); }

.menu-icon {
  width: 42px;
  height: 42px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 19px;
  margin-bottom: 14px;
}

.menu-icon.i-green { background: var(--status-disetujui-bg); color: var(--c-primary); }
.menu-icon.i-tan { background: var(--status-menunggu-bg); color: #B07A45; }
.menu-icon.i-mint { background: #E1F4EA; color: var(--c-mid); }
.menu-icon.i-pink { background: var(--status-ditolak-bg); color: #E0567C; }

.menu-title { font-weight: 800; font-size: 15px; color: var(--text-main); }
.menu-count { font-size: 13px; color: var(--text-muted); margin-top: 2px; }
.menu-count b { color: var(--c-dark); font-size: 15px; }

.detail-link {
  margin-top: auto;
  padding-top: 16px;
  align-self: flex-end;
  font-size: 13px;
  font-weight: 700;
  color: var(--c-primary);
  display: inline-flex;
  align-items: center;
  gap: 2px;
}

.detail-link:hover { color: var(--c-mid); }
.detail-link i { transition: transform 0.15s ease; }
.menu-card:hover .detail-link i { transform: translateX(3px); }

.detail-card {
  background: var(--card-bg);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  padding: 22px 24px;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.detail-card-title { font-weight: 800; font-size: 16px; color: var(--text-main); margin-bottom: 12px; }
.mini-list { list-style: none; padding: 0; margin: 0; }

.mini-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  padding: 10px 0;
  border-bottom: 1px dashed var(--border-soft);
  font-size: 14px;
}

.mini-item:last-child { border-bottom: none; }
.mini-name { font-weight: 700; }
.mini-meta { color: var(--text-muted); font-size: 12.5px; }

.mini-avatar {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: var(--c-primary);
  color: #fff;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 12px;
  font-weight: 700;
  flex-shrink: 0;
}

.mini-left { display: flex; align-items: center; gap: 10px; min-width: 0; }

.mini-badge {
  font-size: 12px;
  font-weight: 700;
  padding: 3px 10px;
  border-radius: 999px;
  background: var(--status-disetujui-bg);
  color: var(--c-primary);
  white-space: nowrap;
}

@media (max-width: 992px) {
  .main-content { margin-left: 0; }

  .page-body { padding: 24px 20px; }
  .topbar { padding: 14px 20px; }

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
}

@media (max-width: 576px) {
  .sidebar { width: 260px; left: -280px; padding: 24px 18px; }
  .admin-profile { margin-bottom: 28px; }
  .admin-avatar { width: 68px; height: 68px; border-radius: 21px; }
  .admin-avatar img { width: 83px; height: 83px; }
  .admin-profile-name { font-size: 24px; }

  .page-heading { font-size: 24px; }
  .topbar-title { font-size: 11px; }
  .icon-btn, .topbar-toggle { width: 40px; height: 40px; }

  .total-value { font-size: 36px; }
  .total-breakdown { gap: 20px; }

  .topbar-search { min-width: 0; flex: 1; padding: 9px 14px; }
  .topbar-search input { min-width: 0; }
  .profile-dropdown { width: 240px; }
}

@media (max-width: 480px) {
  .topbar-search span,
  .topbar-search { display: none; }
}
</style>
</head>
<body>

<div class="app-shell">

  <aside class="sidebar">
    <div class="admin-profile">
      <div class="admin-avatar"><img src="{{ asset('images/logo.png') }}" alt="Logo SatuJarak"></div>
      <div class="admin-profile-name">{{ $adminName ?? 'Satu Jarak' }}</div>
      <div class="admin-profile-role">{{ $adminRole ?? 'Pelayanan Publik Desa' }}</div>
    </div>

    <ul class="nav-list">
      <li><a href="{{ url('admin/dashboard') }}" class="nav-pill active"><i class="bi bi-grid-fill"></i> Dashboard</a></li>
      <li><a href="{{ url('admin/pengajuan') }}" class="nav-pill"><i class="bi bi-file-earmark-text-fill"></i> Pengajuan</a></li>
      <li><a href="{{ url('admin/layanan') }}" class="nav-pill"><i class="bi bi-gear-fill"></i> Layanan</a></li>
      <li><a href="{{ url('admin/profile-desa') }}" class="nav-pill"><i class="bi bi-signpost-split-fill"></i> Profile Desa</a></li>
      <li><a href="{{ url('admin/kelola pengguna') }}" class="nav-pill"><i class="bi bi-sliders"></i> Kelola Pengguna</a></li>
    </ul>

    <form method="POST" action="{{ url('logout') }}" class="w-100">
      @csrf
      <button type="submit" class="logout-btn">Log Out <i class="bi bi-box-arrow-right"></i></button>
    </form>
  </aside>
  <div class="sidebar-backdrop" data-sidebar-backdrop></div>

  <div class="main-content">
    <div class="topbar">
      <div class="topbar-left">
        <button class="topbar-toggle d-lg-none" data-sidebar-toggle aria-label="Buka menu"><i class="bi bi-list"></i></button>
        <div class="topbar-title">ADMIN · DASHBOARD</div>
      </div>
      <div class="topbar-actions">
        <label class="topbar-search">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Search...">
        </label>

        <button class="icon-btn"><i class="bi bi-bell-fill"></i><span class="dot"></span></button>

        <div class="profile-menu">
          <button class="profile-chip" type="button" data-profile-toggle aria-haspopup="true" aria-expanded="false">
            <span class="profile-avatar"><i class="bi bi-person-fill"></i></span>
            <i class="bi bi-chevron-down"></i>
          </button>

          <div class="profile-dropdown" data-profile-dropdown>
            <div class="profile-dropdown-head">
              <span class="profile-dropdown-avatar"><i class="bi bi-person-fill"></i></span>
              <div>
                <div class="profile-dropdown-name">Admin Desa</div>
                <div class="profile-dropdown-role">Administrator</div>
              </div>
            </div>
            <ul class="profile-dropdown-list">
              <li><a href="{{ url('admin/profil') }}" class="profile-dropdown-item"><i class="bi bi-person"></i> Profil</a></li>
              <li><a href="{{ url('admin/pengaturan') }}" class="profile-dropdown-item"><i class="bi bi-gear"></i> Pengaturan</a></li>
              <li>
                <form method="POST" action="{{ url('logout') }}">
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
      <h1 class="page-heading">Dashboard Overview</h1>
      <p class="page-sub">Ringkasan Aktivitas Sistem</p>

      <div class="total-card">
        <div style="position:relative; z-index:1;">
          <div class="total-label">Total Pengajuan</div>
          <div class="total-value" id="total-pengajuan">0</div>
        </div>
        <div class="total-breakdown">
          <div class="breakdown-item">
            <div class="breakdown-num" id="num-menunggu">0</div>
            <div class="breakdown-label"><span class="breakdown-dot menunggu"></span>Menunggu</div>
          </div>
          <div class="breakdown-item">
            <div class="breakdown-num" id="num-disetujui">0</div>
            <div class="breakdown-label"><span class="breakdown-dot disetujui"></span>Disetujui</div>
          </div>
          <div class="breakdown-item">
            <div class="breakdown-num" id="num-ditolak">0</div>
            <div class="breakdown-label"><span class="breakdown-dot ditolak"></span>Ditolak</div>
          </div>
        </div>
      </div>

      <h2 class="section-heading">Menu Management</h2>
      <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
          <div class="menu-card">
            <div class="menu-icon i-green"><i class="bi bi-people-fill"></i></div>
            <div class="menu-title">Manage User</div>
            <div class="menu-count"><b id="count-user">0</b> pengguna</div>
            <a href="{{ url('admin/user') }}" class="detail-link">Detail <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="menu-card">
            <div class="menu-icon i-tan"><i class="bi bi-file-earmark-text-fill"></i></div>
            <div class="menu-title">Manage Pengajuan</div>
            <div class="menu-count"><b id="count-pengajuan">0</b> pengajuan</div>
            <a href="{{ url('admin/pengajuan') }}" class="detail-link">Detail <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="menu-card">
            <div class="menu-icon i-mint"><i class="bi bi-gear-fill"></i></div>
            <div class="menu-title">Manage Layanan</div>
            <div class="menu-count"><b id="count-layanan">0</b> layanan</div>
            <a href="{{ url('admin/layanan') }}" class="detail-link">Detail <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-6 col-xl-3">
          <div class="menu-card">
            <div class="menu-icon i-pink"><i class="bi bi-stars"></i></div>
            <div class="menu-title">Manage Potensi Desa</div>
            <div class="menu-count"><b id="count-potensi">0</b> potensi</div>
            <a href="{{ url('admin/potensi') }}" class="detail-link">Detail <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
      </div>

      <h2 class="section-heading">Menu Detail</h2>
      <div class="row g-3">
        <div class="col-lg-6">
          <div class="detail-card">
            <div class="detail-card-title">Detail User</div>
            <ul class="mini-list" id="list-user"></ul>
            <a href="{{ url('admin/user') }}" class="detail-link">Detail <i class="bi bi-chevron-right"></i></a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="detail-card">
            <div class="detail-card-title">Detail Layanan</div>
            <ul class="mini-list" id="list-layanan"></ul>
            <a href="{{ url('admin/layanan') }}" class="detail-link">Detail <i class="bi bi-chevron-right"></i></a>
          </div>
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

  const DUMMY_DATA = {
    pengajuan: { menunggu: 12, disetujui: 34, ditolak: 5 },
    jumlahUser: 128,
    jumlahLayanan: 9,
    jumlahPotensi: 15,
    userTerbaru: [
      { nama: 'Aditya Pratama', kampus: 'Universitas Airlangga' },
      { nama: 'Nabila Rahma', kampus: 'Universitas Negeri Surabaya' },
      { nama: 'Bagus Setiawan', kampus: 'Universitas Brawijaya' },
    ],
    layananPopuler: [
      { nama: 'Proposal KKN', pengajuan: 41 },
      { nama: 'Proposal Riset', pengajuan: 27 },
      { nama: 'Antrian Dukcapil', pengajuan: 18 },
    ],
  };

  function getInitials(name) {
    return name.split(' ').map((w) => w[0]).slice(0, 2).join('').toUpperCase();
  }

  function renderDashboard() {
    const d = DUMMY_DATA;
    const total = d.pengajuan.menunggu + d.pengajuan.disetujui + d.pengajuan.ditolak;

    document.getElementById('total-pengajuan').textContent = total;
    document.getElementById('num-menunggu').textContent = d.pengajuan.menunggu;
    document.getElementById('num-disetujui').textContent = d.pengajuan.disetujui;
    document.getElementById('num-ditolak').textContent = d.pengajuan.ditolak;

    document.getElementById('count-user').textContent = d.jumlahUser;
    document.getElementById('count-pengajuan').textContent = total;
    document.getElementById('count-layanan').textContent = d.jumlahLayanan;
    document.getElementById('count-potensi').textContent = d.jumlahPotensi;

    document.getElementById('list-user').innerHTML = d.userTerbaru
      .map(
        (u) => `
        <li class="mini-item">
          <div class="mini-left">
            <span class="mini-avatar">${getInitials(u.nama)}</span>
            <div>
              <div class="mini-name">${u.nama}</div>
              <div class="mini-meta">${u.kampus}</div>
            </div>
          </div>
        </li>`
      )
      .join('');

    document.getElementById('list-layanan').innerHTML = d.layananPopuler
      .map(
        (l) => `
        <li class="mini-item">
          <div class="mini-name">${l.nama}</div>
          <span class="mini-badge">${l.pengajuan} pengajuan</span>
        </li>`
      )
      .join('');
  }

  document.addEventListener('DOMContentLoaded', () => {
    initSidebarToggle();
    initProfileDropdown();
    renderDashboard();
  });
</script>
</body>
</html>