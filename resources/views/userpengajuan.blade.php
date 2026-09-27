<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Pengajuan Permohonan — SatuJarak</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
    :root {
  --c-darkest: #0F2D1F;
  --c-dark: #1B4332;
  --c-primary: #2D6A4F;
  --c-mid: #40916C;
  --c-accent: #52B788;
  --c-mint: #7EC8A0;
  --c-sage: #ABBF9B;
  --c-tan: #D4A373;
  --c-pink: #FF8FAB;

  --bg-page: #F5F8F6;
  --card-bg: #FFFFFF;
  --text-main: #1C231F;
  --text-muted: #6C7570;
  --border-soft: #E3EAE5;

  --status-disetujui-bg: #E4F3EB;

  --font-main: 'Manrope', system-ui, -apple-system, sans-serif;

  --radius-lg: 16px;
  --radius-md: 12px;
  --radius-sm: 8px;
  --shadow-card: 0 1px 2px rgba(15, 45, 31, 0.04), 0 6px 20px rgba(15, 45, 31, 0.06);
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
button { font-family: inherit; cursor: pointer; }
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
}

.topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 32px;
  border-bottom: 1px solid var(--border-soft);
  background: var(--card-bg);
}

.topbar-title {
  font-size: 12.5px;
  font-weight: 700;
  letter-spacing: 0.2px;
  color: var(--text-muted);
}

.topbar-actions { display: flex; align-items: center; gap: 12px; }

.icon-btn {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  border: 1px solid var(--border-soft);
  background: var(--card-bg);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-muted);
  font-size: 16px;
  position: relative;
}

.icon-btn .dot {
  position: absolute;
  top: 8px;
  right: 9px;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: var(--c-pink);
  border: 1.5px solid #fff;
}

.avatar-chip {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background: var(--c-primary);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 13px;
}

.page-body {
  padding: 32px;
  flex: 1;
}

.page-heading {
  font-size: 24px;
  font-weight: 800;
  color: var(--c-dark);
  margin-bottom: 2px;
}

.page-sub {
  color: var(--text-muted);
  font-size: 14px;
  margin-bottom: 24px;
}

.sidebar {
  width: 264px;
  flex-shrink: 0;
  background: var(--c-darkest);
  display: flex;
  flex-direction: column;
  padding: 24px 16px;
  position: sticky;
  top: 0;
  height: 100vh;
}

.sidebar-toggle {
  background: none;
  border: none;
  color: rgba(255,255,255,0.85);
  font-size: 20px;
  padding: 4px;
  margin-bottom: 20px;
  align-self: flex-start;
}

.brand {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 0 8px 28px;
  margin-bottom: 8px;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}

.brand-icon {
  width: 34px;
  height: 34px;
  border-radius: 10px;
  background: var(--c-mint);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--c-darkest);
  font-size: 18px;
  flex-shrink: 0;
}

.brand-name {
  color: #FFFFFF;
  font-weight: 800;
  font-size: 17px;
  line-height: 1.1;
}

.brand-sub {
  color: rgba(255,255,255,0.45);
  font-size: 11.5px;
  margin-top: 1px;
}

.nav-list {
  list-style: none;
  padding: 20px 0 0;
  margin: 0;
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 14px;
  border-radius: var(--radius-sm);
  color: rgba(255,255,255,0.8);
  font-weight: 600;
  font-size: 14.5px;
  transition: background 0.15s ease, color 0.15s ease;
}

.nav-link i { font-size: 17px; width: 20px; text-align: center; }

.nav-link:hover {
  background: rgba(255,255,255,0.07);
  color: #FFFFFF;
}

.nav-link.active {
  background: var(--c-accent);
  color: var(--c-darkest);
}

.logout-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: var(--c-accent);
  color: var(--c-darkest);
  border: none;
  border-radius: 999px;
  padding: 12px 16px;
  font-weight: 700;
  font-size: 14.5px;
  width: 100%;
  transition: background 0.15s ease;
}

.logout-btn:hover { background: var(--c-mint); color: var(--c-darkest); }

.section-card {
  background: var(--card-bg);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  padding: 26px 28px;
  margin-bottom: 28px;
}

.section-title {
  font-size: 19px;
  font-weight: 800;
  color: var(--c-dark);
  margin-bottom: 18px;
}

.btn-primary-green {
  background: var(--c-primary);
  color: #fff;
  border: none;
  border-radius: 999px;
  padding: 12px 30px;
  font-weight: 700;
  font-size: 14.5px;
  transition: background 0.15s ease;
}

