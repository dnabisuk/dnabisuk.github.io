<!DOCTYPE html>
<html>
<head>
    <title>Website Pengurus RT 3</title>
    <style>
        /* CSS untuk tampilan halaman login */

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: #ff0000;
    margin-bottom: 10px;
}

.success {
    color: #008000;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" name="login" value="Login"> 
    </form>
</body>
</html>

<?php
session_start();

// Cek apakah pengguna telah login sebelumnya
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Jika pengguna sudah login, redirect ke halaman dashboard atau halaman lainnya
    header("Location: index.php");
    exit;
}

// Cek apakah tombol login diklik
if (isset($_POST['login'])) {
    // Ambil nilai inputan dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database (ganti sesuai dengan pengaturan Anda)
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'masyarakat';

    // Membuat koneksi
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Melakukan query untuk memeriksa pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Login berhasil, set session sebagai tanda pengguna telah login
        $_SESSION['logged_in'] = true;
        // Redirect ke halaman dashboard atau halaman lainnya
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Username atau password salah";
    }

    // Menutup koneksi
    $conn->close();
}
?>
