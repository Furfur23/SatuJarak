<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sederhana - Kelola Pengguna</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="stylesheet" href="{{ asset('css/admin/admin_table_user.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <div class="img-container">
         <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
      
        <nav>
            <a href="">Dashboard</a>
            <a href="">Pengajuan</a>
            <a href="">Layanan</a>
            <a href="">Profile Desa</a>
            <a href="">Kelola Pengguna</a>   
        </nav>
     <i class="fa-solid fa-bars" style="color: white;"></i>
    </header>

  <div class="container">
    <h2>Kelola Pengguna</h2>
    <div class="sidebar" id="sidebar">
  <div class="menu">
     <a href="">Dashboard</a>
            <a href="">Pengajuan</a>
            <a href="">Layanan</a>
            <a href="">Profile Desa</a>
            <a href="">Kelola Pengguna</a>
  </div>
</div>


    <!-- Toolbar Pencarian & Tambah Data -->
    <div class="toolbar">
      <input type="text" id="searchInput" class="search-input" placeholder="Cari nama atau email..." onkeyup="filterUsers()">
      <button class="btn-add" onclick="openModal()">+ Tambah User</button>
    </div>

    <!-- Tabel User -->
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="userTableBody">
          <!-- Data diisi oleh JavaScript -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah User -->
  <div class="modal" id="userModal">
    <div class="modal-content">
      <h3>Tambah User Baru</h3>
      <form id="userForm" onsubmit="addUser(event)">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" id="inputName" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" id="inputEmail" required>
        </div>
        <div class="form-group">
          <label>Role</label>
          <select id="inputRole">
            <option value="Admin">Admin</option>
            <option value="Editor">Editor</option>
            <option value="User">User</option>
          </select>
        </div>
        <div class="modal-actions">
          <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
          <button type="submit" class="btn-add">Simpan</button>
        </div>
      </form>
    </div>
  </div>
<script src="{{ asset('js/admin_user_table.js') }}"></script>
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>