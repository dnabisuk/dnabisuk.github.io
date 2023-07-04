<!DOCTYPE html>
<html>
<head>
    <title>Website Pengurus RT 3</title>
    <link rel="stylesheet" type="text/css" href="tabel.css">
    <style>
        /* CSS untuk tampilan navigasi */
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
    <style>
        /* CSS untuk tampilan halaman login */

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

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
    <script>
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
    <button onclick="location.href='form_input_user.php'">Tambah</button>

<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masyarakat";
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query SQL untuk mengambil data user
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

// Cek apakah query berhasil
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nama</th><th>Username</th><th>Posisi</th><th>Alamat</th><th>Telepon</th><th>Profile</th><th>Tindakan</th></tr>";

    // Loop melalui setiap baris data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nama"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["posisi"] . "</td>";
        echo "<td>" . $row["alamat"] . "</td>";
        echo "<td>" . $row["nomor_telepon"] . "</td>";
        echo "<td><img src='uploads/" . $row['gambar'] . "' width='100'></td>";
        echo "<td>
                <a href='edit_user.php?id=" . $row['id'] . "'>Edit</a>
                <a href='hapus_user.php?id=" . $row['id'] . "'>Hapus</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data user.";
}

// Tutup koneksi ke database
$conn->close();
?>

