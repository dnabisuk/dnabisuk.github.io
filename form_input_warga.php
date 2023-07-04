<style>
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
<!DOCTYPE html>
<html>
<head>
    <title>Website Pengurus RT 3</title>
    </head>
<h2>Form Input Data Warga</h2>
<form action="proses_input_warga.php" method="post" enctype="multipart/form-data">
        <label for="kk">Nomor KK:</label>
        <input type="text" name="kk" id="kk" required><br><br>

        <label for="kepala_keluarga">Kepala Keluarga:</label>
        <input type="text" name="kepala_keluarga" id="kepala_keluarga" required><br><br>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" required></textarea><br><br>

        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar" accept="image/*"><br><br>

        <input type="submit" value="Simpan">
    </form>

    