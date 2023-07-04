<?php
// Mengambil nilai dari form
$KK = $_POST['kk'];
$kepala_keluarga = $_POST['kepala_keluarga'];
$alamat = $_POST['alamat'];

// Melakukan koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masyarakat";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengunggah file gambar
$gambar = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$gambar_path = "uploads/" . $gambar;
move_uploaded_file($gambar_tmp, $gambar_path);

// Memasukkan data ke dalam tabel warga
$sql = "INSERT INTO warga (KK, kepala_keluarga, alamat, gambar) VALUES ('$KK', '$kepala_keluarga', '$alamat', '$gambar')";


// ...
if ($conn->query($sql) === TRUE) {
    $message = "Data warga berhasil disimpan.";
    header("Location: data_warga.php?message=" . urlencode($message));
    exit;
} else {
    echo "Terjadi kesalahan: " . $conn->error;
}
// ...


// Menutup koneksi ke database
$conn->close();
?>
