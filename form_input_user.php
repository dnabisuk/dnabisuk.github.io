<!DOCTYPE html>
<html>
<head>
    <title>Website Pengurus RT 3</title>
    <link rel="stylesheet" type="text/css" href="tabel.css">
    <style>
.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.button:hover {
  background-color: #45a049;
}

.button:active {
  background-color: #3e8e41;
}

.button-icon:before {
  content: "+";
  font-size: 20px;
  margin-right: 5px;
}

.button-back {
  position: fixed;
  top: 20px;
  right: 20px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

</style>
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
<style>
.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.button:hover {
  background-color: #45a049;
}

.button:active {
  background-color: #3e8e41;
}

.button-icon:before {
  content: "+";
  font-size: 20px;
  margin-right: 5px;
}

.button-back {
  position: fixed;
  top: 20px;
  right: 20px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

</style>
    <style>
        /* CSS untuk tampilan navigasi */
        ul.navigation {
    list-style-type: none;
    margin: 0;
    padding: 0;
    background-color: #4CAF50; /* Ubah warna latar belakang menjadi hijau */
}

ul.navigation li {
    display: inline-block;
}

ul.navigation li a {
    display: block;
    padding: 8px 16px;
    text-decoration: none;
    color: #fff; /* Ubah warna teks menjadi putih */
}

ul.navigation li a:hover {
    background-color: #45a049; /* Ubah warna latar belakang saat dihover menjadi hijau lebih gelap */
}

    </style>
    <script>
        function confirmLogout() {
            return confirm("Apakah Anda yakin ingin keluar?");
        }
    </script>
<ul class="navigation">
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="data_warga.php">Data Warga</a></li>
        <li><a href="respon.php">Pengaduan</a></li>
        <li><a href="user.php">User</a></li>
        <li><a href="logout.php" onclick="return confirmLogout();">Logout</a></li>
    </ul>
<form method="post" action="proses_tambah_user.php" enctype="multipart/form-data">
  <label for="id">ID:</label>
  <input type="text" id="id" name="id" required>
  
  <label for="nama">Nama Pengurus:</label>
  <input type="text" id="nama" name="nama" required>
  
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="alamat">Alamat:</label>
  <input type="alamat" id="alamat" name="alamat" required>

  <label for="nomor_telepon">Telepon:</label>
  <input type="nomor_telepon" id="nomor_telepon" name="nomor_telepon" required>
  
  <label for="posisi">Posisi:</label>
  <select id="posisi" name="posisi" required>
    <option value="ketua_rt">Ketua RT</option>
    <option value="wakil_ketua_rt">Wakil Ketua RT</option>
    <option value="sekretaris">Sekretaris</option>
    <option value="bendahara">Bendahara</option>
    <option value="staf">Staf</option>
  </select>

  <label for="gambar">Gambar:</label>
  <input type="file" name="gambar" id="gambar" accept="image/*"><br><br>
  
  <button type="submit">Simpan</button>
</form>