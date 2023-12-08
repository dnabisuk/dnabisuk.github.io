<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obat</title>
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

    <header>
        <h1>Obat</h1>
    </header>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="pasien.php">Pasien</a>
        <a href="obat.php">Obat</a>
    </nav>

<!-- Tautan ke halaman tambah_obat.php -->
<button onclick="location.href='tambah_obat.php'">Tambah Obat</button>
</body>
</html>
