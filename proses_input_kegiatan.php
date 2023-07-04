<?php
// Mengambil nilai input dari form
$judulKegiatan = $_POST['judul_kegiatan'];
$deskripsiKegiatan = $_POST['deskripsi_kegiatan'];
$pelaksanaanKegiatan = $_POST['pelaksanaan_kegiatan'];
$gambar = $_POST['gambar'];

// Lakukan validasi data jika diperlukan

// Lakukan koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "masyarakat";

$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi database
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke database: " . mysqli_connect_error();
    exit();
}

$gambar = $_FILES['gambar']['name'];
$gambar_tmp = $_FILES['gambar']['tmp_name'];
$gambar_path = "uploads/" . $gambar;
move_uploaded_file($gambar_tmp, $gambar_path);

// Query untuk menyimpan data kegiatan ke database
$query = "INSERT INTO kegiatan (judul_kegiatan, deskripsi_kegiatan, pelaksanaan_kegiatan, gambar) 
          VALUES ('$judulKegiatan', '$deskripsiKegiatan', '$pelaksanaanKegiatan', '$gambar')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    // Jika data berhasil disimpan, kembalikan ke halaman dashboard
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