.btn-primary-green:hover { background: var(--c-mid); color: #fff; }

.btn-outline-soft {
  background: #fff;
  color: var(--text-main);
  border: 1px solid var(--border-soft);
  border-radius: 999px;
  padding: 12px 26px;
  font-weight: 700;
  font-size: 14.5px;
}

.btn-outline-soft:hover { background: #F7F9F7; }

.toast-success {
  position: fixed;
  top: 24px;
  right: 24px;
  background: var(--c-dark);
  color: #fff;
  padding: 14px 20px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  font-weight: 600;
  box-shadow: 0 8px 24px rgba(0,0,0,0.18);
  transform: translateY(-12px);
  opacity: 0;
  pointer-events: none;
  transition: all 0.25s ease;
  z-index: 1000;
}

.toast-success.show { transform: translateY(0); opacity: 1; }
.toast-success i { color: var(--c-mint); font-size: 18px; }

.field-label {
  font-size: 13px;
  font-weight: 700;
  color: var(--text-main);
  margin-bottom: 6px;
  display: block;
}

.form-control, .form-select {
  border: 1px solid var(--border-soft);
  border-radius: var(--radius-sm);
  padding: 10px 14px;
  font-size: 14.5px;
  background: #FAFBFA;
}

.form-control:focus, .form-select:focus {
  border-color: var(--c-mint);
  box-shadow: 0 0 0 3px rgba(126, 200, 160, 0.28);
  background: #fff;
}

.field-group { margin-bottom: 18px; }

.upload-box {
  border: 1.5px dashed var(--c-sage);
  border-radius: var(--radius-md);
  background: #FAFBFA;
  padding: 22px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  flex-wrap: wrap;
}

.upload-box.has-file { border-color: var(--c-mid); background: var(--status-disetujui-bg); }

.upload-hint {
  display: flex;
  align-items: center;
  gap: 12px;
  color: var(--text-muted);
  font-size: 13.5px;
}

.upload-hint i { font-size: 22px; color: var(--c-tan); }

.upload-choose-btn {
  background: var(--c-dark);
  color: #fff;
  border: none;
  border-radius: var(--radius-sm);
  padding: 9px 18px;
  font-weight: 700;
  font-size: 13.5px;
  flex-shrink: 0;
  cursor: pointer;
}

.invalid-feedback { display: block; }

@media (max-width: 992px) {
  .sidebar {
    position: fixed;
    left: -280px;
    top: 0;
    z-index: 50;
    transition: left 0.2s ease;
    box-shadow: 10px 0 30px rgba(0,0,0,0.15);
  }
  .sidebar.open { left: 0; }

  .page-body { padding: 20px; }
  .topbar { padding: 16px 20px; }
}

/* Mobile kecil */
@media (max-width: 576px) {
  .page-heading { font-size: 20px; }
  .page-sub { font-size: 13px; }
  .section-card { padding: 20px; }
  .section-title { font-size: 17px; }
  .field-group .row > * { margin-bottom: 12px; }
  .upload-box { padding: 16px; gap: 12px; }
  .upload-choose-btn { padding: 8px 16px; font-size: 13px; }
  .btn-primary-green,
  .btn-outline-soft {
    padding: 11px 22px;
    font-size: 14px;
  }
  .topbar-title { font-size: 11.5px; }
}
</style>
</head>
<body>

<div class="app-shell">

  <aside class="sidebar">
    <button class="sidebar-toggle d-lg-none" data-sidebar-toggle><i class="bi bi-list"></i></button>
    <div class="brand">
      <div class="brand-icon"><i class="bi bi-signpost-split-fill"></i></div>
      <div>
        <div class="brand-name">SatuJarak</div>
        <div class="brand-sub">Layanan Desa Digital</div>
      </div>
    </div>
    <ul class="nav-list">
      <li><a href="{{ url('/') }}" class="nav-link"><i class="bi bi-house-door-fill"></i> SatuJarak</a></li>
      <li><a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-grid-fill"></i> Dashboard</a></li>
      <li><a href="{{ route('potensi-desa') }}" class="nav-link {{ request()->routeIs('potensi-desa') ? 'active' : '' }}"><i class="bi bi-stars"></i> Potensi Desa</a></li>
      <li><a href="{{ route('pengajuan.index') }}" class="nav-link {{ request()->routeIs('pengajuan.*') ? 'active' : '' }}"><i class="bi bi-file-earmark-text-fill"></i> Pengajuan</a></li>
      <li><a href="{{ route('layanan') }}" class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}"><i class="bi bi-gear-fill"></i> Layanan</a></li>
    </ul>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">Log Out <i class="bi bi-box-arrow-right"></i></button>
    </form>
  </aside>

  <div class="main-content">
    <div class="topbar">
      <div class="topbar-title">USER · PENGAJUAN PERMOHONAN</div>
      <div class="topbar-actions">
        <button class="icon-btn"><i class="bi bi-bell"></i><span class="dot"></span></button>
        <div class="avatar-chip">{{ Auth::user()->initials ?? 'AP' }}</div>
      </div>
    </div>

    <div class="page-body">
      <h1 class="page-heading">Pengajuan Permohonan</h1>
      <p class="page-sub">Isi data di bawah ini dengan lengkap untuk mengajukan kegiatan KKN/Riset di desa.</p>

      <form id="form-pengajuan" novalidate method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="section-card">
          <div class="section-title">Data Pemohon</div>
          <div class="row">
            <div class="col-12 field-group">
              <label class="field-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
              @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">NIM</label>
              <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required>
              @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">Universitas</label>
              <input type="text" class="form-control @error('universitas') is-invalid @enderror" name="universitas" value="{{ old('universitas') }}" required>
              @error('universitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">Fakultas/Jurusan</label>
              <input type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" value="{{ old('fakultas') }}" required>
              @error('fakultas') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">No Hp</label>
              <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required>
              @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 field-group mb-0">
              <label class="field-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
              @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
        </div>

        <div class="section-card">
          <div class="section-title">Detail Kegiatan</div>
          <div class="row">
            <div class="col-12 field-group">
              <label class="field-label">Jenis Permohonan</label>
              <select class="form-select @error('jenis_permohonan') is-invalid @enderror" name="jenis_permohonan" required>
                <option value="" {{ old('jenis_permohonan') ? '' : 'selected' }} disabled>Pilih jenis permohonan</option>
                <option value="kkn" {{ old('jenis_permohonan') == 'kkn' ? 'selected' : '' }}>KKN</option>
                <option value="riset" {{ old('jenis_permohonan') == 'riset' ? 'selected' : '' }}>Riset</option>
              </select>
              @error('jenis_permohonan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 field-group">
              <label class="field-label">Judul Kegiatan</label>
              <input type="text" class="form-control @error('judul_kegiatan') is-invalid @enderror" name="judul_kegiatan" value="{{ old('judul_kegiatan') }}" required>
              @error('judul_kegiatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">Lokasi Spesifik</label>
              <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ old('lokasi') }}" required>
              @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">Jumlah Peserta</label>
              <input type="number" min="1" class="form-control @error('jumlah_peserta') is-invalid @enderror" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}" required>
              @error('jumlah_peserta') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">Tanggal Mulai</label>
              <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
              @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6 field-group">
              <label class="field-label">Tanggal Selesai</label>
              <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
              @error('tanggal_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-12 field-group mb-0">
              <label class="field-label">Dosen Pembimbing</label>
              <input type="text" class="form-control @error('dosen_pembimbing') is-invalid @enderror" name="dosen_pembimbing" value="{{ old('dosen_pembimbing') }}" required>
              @error('dosen_pembimbing') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
          </div>
        </div>

        <div class="section-card">
          <div class="section-title">Upload Berkas</div>
          <label class="field-label">Proposal Kegiatan</label>
          <div class="upload-box" id="upload-box">
            <div class="upload-hint">
              <i class="bi bi-cloud-arrow-up-fill"></i>
              <div>
                <div id="upload-filename" style="font-weight:600; color:var(--text-main);">Belum ada file dipilih</div>
                <div>Format PDF, maks. 5MB</div>
              </div>
            </div>
            <label class="upload-choose-btn" for="proposal-file">Pilih File</label>
            <input type="file" id="proposal-file" name="proposal_file" accept=".pdf" hidden required>
          </div>
          @error('proposal_file') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-end gap-2">
          <button type="reset" class="btn-outline-soft">Batal</button>
          <button type="submit" class="btn-primary-green">Kirim Pengajuan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function initSidebarToggle() {
  const toggleBtn = document.querySelector('[data-sidebar-toggle]');
  const sidebar = document.querySelector('.sidebar');
  if (!toggleBtn || !sidebar) return;

  toggleBtn.addEventListener('click', () => sidebar.classList.toggle('open'));
}

function initPengajuanForm() {
  const form = document.getElementById('form-pengajuan');
  if (!form) return;

  // Tampilan custom untuk file upload
  const fileInput = document.getElementById('proposal-file');
  const uploadBox = document.getElementById('upload-box');
  const uploadText = document.getElementById('upload-filename');

  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      uploadText.textContent = fileInput.files[0].name;
      uploadBox.classList.add('has-file');
    } else {
      uploadText.textContent = 'Belum ada file dipilih';
      uploadBox.classList.remove('has-file');
    }
  });

  // Validasi HTML5 tetap dipakai sebelum form dikirim ke server (submit native).
  form.addEventListener('submit', (e) => {
    if (!form.checkValidity()) {
      e.preventDefault();
      form.classList.add('was-validated');
    }
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initSidebarToggle();
  initPengajuanForm();
});
</script>
</body>
</html>