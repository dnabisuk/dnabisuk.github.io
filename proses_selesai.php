<?php
// Mendapatkan ID respon dari form
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Melakukan koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "masyarakat";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Mengupdate nilai keterangan menjadi "Selesai"
    $sql = "UPDATE pengaduan SET keterangan = 'Selesai' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
    $message = "Data Pengaduan berhasil diupdate.";
    header("Location: respon.php?message=" . urlencode($message));
    exit;
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID respon tidak ditemukan.";
}
