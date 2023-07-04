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

// Memeriksa apakah file gambar telah diunggah
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $gambar = $_FILES['gambar']['tmp_name'];

    // Mengubah gambar menjadi BLOB
    $gambarBlob = addslashes(file_get_contents($gambar));

    // Mendapatkan id dari form
    $id = $_POST['id'];

    // Memperbarui kolom gambar dengan data BLOB
    $updateSql = "UPDATE kegiatan SET judul_kegiatan = '$judul_kegiatan', deskripsi_kegiatan = '$deskripsi_kegiatan', gambar = '$gambarBlob', pelaksanaan_kegiatan = '$pelaksanaan_kegiatan' WHERE id = '$id'";

    if ($conn->query($updateSql) === TRUE) {
        $message = "Data kegiatan berhasil diperbarui.";
        header("Location: data_kegiatan.php?message=" . urlencode($message));
        exit;
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}

// Memeriksa apakah data yang diperlukan telah diberikan
if (isset($_POST['id']) && isset($_POST['judul_kegiatan']) && isset($_POST['deskripsi_kegiatan']) && isset($_POST['pelaksanaan_kegiatan'])) {
    $id = $_POST['id'];
    $judul_kegiatan = $_POST['judul_kegiatan'];
    $deskripsi_kegiatan = $_POST['deskripsi_kegiatan'];
    $pelaksanaan_kegiatan = $_POST['pelaksanaan_kegiatan'];
    $gambar = $_POST['gambar'];

    // Mengupdate data kegiatan berdasarkan id
    $sql = "UPDATE kegiatan SET judul_kegiatan = '$judul_kegiatan', deskripsi_kegiatan = '$deskripsi_kegiatan', pelaksanaan_kegiatan = '$pelaksanaan_kegiatan', gambar = '$gambar' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Data kegiatan berhasil diupdate.";
        header("Location: index.php?message=" . urlencode($message));
        exit;
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
} else {
    echo "Data yang diperlukan tidak lengkap.";
}

// Menutup koneksi ke database
$conn->close();
?>
