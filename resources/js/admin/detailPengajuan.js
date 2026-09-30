/* ========================= */
/* DATA PENGAJUAN */
/* ========================= */

const applications = {

    "PGJ-001": {
        id: "PGJ-001",
        name: "Ahmad Fauzi",
        email: "ahmadfauzi@email.com",
        phone: "0812-3456-7890",
        institution: "Universitas Nusantara",
        title: "Pengajuan Kerjasama KKN",
        service: "KKN",
        date: "25 September 2026",
        status: "Menunggu Verifikasi"
    },

    "PGJ-002": {
        id: "PGJ-002",
        name: "Siti Aminah",
        email: "sitiaminah@email.com",
        phone: "0813-4567-8901",
        institution: "Masyarakat",
        title: "Surat Keterangan Domisili",
        service: "Surat Keterangan",
        date: "24 September 2026",
        status: "Sedang Diproses"
    },

    "PGJ-003": {
        id: "PGJ-003",
        name: "Budi Santoso",
        email: "budisantoso@email.com",
        phone: "0814-5678-9012",
        institution: "Desa Jarak",
        title: "Pengajuan Data Kependudukan",
        service: "Kependudukan",
        date: "23 September 2026",
        status: "Selesai"
    },

    "PGJ-004": {
        id: "PGJ-004",
        name: "Universitas Kediri",
        email: "info@unikediri.ac.id",
        phone: "0354-123456",
        institution: "Universitas Kediri",
        title: "Pengajuan Penelitian Desa",
        service: "Penelitian",
        date: "22 September 2026",
        status: "Sedang Diproses"
    },

    "PGJ-005": {
        id: "PGJ-005",
        name: "Dewi Lestari",
        email: "dewilestari@email.com",
        phone: "0815-6789-0123",
        institution: "Masyarakat",
        title: "Pengajuan Administrasi Desa",
        service: "Administrasi",
        date: "21 September 2026",
        status: "Selesai"
    }

};


/* ========================= */
/* GET ID DARI URL */
/* ========================= */

const urlParams = new URLSearchParams(window.location.search);

const applicationId =
    urlParams.get("id") || "PGJ-001";


const application =
    applications[applicationId] || applications["PGJ-001"];


/* ========================= */
/* TAMPILKAN DATA */
/* ========================= */

document.getElementById("applicationId").textContent =
    application.id;

document.getElementById("applicantName").textContent =
    application.name;

document.getElementById("applicantEmail").textContent =
    application.email;

document.getElementById("applicantPhone").textContent =
    application.phone;

document.getElementById("institution").textContent =
    application.institution;

document.getElementById("applicationTitle").textContent =
    application.title;

document.getElementById("applicationService").textContent =
    application.service;

document.getElementById("applicationDate").textContent =
    application.date;


/* ========================= */
/* STATUS */
/* ========================= */

const statusElement =
    document.getElementById("applicationStatus");

statusElement.innerHTML = "";


let statusIcon = "bi-clock-fill";

if (application.status === "Sedang Diproses") {

    statusIcon = "bi-arrow-repeat";
    statusElement.classList.remove("waiting");
    statusElement.classList.add("process");

}

if (application.status === "Selesai") {

    statusIcon = "bi-check-circle-fill";
    statusElement.classList.remove("waiting");
    statusElement.classList.add("complete");

}


statusElement.innerHTML = `
    <i class="bi ${statusIcon}"></i>
    ${application.status}
`;


/* ========================= */
/* NOTIFICATION */
/* ========================= */

const notificationBtn =
    document.getElementById("notificationBtn");

const notificationDropdown =
    document.getElementById("notificationDropdown");

const profileBtn =
    document.getElementById("profileBtn");

const profileDropdown =
    document.getElementById("profileDropdown");


notificationBtn.addEventListener("click", function (event) {

    event.stopPropagation();

    notificationDropdown.classList.toggle("show");

    profileDropdown.classList.remove("show");

});


profileBtn.addEventListener("click", function (event) {

    event.stopPropagation();

    profileDropdown.classList.toggle("show");

    notificationDropdown.classList.remove("show");

});


