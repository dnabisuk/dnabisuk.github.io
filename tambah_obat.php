<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        form {
            padding: 20px;
            background-color: #fff;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        nav {
            background-color: #555;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            padding: 20px;
        }
    </style>
</head>
<body>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="pasien.php">Pasien</a>
    <a href="obat.php">Obat</a>
</nav>

<?php
// Proses Form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (gantilah dengan detail koneksi Anda)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rekammedis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari formulir
    $nama_obat = $_POST["nama_obat"];
    $harga_obat = $_POST["harga_obat"];

    // Query SQL untuk menambahkan obat
    $sql = "INSERT INTO obat (nama_obat, harga_obat) VALUES ('$nama_obat', $harga_obat)";

    if ($conn->query($sql) === TRUE) {
        echo "Obat berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="nama_obat">Nama Obat:</label>
    <input type="text" id="nama_obat" name="nama_obat" required>

    <label for="harga_obat">Harga Obat:</label>
    <input type="text" id="harga_obat" name="harga_obat" required placeholder="Rp" oninput="formatCurrency(this)" pattern="[0-9]+">
    
    <button type="submit">Tambah Obat</button>
</form>

<script>
    function formatCurrency(input) {
        // Hapus karakter non-digit
        var numericValue = input.value.replace(/\D/g, '');

        // Format angka dengan menambahkan titik sebagai pemisah ribuan
        var formattedValue = new Intl.NumberFormat('id-ID').format(numericValue);

        // Tampilkan nilai yang telah diformat kembali di input
        input.value = 'Rp ' + formattedValue;
    }
</script>

</body>
</html>
