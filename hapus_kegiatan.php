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

// Periksa apakah parameter ID kegiatan telah diberikan
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query SQL untuk menghapus data kegiatan berdasarkan ID
    $sql = "DELETE FROM kegiatan WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Data kegiatan berhasil dihapus.";
        header("Location: index.php?message=" . urlencode($message));
    exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID kegiatan tidak diberikan.";
}

mysqli_close($conn);
?>
