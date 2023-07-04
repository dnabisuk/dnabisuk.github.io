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

    // Menghapus data pengguna berdasarkan ID
    $sql = "DELETE FROM user WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
    $message = "Data user berhasil dihapus.";
    header("Location: user.php?message=" . urlencode($message));
    exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID pengguna tidak diberikan.";
}

// Menutup koneksi ke database
$conn->close();
?>
