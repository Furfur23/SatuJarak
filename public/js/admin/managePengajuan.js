const applications = [
    {
        id: "PGJ-001",
        pemohon: "Ahmad Fauzi",
        judul: "Pengajuan Kerjasama KKN",
        instansi: "Universitas Nusantara",
        tanggal: "25 Sep 2026",
        status: "Menunggu Verifikasi",
        layanan: "KKN"
    },
    {
        id: "PGJ-002",
        pemohon: "Siti Aminah",
        judul: "Surat Keterangan Domisili",
        instansi: "Masyarakat",
        tanggal: "24 Sep 2026",
        status: "Sedang Diproses",
        layanan: "Surat Keterangan"
    },
    {
        id: "PGJ-003",
        pemohon: "Budi Santoso",
        judul: "Pengajuan Data Kependudukan",
        instansi: "Desa Jarak",
        tanggal: "23 Sep 2026",
        status: "Selesai",
        layanan: "Kependudukan"
    },
    {
        id: "PGJ-004",
        pemohon: "Universitas Kediri",
        judul: "Pengajuan Penelitian Desa",
        instansi: "Universitas Kediri",
        tanggal: "22 Sep 2026",
        status: "Sedang Diproses",
        layanan: "Penelitian"
    },
    {
        id: "PGJ-005",
        pemohon: "Dewi Lestari",
        judul: "Pengajuan Administrasi Desa",
        instansi: "Masyarakat",
        tanggal: "21 Sep 2026",
        status: "Selesai",
        layanan: "Administrasi"
    },
    {
        id: "PGJ-006",
        pemohon: "Rizky Pratama",
        judul: "Pengajuan Surat Keterangan",
        instansi: "Masyarakat",
        tanggal: "20 Sep 2026",
        status: "Menunggu Verifikasi",
        layanan: "Surat Keterangan"
    },
    {
        id: "PGJ-007",
        pemohon: "Universitas Kediri",
        judul: "Pengajuan KKN Desa",
        instansi: "Universitas Kediri",
        tanggal: "19 Sep 2026",
        status: "Selesai",
        layanan: "KKN"
    },
    {
        id: "PGJ-008",
        pemohon: "Andi Wijaya",
        judul: "Pengajuan Data Penduduk",
        instansi: "Masyarakat",
        tanggal: "18 Sep 2026",
        status: "Sedang Diproses",
        layanan: "Kependudukan"
    }
];

let currentPage = 1;

const rowsPerPage = 5;


/* Status badge */

function getStatusClass(status) {

    if (status === "Menunggu Verifikasi") {
        return "waiting";
    }

    if (status === "Sedang Diproses") {
        return "process";
    }

    return "complete";
}


/* Render table */

function renderTable() {

    const table = document.getElementById("applicationTable");

    const searchValue =
        document
            .getElementById("searchInput")
            .value
            .toLowerCase();

    const statusValue =
        document.getElementById("statusFilter").value;

    const serviceValue =
        document.getElementById("serviceFilter").value;


    const filteredData = applications.filter(item => {

        const searchMatch =
            item.id.toLowerCase().includes(searchValue) ||
            item.pemohon.toLowerCase().includes(searchValue) ||
            item.judul.toLowerCase().includes(searchValue) ||
            item.instansi.toLowerCase().includes(searchValue);

        const statusMatch =
            statusValue === "" ||
            item.status === statusValue;

        const serviceMatch =
            serviceValue === "" ||
            item.layanan === serviceValue;

        return searchMatch && statusMatch && serviceMatch;

    });


    const totalPages =
        Math.ceil(filteredData.length / rowsPerPage);


    if (currentPage > totalPages && totalPages > 0) {
        currentPage = totalPages;
    }


    const start =
        (currentPage - 1) * rowsPerPage;

    const end =
        start + rowsPerPage;

    const pageData =
        filteredData.slice(start, end);


    table.innerHTML = "";


    pageData.forEach(item => {

        const statusClass =
            getStatusClass(item.status);


        table.innerHTML += `

            <tr>

                <td>
                    <span class="table-id">
                        ${item.id}
                    </span>
                </td>

                <td>
                    <span class="table-name">
                        ${item.pemohon}
                    </span>
                </td>

                <td>
                    <span class="table-title">
                        ${item.judul}
                    </span>
                </td>

                <td>
                    <span class="table-institution">
                        ${item.instansi}
                    </span>
                </td>

                <td>
                    <span class="table-date">
                        ${item.tanggal}
                    </span>
                </td>

                <td>

                    <span class="status-badge ${statusClass}">

                        <i class="bi bi-circle-fill"></i>

                        ${item.status}

                    </span>

                </td>

                <td class="text-center">

                    <a
                        href="detailPengajuan.html?id=${item.id}"
                        class="detail-btn"
                    >

                        Detail

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </td>

            </tr>

        `;

    });


    if (pageData.length === 0) {

        table.innerHTML = `

            <tr>

                <td
                    colspan="7"
                    class="text-center py-5"
                >

                    <i
                        class="bi bi-inbox"
                        style="font-size: 30px; color: #A7B998;"
                    ></i>

                    <div class="mt-2">
                        Tidak ada pengajuan ditemukan
                    </div>

                </td>

            </tr>

        `;

    }


    const firstData =
        filteredData.length === 0
            ? 0
            : start + 1;

    const lastData =
        Math.min(end, filteredData.length);


    document.getElementById("dataInfo").textContent =
        `Menampilkan ${firstData}-${lastData} dari ${filteredData.length} pengajuan`;


    renderPagination(totalPages);

}


