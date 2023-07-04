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

.btn-submit {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-submit:hover {
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
<style>
.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.button:hover {
  background-color: #45a049;
}

.button:active {
  background-color: #3e8e41;
}

.button-icon:before {
  content: "+";
  font-size: 20px;
  margin-right: 5px;
}

.button-back {
  position: fixed;
  top: 20px;
  right: 20px;
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

// Memeriksa apakah parameter ID telah diberikan
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data pengguna berdasarkan ID
    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Menampilkan form edit data pengguna
        echo "<h2>Edit Data User</h2>";
        echo "<form action='proses_edit_user.php' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<label for='nama'>Nama Petugas:</label>";
        echo "<input type='text' name='nama' id='nama' value='" . $row['nama'] . "' required><br><br>";
        echo "<label for='username'>Username:</label>";
        echo "<input type='text' name='username' id='username' value='" . $row['username'] . "' required><br><br>";
        echo "<label for='password'>Password:</label>";
        echo "<input type='text' name='password' id='password' value='" . $row['password'] . "' required><br><br>";
        echo "<label for='alamat'>Alamat:</label>";
        echo "<input type='text' name='alamat' id='alamat' value='" . $row['alamat'] . "' required><br><br>";
        echo "<label for='nomor_telepon'>Telepon:</label>";
        echo "<input type='text' name='nomor_telepon' id='nomor_telepon' value='" . $row['nomor_telepon'] . "' required><br><br>";
        echo "<label for='posisi'>Posisi:</label>";
        echo "<select name='posisi' id='posisi' required>";
        echo "<option value='ketua_rt' " . ($row['posisi'] == 'ketua_rt' ? 'selected' : '') . ">Ketua RT</option>";
        echo "<option value='wakil_ketua_rt' " . ($row['posisi'] == 'wakil_ketua_rt' ? 'selected' : '') . ">Wakil Ketua RT</option>";
        echo "<option value='sekretaris' " . ($row['posisi'] == 'sekretaris' ? 'selected' : '') . ">Sekretaris</option>";
        echo "<option value='bendahara' " . ($row['posisi'] == 'bendahara' ? 'selected' : '') . ">Bendahara</option>";
        echo "<option value='staf' " . ($row['posisi'] == 'staf' ? 'selected' : '') . ">Staf</option>";
        echo "</select><br><br>";
        echo "<input type='file' name='gambar' id='gambar'><br><br>";
        echo "<button type='submit'>Simpan</button>";
        echo "</form>";
    } else {
        echo "Data pengguna tidak ditemukan.";
    }
} else {
    echo "ID tidak diberikan.";
}

// Menutup koneksi ke database
$conn->close();
?>
