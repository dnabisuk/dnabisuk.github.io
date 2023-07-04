<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota Keluarga</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

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
    <?php
    // Koneksi ke database
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'masyarakat';

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mendapatkan nomor KK dari parameter GET
$KK = $_GET['KK'];
    // Query untuk mendapatkan data anggota keluarga berdasarkan nomor KK
    $query = "SELECT * FROM anggota_keluarga WHERE KK = '$KK'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Menampilkan data anggota keluarga dalam bentuk tabel
        echo "<h2>Data Anggota Keluarga</h2>";
        echo "<table>";
        echo "<tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Tindakan</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['NIK'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['tempat_tanggal_lahir'] . "</td>";
            echo "<td>" . $row['jenis_kelamin'] . "</td>";
            echo "<td>
                      <a href='edit_anggota_keluarga.php?NIK=" . $row['NIK'] . "'>Edit</a> |
                      <a href='hapus_anggota_keluarga.php?NIK=" . $row['NIK'] . "'>Hapus</a>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        // Tampilkan pesan jika tidak ada data anggota keluarga yang ditemukan
        echo "Tidak ada data anggota keluarga yang ditemukan.";
    }

    // Menutup koneksi
    $conn->close();
    ?>
</body>
</html>
