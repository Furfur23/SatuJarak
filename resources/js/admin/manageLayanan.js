const services = [
    {
        id: "LYN-001",
        icon: "image/logo simkah.png",
        name: "Pernikahan",
        link: "#",
        description: "Layanan pengajuan administrasi dan kebutuhan pernikahan",
        date: "01 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-002",
        icon: "image/logo kediri.png",
        name: "Antrian Dispenduk",
        link: "#",
        description: "Layanan antrian online administrasi kependudukan",
        date: "02 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-003",
        icon: "image/logo kediri.png",
        name: "e-SPPT PBB Online",
        link: "#",
        description: "Layanan e-SPPT PBB online untuk petugas PBB, lurah, dan kepala desa",
        date: "05 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-004",
        icon: "image/logo kkn.png",
        name: "Penelitian",
        link: "#",
        description: "Pengajuan dan informasi kegiatan penelitian di Desa Jarak",
        date: "08 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-005",
        icon: "image/logo kkn.png",
        name: "KKN",
        link: "#",
        description: "Pengajuan dan informasi kegiatan KKN di Desa Jarak",
        date: "10 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-006",
        icon: "image/kependudukan.png",
        name: "Kependudukan",
        link: "#",
        description: "Layanan informasi dan administrasi kependudukan",
        date: "11 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-007",
        icon: "image/surat.png",
        name: "Surat Keterangan",
        link: "#",
        description: "Layanan pengajuan berbagai surat keterangan desa",
        date: "12 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-008",
        icon: "image/profil-desa.png",
        name: "Profil Desa",
        link: "#",
        description: "Informasi mengenai profil, data, dan potensi Desa Jarak",
        date: "13 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-009",
        icon: "image/bantuan-desa.png",
        name: "Bantuan Desa",
        link: "#",
        description: "Informasi mengenai program dan bantuan yang tersedia di desa",
        date: "14 September 2026",
        status: "Aktif"
    },

    {
        id: "LYN-010",
        icon: "image/kegiatan-desa.png",
        name: "Kegiatan Desa",
        link: "#",
        description: "Informasi kegiatan dan agenda Desa Jarak",
        date: "15 September 2026",
        status: "Aktif"
    }
];


const serviceTable =
    document.getElementById("serviceTable");

const searchInput =
    document.getElementById("searchInput");

const statusFilter =
    document.getElementById("statusFilter");

const totalService =
    document.getElementById("totalService");

const activeService =
    document.getElementById("activeService");

const inactiveService =
    document.getElementById("inactiveService");


// Pagination
const pagination =
    document.getElementById("pagination");

const dataInfo =
    document.getElementById("dataInfo");

const itemsPerPage = 5;

let currentPage = 1;



function renderServices(data) {

    serviceTable.innerHTML = "";


    if (data.length === 0) {

        serviceTable.innerHTML = `
            <tr>
                <td colspan="8">
                    Tidak ada layanan ditemukan.
                </td>
            </tr>
        `;

        dataInfo.textContent =
            "Menampilkan 0-0 dari 0 layanan";

        pagination.innerHTML = "";

        return;
    }


    // Hitung jumlah halaman
    const totalPages =
        Math.ceil(data.length / itemsPerPage);


    // Pastikan halaman tetap valid
    if (currentPage > totalPages) {
        currentPage = totalPages;
    }


    // Tentukan data yang ditampilkan
    const startIndex =
        (currentPage - 1) * itemsPerPage;

    const endIndex =
        Math.min(
            startIndex + itemsPerPage,
            data.length
        );


    const pageData =
        data.slice(
            startIndex,
            endIndex
        );


    pageData.forEach(service => {

        const row =
            document.createElement("tr");


        row.innerHTML = `

            <td>
                <strong>${service.id}</strong>
            </td>


            <td>

                <div class="service-table-icon">

                    <img 
                        src="${service.icon}" 
                        alt="${service.name}"
                    >

                </div>

            </td>


            <td>
                <strong>${service.name}</strong>
            </td>


            <td>

                <a
                    href="${service.link}"
                    class="service-link"
                >
                    Lihat Link
                </a>

            </td>


            <td>
                ${service.description}
            </td>


            <td>
                ${service.date}
            </td>


            <td>

                <span
                    class="service-status ${
                        service.status === "Aktif"
                            ? "active"
                            : "inactive"
                    }"
                >
                    ${service.status}
                </span>

            </td>


            <td>

                <a
                    href="/layanan/${service.id}"
                    class="service-detail-btn"
                >
                    <i class="bi bi-eye-fill"></i>
                    Detail
                </a>

            </td>

        `;


        serviceTable.appendChild(row);

    });


    // Update informasi jumlah data
    dataInfo.textContent =
        `Menampilkan ${startIndex + 1}-${endIndex} dari ${data.length} layanan`;


    // Tampilkan pagination
    renderPagination(
        data,
        totalPages
    );

}



