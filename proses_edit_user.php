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
    $updateSql = "UPDATE user SET username = '$username', password = '$password', posisi = '$posisi', alamat = '$alamat', nomor_telepon = '$nomor_telepon', gambar='$gambarBlob' WHERE id = '$id'";

    if ($conn->query($updateSql) === TRUE) {
        $message = "Data User berhasil diperbarui.";
        header("Location: user.php?message=" . urlencode($message));
        exit;
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}


// Memeriksa apakah data yang diperlukan telah diberikan
if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['posisi'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $posisi = $_POST['posisi'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $gambar = $_POST['gambar'];

    // Mengupdate data user berdasarkan id
    $sql = "UPDATE user SET username = '$username', password = '$password', posisi = '$posisi', alamat = '$alamat', nomor_telepon = '$nomor_telepon', gambar = '$gambar' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Data User berhasil diupdate.";
        header("Location: user.php?message=" . urlencode($message));
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
