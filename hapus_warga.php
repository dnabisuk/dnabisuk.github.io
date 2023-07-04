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
if(isset($_GET['KK'])) {
    $kk = $_GET['KK'];

    // Menghapus data warga berdasarkan ID
    $sql = "DELETE FROM warga WHERE KK = $kk";

    if ($conn->query($sql) === TRUE) {
    $message = "Data Warga berhasil diHapus.";
    header("Location: data_warga.php?message=" . urlencode($message));
    exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Parameter ID tidak diberikan.";
}

// Menutup koneksi ke database
$conn->close();
?>
