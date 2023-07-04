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

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.print-button {
  background-color: #008CBA;
}

.print-button:hover {
  background-color: #007EA7;
}

    </style>
    <script>
        function confirmLogout() {
            return confirm("Apakah Anda yakin ingin keluar?");
        }

        function printTable() {
    var table = document.getElementById("dataWarga");
    var newWin = window.open('', 'Print', 'width=600,height=600');
    newWin.document.open();
    newWin.document.write('<html><head><title>Data Warga</title></head><body>');
    newWin.document.write('<table>');
    newWin.document.write('<tr>');
    newWin.document.write('<th>No KK</th>');
    newWin.document.write('<th>Kepala Keluarga</th>');
    newWin.document.write('<th>Alamat</th>');
    newWin.document.write('<th>Profile</th>'); // Kolom Profile
    newWin.document.write('</tr>');
    
    // Mengambil data dari tabel sumber
    var rows = table.getElementsByTagName('tr');
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var cols = row.getElementsByTagName('td');
        newWin.document.write('<tr>');
        for (var j = 0; j < cols.length - 1; j++) {
            newWin.document.write('<td>' + cols[j].innerHTML + '</td>');
        }
        newWin.document.write('</tr>');
    }
    
    newWin.document.write('</table>');
    newWin.document.write('</body></html>');
    newWin.document.close();
    newWin.print();
}

function sortTable() {
        var table = document.getElementById("dataWarga");
        var rows = table.rows;

        var sortedRows = Array.from(rows).slice(1); // Mengabaikan baris header
        sortedRows.sort(function(a, b) {
            var namaA = a.cells[1].textContent.toLowerCase();
            var namaB = b.cells[1].textContent.toLowerCase();
            return namaA.localeCompare(namaB);
        });

        for (var i = 0; i < sortedRows.length; i++) {
            table.appendChild(sortedRows[i]);
        }
    }

    window.onload = sortTable; 
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
    <button onclick="location.href='form_input_warga.php'">Tambah</button>
    <button onclick="printTable()">Print</button>
    <h2>Data Warga</h2>
    
    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Masukkan kata kunci" required>
        <input type="submit" value="Cari">
    </form>

    <?php

    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";


            // Koneksi ke database
            $host = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName = 'masyarakat';

            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mencari data warga berdasarkan kata kunci
            $query = "SELECT * FROM warga WHERE KK LIKE '%$keyword%' OR kepala_keluarga LIKE '%$keyword%'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
        // Menampilkan data warga dalam bentuk tabel
        echo "<table id='dataWarga'>";
echo "<tr>
        <th>No KK</th>
        <th>Kepala Keluarga</th>
        <th>Alamat</th>
        <th>Profile</th> <!-- Tambahkan kolom Profile -->
        <th>Tindakan</th>
    </tr>";
                // Tampilkan data warga yang ditemukan
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['KK'] . "</td>";
    echo "<td>" . $row['kepala_keluarga'] . "</td>";
    echo "<td>" . $row['alamat'] . "</td>";
     echo "<td><img src='uploads/" . $row['gambar'] . "' width='100'></td>";
                    // Tambahkan kolom lainnya sesuai kebutuhan
                    echo "<td>
                    <a href='edit_warga.php?KK=" . $row['KK'] . "'>Edit</a> |
                    <a href='hapus_warga.php?KK=" . $row['KK'] . "'>Hapus</a> |
                    <a href='lihat_anggota.php?KK=" . $row['KK'] . "'>Lihat</a> <!-- Tambahkan link Lihat Anggota Keluarga -->
                    <a href='form_input_anggota.php?KK=" . $row['KK'] . "'>Tambah</a> <!-- Tambahkan link Tambah Anggota Keluarga -->
                </td>";
                    echo "</tr>";
                }
            } else {
                // Tampilkan pesan jika tidak ada data yang ditemukan
                echo "<tr><td colspan='4'>Tidak ada data yang ditemukan.</td></tr>";
            }

            // Menutup koneksi
            $conn->close();
            ?>
</body>
</html>
