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

form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
<?php
// Melakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masyarakat";

$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
  die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengambil data pengaduan dari tabel pengaduan
$sql = "SELECT * FROM pengaduan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Menampilkan data pengaduan dalam bentuk tabel
  echo "<table>";
  echo "<tr>
          <th>No KK</th>
          <th>Kepala Keluarga</th>
          <th>Alamat</th>
          <th>Isi Pengaduan</th>
          <th>Tanggal Pengaduan</th>
          <th>Tindakan</th>
          <th>Keterangan</th>
        </tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['no_kk'] . "</td>";
    echo "<td>" . $row['kepala_keluarga'] . "</td>";
    echo "<td>" . $row['alamat'] . "</td>";
    echo "<td>" . $row['isi_pengaduan'] . "</td>";
    echo "<td>" . $row['tanggal_pengaduan'] . "</td>";
    echo "<td>";
    if ($row['keterangan'] != "Selesai") {
        echo "<form action='proses_selesai.php' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Selesai'>";
        echo "</form>";
    }
    echo "</td>";
    echo "<td>" . $row['keterangan'] . "</td>";
    echo "</tr>";
  }

  echo "</table>";
} else {
  echo "Tidak ada data pengaduan.";
}

// Menutup koneksi ke database
$conn->close();
?>
</body>
</html>
