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

// Mendapatkan NIK anggota keluarga yang akan dihapus dari parameter URL
$NIK = $_GET['NIK'];

// Query untuk menghapus data anggota keluarga berdasarkan NIK
$query = "DELETE FROM anggota_keluarga WHERE NIK='$NIK'";
if ($conn->query($query) === TRUE) {
    $message = "Data keluarga berhasil dihapus.";
    header("Location: data_warga.php?message=" . urlencode($message));
        exit;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
