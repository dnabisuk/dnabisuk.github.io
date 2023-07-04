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

// Mendapatkan data dari form edit anggota keluarga
$NIK = $_POST['NIK'];
$nama = $_POST['nama'];
$tempatTanggalLahir = $_POST['tempatTanggalLahir'];
$jenisKelamin = $_POST['jenisKelamin'];

// Query untuk mengupdate data anggota keluarga
$query = "UPDATE anggota_keluarga SET nama='$nama', tempat_tanggal_lahir='$tempatTanggalLahir', jenis_kelamin='$jenisKelamin' WHERE NIK='$NIK'";
if ($conn->query($query) === TRUE) {
    $message = "Data keluarga berhasil diupdate.";
    header("Location: data_warga.php?message=" . urlencode($message));
        exit;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
