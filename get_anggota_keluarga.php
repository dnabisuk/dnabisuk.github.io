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

// Mendapatkan nomor KK dari parameter GET
$KK = isset($_GET['KK']) ? $_GET['KK'] : "";

// Query untuk mencari data anggota keluarga berdasarkan nomor KK
$query = "SELECT * FROM anggota_keluarga WHERE KK = '$KK'";
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Menambahkan data anggota keluarga ke dalam array
        $data[] = array(
            'NIK' => $row['NIK'],
            'nama' => $row['nama'],
            'tempat_tanggal_lahir' => $row['tempat_tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin']
        );
    }
}

// Mengirimkan data dalam format JSON
echo json_encode($data);

// Menutup koneksi
$conn->close();
?>
