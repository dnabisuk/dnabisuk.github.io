<?php
include 'koneksi.php';

// Ambil data dari POST request
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$jenisKelamin = $_POST['jenisKelamin'];
$alamat = $_POST['alamat'];
$keluhan = $_POST['keluhan'];
$diagnosa = $_POST['diagnosa'];
$obat = $_POST['obat'];
$hargaObat = $_POST['hargaObat'];
$lamaPenanganan = $_POST['lamaPenanganan'];
$biayaPenanganan = $_POST['biayaPenanganan'];
$total = $_POST['total'];

// Query SQL untuk menyimpan data
$sql = "INSERT INTO pasien (nama, umur, jenis_kelamin, alamat, keluhan, diagnosa, obat, harga_obat, lama_penanganan, biaya_penanganan, total) VALUES ('$nama', $umur, '$jenisKelamin', '$alamat', '$keluhan', '$diagnosa', '$obat', $hargaObat, '$lamaPenanganan', $biayaPenanganan, $total)";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
