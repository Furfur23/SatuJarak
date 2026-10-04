
    // Data Array User
    let users = [
      { id: 1, name: "Budi Santoso", email: "budi@example.com", role: "Admin", status: "Aktif" },
      { id: 2, name: "Siti Aminah", email: "siti@example.com", role: "Editor", status: "Aktif" },
      { id: 3, name: "Ahmad Fauzi", email: "ahmad@example.com", role: "User", status: "Nonaktif" }
    ];

    // Function Render Tabel
    function renderTable(data = users) {
      const tbody = document.getElementById("userTableBody");
      tbody.innerHTML = "";

      if (data.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; color:#94a3b8;">Data tidak ditemukan</td></tr>`;
        return;
      }

      data.forEach((user, index) => {
        const badgeClass = user.status === 'Aktif' ? 'badge-aktif' : 'badge-nonaktif';
        const row = `
          <tr>
            <td>${index + 1}</td>
            <td><strong>${user.name}</strong></td>
            <td>${user.email}</td>
            <td>${user.role}</td>
            <td><span class="badge ${badgeClass}">${user.status}</span></td>
            <td>
              <button class="btn-action btn-edit" onclick="alert('Fitur edit ${user.name}')">Edit</button>
              <button class="btn-action btn-delete" onclick="deleteUser(${user.id})">Hapus</button>
            </td>
          </tr>
        `;
        tbody.innerHTML += row;
      });
    }

    // Fitur Cari (Search Filter)
    function filterUsers() {
      const keyword = document.getElementById("searchInput").value.toLowerCase();
      const filtered = users.filter(user => 
        user.name.toLowerCase().includes(keyword) || 
        user.email.toLowerCase().includes(keyword)
      );
      renderTable(filtered);
    }

    // Modal Operations
    function openModal() {
      document.getElementById("userModal").style.display = "flex";
      document.getElementById("userModal").style.marginTop = "1rem";
      
       
    }

    function closeModal() {
      document.getElementById("userModal").style.display = "none";
      document.getElementById("userForm").reset();
    }

    // Fitur Tambah User
    function addUser(event) {
      event.preventDefault();
      const name = document.getElementById("inputName").value;
      const email = document.getElementById("inputEmail").value;
      const role = document.getElementById("inputRole").value;

      const newUser = {
        id: Date.now(),
        name: name,
        email: email,
        role: role,
        status: "Aktif"
      };

      users.unshift(newUser); // Masukkan ke data awal
      renderTable();
      closeModal();
    }

    // Fitur Hapus User
    function deleteUser(id) {
      if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
        users = users.filter(user => user.id !== id);
        renderTable();
      }
    }

    // Inisialisasi awal
    renderTable();
  
  
  const menuOpenbutton = document.querySelector(".fa-solid")
  const menuSidebar = document.querySelector("#sidebar")

  menuOpenbutton.addEventListener("click", () => {
    menuSidebar.classList.toggle('active')
  
  });

