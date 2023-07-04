<!DOCTYPE html>
<html>
<head>
    <title>Website Pengurus RT 3</title>
    <link rel="stylesheet" type="text/css" href="tabel.css">
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
    <button onclick="location.href='form_input_kegiatan.php'">Tambah</button>

    
</body>
</html>

<?php
// Koneksi ke database
$host = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "masyarakat"; // Ganti dengan nama database Anda

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data kegiatan dari database
$sql = "SELECT * FROM kegiatan";
$result = mysqli_query($conn, $sql);

?>

<table>
    <thead>
        <tr>
            <th>Nama Kegiatan</th>
            <th>Deskripsi Kegiatan</th>
            <th>Pelaksanaan Kegiatan</th>
            <th>Gambar</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mengecek apakah ada data kegiatan
        if (mysqli_num_rows($result) > 0) {
            // Menampilkan data kegiatan
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['judul_kegiatan'] . "</td>";
                echo "<td>" . $row['deskripsi_kegiatan'] . "</td>";
                echo "<td>" . $row['pelaksanaan_kegiatan'] . "</td>";
                echo "<td><img src='uploads/" . $row['gambar'] . "' width='100'></td>";
                echo "<td>";
                echo "<a href='edit_kegiatan.php?id=" . $row['id'] . "'>Edit</a> | ";
                echo "<a href='hapus_kegiatan.php?id=" . $row['id'] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data kegiatan</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
mysqli_close($conn);
?>