function renderPagination(
    data,
    totalPages
) {

    pagination.innerHTML = "";


    // Tidak menampilkan pagination jika hanya satu halaman
    if (totalPages <= 1) {
        return;
    }


    // Tombol Previous
    const previous =
        document.createElement("li");


    previous.className =
        `page-item ${
            currentPage === 1
                ? "disabled"
                : ""
        }`;


    previous.innerHTML = `
        <button
            class="page-link"
            type="button"
        >
            <i class="bi bi-chevron-left"></i>
        </button>
    `;


    previous.addEventListener(
        "click",
        function () {

            if (currentPage > 1) {

                currentPage--;

                filterServices(false);

            }

        }
    );


    pagination.appendChild(previous);



    // Nomor halaman
    for (
        let page = 1;
        page <= totalPages;
        page++
    ) {

        const pageItem =
            document.createElement("li");


        pageItem.className =
            `page-item ${
                page === currentPage
                    ? "active"
                    : ""
            }`;


        pageItem.innerHTML = `
            <button
                class="page-link"
                type="button"
            >
                ${page}
            </button>
        `;


        pageItem.addEventListener(
            "click",
            function () {

                currentPage = page;

                filterServices(false);

            }
        );


        pagination.appendChild(pageItem);

    }



    // Tombol Next
    const next =
        document.createElement("li");


    next.className =
        `page-item ${
            currentPage === totalPages
                ? "disabled"
                : ""
        }`;


    next.innerHTML = `
        <button
            class="page-link"
            type="button"
        >
            <i class="bi bi-chevron-right"></i>
        </button>
    `;


    next.addEventListener(
        "click",
        function () {

            if (currentPage < totalPages) {

                currentPage++;

                filterServices(false);

            }

        }
    );


    pagination.appendChild(next);

}



function filterServices(
    resetPage = true
) {

    // Search dan filter kembali ke halaman pertama
    if (resetPage) {
        currentPage = 1;
    }


    const keyword =
        searchInput.value
            .toLowerCase()
            .trim();


    const status =
        statusFilter.value;


    const filtered =
        services.filter(service => {

            const matchesKeyword =
                service.name
                    .toLowerCase()
                    .includes(keyword)
                ||
                service.id
                    .toLowerCase()
                    .includes(keyword)
                ||
                service.description
                    .toLowerCase()
                    .includes(keyword);


            const matchesStatus =
                status === ""
                ||
                service.status === status;


            return (
                matchesKeyword &&
                matchesStatus
            );

        });


    renderServices(filtered);

}



searchInput.addEventListener(
    "input",
    function () {

        filterServices(true);

    }
);


statusFilter.addEventListener(
    "change",
    function () {

        filterServices(true);

    }
);



function updateStatistics() {

    const total =
        services.length;


    const active =
        services.filter(
            service =>
                service.status === "Aktif"
        ).length;


    const inactive =
        services.filter(
            service =>
                service.status === "Non Aktif"
        ).length;


    totalService.textContent =
        total;


    activeService.textContent =
        active;


    inactiveService.textContent =
        inactive;

}

/* =========================
   TAMBAH LAYANAN
========================= */

const saveServiceBtn =
    document.getElementById("saveServiceBtn");

const serviceIcon =
    document.getElementById("serviceIcon");

const iconPreview =
    document.getElementById("iconPreview");


/* Preview gambar saat dipilih */

serviceIcon.addEventListener(
    "change",
    function () {

        const file = this.files[0];

        if (file) {

            const reader = new FileReader();

            reader.onload = function (e) {

                iconPreview.innerHTML = `
                    <img
                        src="${e.target.result}"
                        alt="Preview Icon"
                    >
                `;

            };

            reader.readAsDataURL(file);

        } else {

            iconPreview.innerHTML = "";

        }

    }
);


