  
    function goBack() {
      window.history.back();
    }

    /* FUNGSI UNTUK MENGISI DATA JIKA KELAK TERSEDIA (OPSIONAL) */
    function loadUserData(user) {
      if (!user) return;

      document.getElementById("userName").innerText = user.name;
      document.getElementById("userUsername").innerText = `@${user.username}`;
      document.getElementById("userEmail").innerText = user.email;
      document.getElementById("userEmail").classList.add("filled");
      
      document.getElementById("userPhone").innerText = user.phone;
      document.getElementById("userPhone").classList.add("filled");

      document.getElementById("userRole").innerText = user.role;
      document.getElementById("userRole").classList.add("filled");

      document.getElementById("userJoined").innerText = user.joined;
      document.getElementById("userJoined").classList.add("filled");

      document.getElementById("userLastActive").innerText = user.lastActive;
      document.getElementById("userLastActive").classList.add("filled");

      // Set Badge & Avatar
      const statusBadge = document.getElementById("userStatus");
      statusBadge.innerText = user.status;
      statusBadge.className = `badge-status ${user.status === 'Aktif' ? 'badge-aktif' : 'badge-nonaktif'}`;

      document.getElementById("userAvatar").innerHTML = `<img src="${user.avatar}" alt="Avatar" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">`;

      // Enable tombol aksi
      document.getElementById("btnEdit").disabled = false;
      document.getElementById("btnDelete").disabled = false;
    }
    function goBack() {
  window.location.href = "admin_user_table.html"; // Ganti 'index.html' dengan nama file tabel pengguna Anda
}