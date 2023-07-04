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
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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

// Memeriksa apakah parameter KK telah diberikan
if (isset($_GET['KK'])) {
    $kk = $_GET['KK'];

    // Mengambil data warga berdasarkan nomor KK
    $sql = "SELECT * FROM warga WHERE KK = '$kk'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Menampilkan form edit data warga
        echo "<h2>Edit Data Warga</h2>";
        echo "<form action='proses_edit_warga.php' method='POST'>";
        echo "<label for='kk'>KK:</label>";
        echo "<input type='text' name='kk' value='" . $row['KK'] . "' required><br><br>";
        echo "<label for='kepala_keluarga'>Kepala Keluarga:</label>";
        echo "<input type='text' name='kepala_keluarga' id='kepala_keluarga' value='" . $row['kepala_keluarga'] . "' required><br><br>";
        echo "<label for='alamat'>Alamat:</label>";
        echo "<textarea name='alamat' id='alamat' required>" . $row['alamat'] . "</textarea><br><br>";
        echo "<label for='gambar'>Gambar:</label>";
echo "<input type='file' name='gambar' id='gambar'><br><br>";
        echo "<input type='submit' value='Simpan'>";
        echo "</form>";
    } else {
        echo "Data warga tidak ditemukan.";
    }
} else {
    echo "Nomor KK warga tidak diberikan.";
}

// Menutup koneksi ke database
$conn->close();
?>