document.addEventListener("click", function () {

    notificationDropdown.classList.remove("show");

    profileDropdown.classList.remove("show");

});


/* ========================= */
/* VERIFIKASI */
/* ========================= */

const verifyConfirm =
    document.getElementById("verifySubmit");


verifyConfirm.addEventListener("click", function () {

    const originalHTML = this.innerHTML;

    this.innerHTML = `
        <span>Memproses...</span>
        <i class="bi bi-arrow-repeat"></i>
    `;

    this.disabled = true;


    setTimeout(() => {

        application.status = "Sedang Diproses";

        statusElement.className =
            "status-badge process";

        statusElement.innerHTML = `
            <i class="bi bi-arrow-repeat"></i>
            Sedang Diproses
        `;


        const modalElement =
            document.getElementById("verifyModal");

        const modal =
            bootstrap.Modal.getInstance(modalElement);

        modal.hide();


        this.innerHTML = originalHTML;

        this.disabled = false;


        showToast(
            "Pengajuan Diverifikasi",
            "Pengajuan berhasil diverifikasi dan diteruskan."
        );

    }, 900);

});


/* ========================= */
/* PERBAIKI DATA */
/* ========================= */

const reviseConfirm =
    document.getElementById("repairSubmit");

reviseConfirm.addEventListener("click", function () {

    const note =
        document.getElementById("repairNote").value.trim();


    if (!note) {

        document.getElementById("repairNote").focus();

        return;

    }


    const originalHTML = this.innerHTML;

    this.innerHTML = `
        <span>Mengirim...</span>
        <i class="bi bi-arrow-repeat"></i>
    `;

    this.disabled = true;


    setTimeout(() => {

        const modalElement =
            document.getElementById("repairModal");

        const modal =
            bootstrap.Modal.getInstance(modalElement);

        modal.hide();


        document.getElementById("repairNote").value = "";


        this.innerHTML = originalHTML;

        this.disabled = false;


        showToast(
            "Catatan Terkirim",
            "Permintaan perbaikan telah dikirim kepada pemohon."
        );

    }, 900);

});


/* ========================= */
/* TOLAK PENGAJUAN */
/* ========================= */

const rejectConfirm =
    document.getElementById("rejectSubmit");


rejectConfirm.addEventListener("click", function () {

    const note =
        document.getElementById("rejectNote").value.trim();


    if (!note) {

        document.getElementById("rejectNote").focus();

        return;

    }


    const originalHTML = this.innerHTML;

    this.innerHTML = `
        <span>Memproses...</span>
        <i class="bi bi-arrow-repeat"></i>
    `;

    this.disabled = true;


    setTimeout(() => {

        application.status = "Ditolak";


        statusElement.className =
            "status-badge";

        statusElement.style.background =
            "#F8C9D8";

        statusElement.style.color =
            "#C7476F";

        statusElement.innerHTML = `
            <i class="bi bi-x-circle-fill"></i>
            Ditolak
        `;


        const modalElement =
            document.getElementById("rejectModal");

        const modal =
            bootstrap.Modal.getInstance(modalElement);

        modal.hide();


        document.getElementById("rejectNote").value = "";


        this.innerHTML = originalHTML;

        this.disabled = false;


        showToast(
            "Pengajuan Ditolak",
            "Pengajuan telah ditolak dan dicatat."
        );

    }, 900);

});


/* ========================= */
/* TOAST */
/* ========================= */

function showToast(title, message) {

    document.getElementById("toastTitle").textContent =
        title;

    document.getElementById("toastMessage").textContent =
        message;


    const toastElement =
        document.getElementById("successToast");


    const toast =
        new bootstrap.Toast(toastElement, {
            delay: 3500
        });


    toast.show();

}


/* ========================= */
/* DOCUMENT BUTTON */
/* ========================= */

document
    .querySelectorAll(".document-btn")
    .forEach(button => {

        button.addEventListener("click", function () {

            const originalHTML =
                this.innerHTML;


            this.innerHTML = `
                <i class="bi bi-eye-fill"></i>
                Dibuka
            `;


            setTimeout(() => {

                this.innerHTML = originalHTML;

            }, 1200);

        });

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