/* Tombol Tambah Layanan */

saveServiceBtn.addEventListener(
    "click",
    function () {

        const id =
            document
                .getElementById("serviceId")
                .value
                .trim();


        const iconFile =
            serviceIcon.files[0];


        const name =
            document
                .getElementById("serviceName")
                .value
                .trim();


        const link =
            document
                .getElementById("serviceLink")
                .value
                .trim();


        const description =
            document
                .getElementById("serviceDescription")
                .value
                .trim();


        const date =
            document
                .getElementById("serviceDate")
                .value;


        /* Validasi */

        if (
            !id ||
            !iconFile ||
            !name ||
            !link ||
            !description ||
            !date
        ) {

            alert(
                "Mohon lengkapi semua data layanan."
            );

            return;
        }


        /* Baca gambar */

        const reader = new FileReader();

        reader.onload = function (e) {

            /* Tambahkan data */

            services.push({

                id: id,

                icon: e.target.result,

                name: name,

                link: link,

                description: description,

                date: new Date(date)
                    .toLocaleDateString(
                        "id-ID",
                        {
                            day: "2-digit",
                            month: "long",
                            year: "numeric"
                        }
                    ),

                status: "Aktif"

            });


            /* Refresh tabel */

            currentPage = 1;

            renderServices(services);

            updateStatistics();


            /* Tutup modal */

            const modalElement =
                document.getElementById(
                    "addServiceModal"
                );

            const modal =
                bootstrap.Modal.getInstance(
                    modalElement
                );

            modal.hide();


            /* Reset form */

            document
                .getElementById("serviceId")
                .value = "";

            serviceIcon.value = "";

            iconPreview.innerHTML = "";

            document
                .getElementById("serviceName")
                .value = "";

            document
                .getElementById("serviceLink")
                .value = "";

            document
                .getElementById("serviceDescription")
                .value = "";

            document
                .getElementById("serviceDate")
                .value = "";

        };


        reader.readAsDataURL(iconFile);

    }
);

function editService(id) {

    const service =
        services.find(
            item => item.id === id
        );


    if (!service) {
        return;
    }


    alert(
        `Edit layanan ${service.name}`
    );

}



const notificationBtn =
    document.getElementById(
        "notificationBtn"
    );


const notificationDropdown =
    document.getElementById(
        "notificationDropdown"
    );


if (
    notificationBtn &&
    notificationDropdown
) {

    notificationBtn.addEventListener(
        "click",
        function (event) {

            event.stopPropagation();

            notificationDropdown.classList.toggle(
                "show"
            );

        }
    );

}



const profileBtn =
    document.getElementById(
        "profileBtn"
    );


const profileDropdown =
    document.getElementById(
        "profileDropdown"
    );


if (
    profileBtn &&
    profileDropdown
) {

    profileBtn.addEventListener(
        "click",
        function (event) {

            event.stopPropagation();

            profileDropdown.classList.toggle(
                "show"
            );

        }
    );

}



/* Close dropdown */

document.addEventListener(
    "click",
    function () {

        if (notificationDropdown) {

            notificationDropdown.classList.remove(
                "show"
            );

        }


        if (profileDropdown) {

            profileDropdown.classList.remove(
                "show"
            );

        }

    }
);

const mobileMenuBtn = document.getElementById("mobileMenuBtn");
const sidebar = document.querySelector(".sidebar");
const sidebarCloseBtn = document.getElementById("sidebarCloseBtn");
const menuIcon = document.getElementById("menuIcon");


// ===============================
// BUKA / TUTUP SIDEBAR
// ===============================

mobileMenuBtn.addEventListener("click", function (event) {

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


// ===============================
// TOMBOL X DI SIDEBAR
// ===============================

sidebarCloseBtn.addEventListener("click", function () {

    sidebar.classList.remove("mobile-open");

    menuIcon.classList.remove("bi-x-lg");
    menuIcon.classList.add("bi-list");

});


// ===============================
// KLIK DI LUAR SIDEBAR
// ===============================

document.addEventListener("click", function (event) {

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

renderServices(services);

updateStatistics();