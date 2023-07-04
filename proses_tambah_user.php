<?php
// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$posisi = $_POST['posisi'];
$alamat = $_POST['alamat'];
$nomor_telepon = $_POST['nomor_telepon'];

// Koneksi ke database
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "masyarakat";
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengupload gambar
$gambar = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$gambar_path = "uploads/" . $gambar;
move_uploaded_file($gambar_tmp, $gambar_path);

// Mengubah gambar menjadi BLOB
$gambarBlob = addslashes(file_get_contents($gambar_path));

// Query SQL untuk menyimpan data user
$sql = "INSERT INTO user (id, nama, username, password, posisi, alamat, nomor_telepon, gambar) VALUES ('$id', '$nama', '$username', '$password', '$posisi', '$alamat', '$nomor_telepon', '$gambar')";
if ($conn->query($sql) === TRUE) {
    $message = "Data User berhasil disimpan.";
    header("Location: user.php?message=" . urlencode($message));
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi ke database
$conn->close();
?>
