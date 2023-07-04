<!DOCTYPE html>
<html>
<head>
    <title>Form Input Anggota Keluarga</title>
    <link rel="stylesheet" type="text/css" href="tabel.css">
    <style>
        /* CSS untuk tampilan halaman login */
        /* ... kode CSS sebelumnya ... */
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: #ff0000;
    margin-bottom: 10px;
}

.success {
    color: #008000;
    margin-bottom: 10px;
}

    </style>
    <style>
        /* CSS untuk tampilan navigasi */
        /* ... kode CSS sebelumnya ... */
        ul.navigation {
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color: #4CAF50; /* Ubah warna latar belakang menjadi hijau */
}

ul.navigation li {
    display: inline-block;
}

ul.navigation li a {
    display: block;
    padding: 8px 16px;
    text-decoration: none;
    color: #fff; /* Ubah warna teks menjadi putih */
}

ul.navigation li a:hover {
    background-color: #45a049; /* Ubah warna latar belakang saat dihover menjadi hijau lebih gelap */
}
    </style>
    <script>
        /* JavaScript untuk konfirmasi logout */
        /* ... kode JavaScript sebelumnya ... */
        function confirmLogout() {
            return confirm("Apakah Anda yakin ingin keluar?");
        }
    </script>
</head>
<body>
<ul class="navigation">
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="data_warga.php">Data Warga</a></li>
        <li><a href="respon.php">Pengaduan</a></li>
        <li><a href="user.php">User</a></li>
        <li><a href="logout.php" onclick="return confirmLogout();">Logout</a></li>
    </ul>
    <h2>Form Input Anggota Keluarga</h2>

    <?php
    // Cek apakah parameter KK (Nomor Kartu Keluarga) ada
    if (isset($_GET['KK'])) {
        $KK = $_GET['KK'];
        // Menampilkan nomor KK yang sedang ditambahkan anggota keluarganya
        echo "<h3>Input Anggota Keluarga untuk KK: $KK</h3>";

        // Form input anggota keluarga
        echo '<form method="POST" action="proses_input_anggota.php">';
        echo '<input type="hidden" name="KK" value="' . $KK . '">'; // Mengirimkan KK sebagai hidden field
        echo '<label>NIK:</label>';
        echo '<input type="text" name="NIK" required><br>';
        echo '<label>Nama:</label>';
        echo '<input type="text" name="nama" required><br>';
        echo '<label>Tempat/Tanggal Lahir:</label>';
        echo '<input type="text" name="tempat_tanggal_lahir" required><br>';
        echo '<label>Jenis Kelamin:</label>';
        echo '<select name="jenis_kelamin" required>';
        echo '<option value="Laki-laki">Laki-laki</option>';
        echo '<option value="Perempuan">Perempuan</option>';
        echo '</select><br>';
        echo '<input type="submit" value="Simpan">';
        echo '</form>';

        // TODO: Tambahkan kode untuk menampilkan anggota keluarga yang sudah terdaftar
    } else {
        echo "Nomor Kartu Keluarga (KK) tidak ditemukan.";
    }
    ?>
</body>
</html>
