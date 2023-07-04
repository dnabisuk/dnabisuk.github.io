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

    // Mendapatkan nomor KK dari form
    $kk = $_POST['kk'];

    // Memperbarui kolom gambar dengan data BLOB
    $updateSql = "UPDATE warga SET kepala_keluarga = '$kepala_keluarga', alamat = '$alamat', gambar='$gambarBlob' WHERE KK = '$kk'";

    if ($conn->query($updateSql) === TRUE) {
        $message = "Data warga berhasil diperbarui.";
        header("Location: data_warga.php?message=" . urlencode($message));
        exit;
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}


// Memeriksa apakah data yang diperlukan telah diberikan
if (isset($_POST['kk']) && isset($_POST['kepala_keluarga'])  && isset($_POST['alamat']) ) {
    $kk = $_POST['kk'];
    $kepala_keluarga = $_POST['kepala_keluarga'];
    $alamat = $_POST['alamat'];
    $gambar = $_POST['gambar'];

    // Mengupdate data warga berdasarkan nomor KK
    $sql = "UPDATE warga SET kepala_keluarga = '$kepala_keluarga', alamat = '$alamat', gambar = '$gambar' WHERE KK = '$kk'";

    if ($conn->query($sql) === TRUE) {
    $message = "Data Warga berhasil diupdate.";
    header("Location: data_warga.php?message=" . urlencode($message));
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