/* Pagination */

function renderPagination(totalPages) {

    const pagination =
        document.getElementById("pagination");

    pagination.innerHTML = "";


    if (totalPages <= 1) {
        return;
    }


    if (currentPage > 1) {

        pagination.innerHTML += `

            <li class="page-item">

                <button
                    class="page-link"
                    onclick="changePage(${currentPage - 1})"
                >

                    <i class="bi bi-chevron-left"></i>

                </button>

            </li>

        `;

    }


    for (let page = 1; page <= totalPages; page++) {

        pagination.innerHTML += `

            <li
                class="page-item
                ${page === currentPage ? "active" : ""}"
            >

                <button
                    class="page-link"
                    onclick="changePage(${page})"
                >

                    ${page}

                </button>

            </li>

        `;

    }


    if (currentPage < totalPages) {

        pagination.innerHTML += `

            <li class="page-item">

                <button
                    class="page-link"
                    onclick="changePage(${currentPage + 1})"
                >

                    <i class="bi bi-chevron-right"></i>

                </button>

            </li>

        `;

    }

}


/* Change page */

function changePage(page) {

    currentPage = page;

    renderTable();

}


/* Search */

document
    .getElementById("searchInput")
    .addEventListener("input", () => {

        currentPage = 1;

        renderTable();

    });


/* Status filter */

document
    .getElementById("statusFilter")
    .addEventListener("change", () => {

        currentPage = 1;

        renderTable();

    });


/* Service filter */

document
    .getElementById("serviceFilter")
    .addEventListener("change", () => {

        currentPage = 1;

        renderTable();

    });


/* Notification dropdown */

const notificationBtn =
    document.getElementById("notificationBtn");

const notificationDropdown =
    document.getElementById("notificationDropdown");

notificationBtn.addEventListener("click", event => {

    event.stopPropagation();

    notificationDropdown.classList.toggle("show");

    profileDropdown.classList.remove("show");

});


/* Profile dropdown */

const profileBtn =
    document.getElementById("profileBtn");

const profileDropdown =
    document.getElementById("profileDropdown");

profileBtn.addEventListener("click", event => {

    event.stopPropagation();

    profileDropdown.classList.toggle("show");

    notificationDropdown.classList.remove("show");

});


/* Close dropdown */

document.addEventListener("click", () => {

    notificationDropdown.classList.remove("show");

    profileDropdown.classList.remove("show");

});


/* Mobile sidebar */

const mobileMenuBtn =
    document.getElementById("mobileMenuBtn");

const sidebar =
    document.querySelector(".sidebar");

const sidebarCloseBtn =
    document.getElementById("sidebarCloseBtn");

const menuIcon =
    document.getElementById("menuIcon");


/* Buka / tutup sidebar dari tombol burger */

mobileMenuBtn.addEventListener("click", (event) => {

    event.stopPropagation();

    sidebar.classList.toggle("mobile-open");

    if (sidebar.classList.contains("mobile-open")) {

        menuIcon.classList.remove("bi-list");
        menuIcon.classList.add("bi-x-lg");

    } else {

        menuIcon.classList.remove("bi-x-lg");
        menuIcon.classList.add("bi-list");

    }

});


/* Tombol X */

sidebarCloseBtn.addEventListener("click", (event) => {

    event.stopPropagation();

    sidebar.classList.remove("mobile-open");

    menuIcon.classList.remove("bi-x-lg");
    menuIcon.classList.add("bi-list");

});


/* Klik area luar sidebar */

document.addEventListener("click", (event) => {

    if (
        sidebar.classList.contains("mobile-open") &&
        !sidebar.contains(event.target) &&
        !mobileMenuBtn.contains(event.target)
    ) {

        sidebar.classList.remove("mobile-open");

        menuIcon.classList.remove("bi-x-lg");
        menuIcon.classList.add("bi-list");

    }

});


/* Initial render */

renderTable();