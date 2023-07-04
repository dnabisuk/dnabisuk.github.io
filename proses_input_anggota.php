<?php
// Cek apakah metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengecek apakah semua field telah diisi
    if (isset($_POST["KK"]) && isset($_POST["NIK"]) && isset($_POST["nama"]) && isset($_POST["tempat_tanggal_lahir"]) && isset($_POST["jenis_kelamin"])) {
        $KK = $_POST["KK"];
        $NIK = $_POST["NIK"];
        $nama = $_POST["nama"];
        $tempatTanggalLahir = $_POST["tempat_tanggal_lahir"];
        $jenisKelamin = $_POST["jenis_kelamin"];

        // Simpan data anggota keluarga ke database
        // Gantikan dengan kode sesuai dengan database Anda

        // Koneksi ke database
        $host = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'masyarakat';

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk menyimpan data anggota keluarga
        $query = "INSERT INTO anggota_keluarga (KK, NIK, nama, tempat_tanggal_lahir, jenis_kelamin) VALUES ('$KK', '$NIK', '$nama', '$tempatTanggalLahir', '$jenisKelamin')";
        if ($conn->query($query) === TRUE) {
    $message = "Data Anggota Keluarga berhasil disimpan.";
    header("Location: data_warga.php?message=" . urlencode($message));
    exit;
    exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Menutup koneksi
        $conn->close();
    } else {
        echo "Mohon lengkapi semua field.";
    }
} else {
    echo "Metode request tidak valid.";
}
?>
