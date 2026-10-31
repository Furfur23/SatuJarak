
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Persetujuan</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            color: #000;
            margin: 40px auto;
            max-width: 800px;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 12px;
            margin-bottom: 24px;
        }
        .header h2, .header h3, .header p { margin: 2px; }
        .title {
            text-align: center;
            margin: 28px 0;
        }
        .title h3 {
            text-decoration: underline;
            margin-bottom: 4px;
        }
        .content { text-align: justify; }
        table.data { margin: 14px 0 14px 35px; }
        table.data td { padding: 3px 8px; vertical-align: top; }
        .signature {
            width: 260px;
            margin: 45px 0 0 auto;
            text-align: center;
        }
        .signature .name {
            margin-top: 75px;
            font-weight: bold;
            text-decoration: underline;
        }
        .actions { text-align: center; margin-bottom: 25px; }
        .actions button {
            padding: 10px 18px;
            cursor: pointer;
        }
        @media print {
            body { margin: 20mm auto; }
            .actions { display: none; }
        }
    </style>
</head>
<body>

<div class="actions">
    <button onclick="window.print()">Cetak Surat</button>
</div>

<div class="header">
    <h2>PEMERINTAH DESA JARAK</h2>
    <h3>KECAMATAN [NAMA KECAMATAN]</h3>
    <h3>KABUPATEN [NAMA KABUPATEN]</h3>
    <p>Alamat: [Alamat Kantor Desa] | Email: desajarak204@gmail.com</p>
</div>

<div class="title">
    <h3>SURAT KETERANGAN PERSETUJUAN</h3>
    <p>Nomor: [Nomor Surat]</p>
</div>

<div class="content">
    <p>Yang bertanda tangan di bawah ini:</p>

    <table class="data">
        <tr><td>Nama</td><td>:</td><td>[Nama Kepala Desa / Pejabat Berwenang]</td></tr>
        <tr><td>Jabatan</td><td>:</td><td>Kepala Desa Jarak</td></tr>
    </table>

    <p>Dengan ini menerangkan bahwa permohonan kerja sama/kegiatan berikut:</p>

    <table class="data">
        <tr><td>Nama Pemohon</td><td>:</td><td>{{ $pengajuan->nama_lengkap }}</td></tr>
        <tr><td>NIM</td><td>:</td><td>{{ $pengajuan->nim ?: '-' }}</td></tr>
        <tr><td>Instansi</td><td>:</td><td>{{ $pengajuan->nama_instansi }}</td></tr>
        <tr><td>Program Studi</td><td>:</td><td>{{ $pengajuan->program_studi ?: '-' }}</td></tr>
        <tr><td>Jenis Kegiatan</td><td>:</td><td>{{ $pengajuan->jenis_kegiatan }}</td></tr>
        <tr><td>Judul Kegiatan</td><td>:</td><td>{{ $pengajuan->judul_kerjasama }}</td></tr>
        <tr><td>Waktu Pelaksanaan</td><td>:</td><td>
            {{ $pengajuan->tanggal_mulai?->format('d-m-Y') ?: '-' }}
            s.d.
            {{ $pengajuan->tanggal_selesai?->format('d-m-Y') ?: '-' }}
        </td></tr>
    </table>

    <p>
        Berdasarkan permohonan yang telah diajukan, Pemerintah Desa Jarak
        menyatakan bahwa permohonan tersebut
        <strong>DISETUJUI</strong> untuk dilaksanakan dengan tetap
        memperhatikan ketentuan dan koordinasi yang berlaku di lingkungan
        Pemerintah Desa Jarak.
    </p>

    <p>
        Demikian surat keterangan persetujuan ini dibuat agar dapat
        dipergunakan sebagaimana mestinya.
    </p>
</div>

<div class="signature">
    <p>Jarak, {{ now()->translatedFormat('d F Y') }}</p>
    <p>Kepala Desa Jarak</p>
    <div class="name">[Nama Pejabat]</div>
</div>

</body>
</html>
