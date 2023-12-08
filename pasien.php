<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien</title>
    <style>
        /* Style CSS */
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
        
        /* Style form */
        form {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        form label {
            display: block;
            margin: 10px 0;
        }

        form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <h1>Pasien</h1>
    </header>

    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="pasien.php">Pasien</a>
        <a href="obat.php">Obat</a>
    </nav>
<button onclick="location.href='pasienbaru.php'">Pasien Baru</button>
</body>
</html>
