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
    // Koneksi ke database
    $host = "localhost";
    $username = "root"; // Ganti dengan username database Anda
    $password = ""; // Ganti dengan password database Anda
    $database = "masyarakat"; // Ganti dengan nama database Anda

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }

    // Periksa apakah ada parameter ID yang diberikan
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query SQL untuk mengambil data kegiatan berdasarkan ID
        $sql = "SELECT * FROM kegiatan WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        // Periksa apakah ada data kegiatan dengan ID yang diberikan
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Tampilkan form untuk mengedit kegiatan
            ?>
            <form action="proses_edit_kegiatan.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="judul_kegiatan">Nama Kegiatan:</label>
                <input type="text" name="judul_kegiatan" id="judul_kegiatan" value="<?php echo $row['judul_kegiatan']; ?>" required>

                <label for="deskripsi_kegiatan">Deskripsi Kegiatan:</label>
                <input type="text" name="deskripsi_kegiatan" id="deskripsi_kegiatan" value="<?php echo $row['deskripsi_kegiatan']; ?>" required>

                <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan:</label>
                <input type="date" name="pelaksanaan_kegiatan" id="pelaksanaan_kegiatan" value="<?php echo $row['pelaksanaan_kegiatan']; ?>" required>

                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" value="<?php echo $row['gambar']; ?>" required>

                <input type="submit" value="Simpan">
            </form>
            <?php
        } else {
            echo "Kegiatan tidak ditemukan.";
        }
    } else {
        echo "ID kegiatan tidak diberikan.";
    }

    mysqli_close($conn);
    ?>
