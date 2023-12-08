<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien Baru</title>
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

    <header>
        <h1>Pasien Baru</h1>
    </header>

    <form method="post" action="simpan_data.php">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="umur">Umur:</label>
        <input type="text" id="umur" name="umur" required>

        <label for="jenisKelamin">Jenis Kelamin:</label>
        <select id="jenisKelamin" name="jenisKelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="keluhan">Keluhan:</label>
        <textarea id="keluhan" name="keluhan" required></textarea>

        <label for="diagnosa">Diagnosa:</label>
        <textarea id="diagnosa" name="diagnosa" required></textarea>

        <label for="obat">Obat:</label>
        <input type="text" id="obat" name="obat" required>

<label for="hargaObat">Harga Obat:</label>
<input type="text" id="hargaObat" name="hargaObat" required placeholder="Rp" oninput="formatCurrency(this)" pattern="[0-9]+">


        <label>Lama Penanganan (hari):</label>
        <input type="radio" id="kurang10" name="lamaPenanganan" value="kurang10" required onclick="updateBiayaPenanganan()">
        <label for="kurang10">Kurang dari 10 menit</label> = Rp 15.000

        <input type="radio" id="11-25" name="lamaPenanganan" value="11-25" required onclick="updateBiayaPenanganan()">
        <label for="11-25">11-25 menit</label> = Rp 25.000

        <input type="radio" id="lebih40" name="lamaPenanganan" value="lebih40" required onclick="updateBiayaPenanganan()">
        <label for="lebih40">Lebih dari 40 menit</label> = Rp 30.000

        <label for="biayaPenanganan">Biaya Penanganan:</label>
        <input type="text" id="biayaPenanganan" name="biayaPenanganan" readonly required>

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" readonly required>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

<script>
    function formatCurrency(input) {
        // Hapus karakter non-digit
        var numericValue = input.value.replace(/\D/g, '');

        // Format angka dengan menambahkan titik sebagai pemisah ribuan
        var formattedValue = Number(numericValue).toLocaleString('id-ID', { minimumFractionDigits: 0 });

        // Tampilkan nilai yang telah diformat kembali di input
        input.value = 'Rp ' + formattedValue;
    }

    function submitForm() {
        // Tambahkan logika untuk mengirim data formulir ke server
        alert("Formulir dikirim!");
    }

    function updateBiayaPenanganan() {
        var biaya = 0;
        var radios = document.getElementsByName('lamaPenanganan');

        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                var selectedValue = radios[i].value;

                // Sesuaikan biaya berdasarkan lama penanganan
                if (selectedValue === 'kurang10') {
                    biaya = 15000;
                } else if (selectedValue === '11-25') {
                    biaya = 25000;
                } else if (selectedValue === 'lebih40') {
                    biaya = 30000;
                }
                break;
            }
        }

        // Tampilkan biaya pada elemen dengan id 'biayaPenanganan'
        document.getElementById('biayaPenanganan').value = biaya;

        // Ambil nilai harga obat
        var numericHargaObat = document.getElementById('hargaObat').value.replace(/\D/g, '');
        var hargaObat = parseInt(numericHargaObat);

        // Hitung total biaya
        var total = hargaObat + biaya;

        // Tampilkan total biaya pada elemen dengan id 'total'
        document.getElementById('total').value = 'Rp ' + total.toLocaleString('id-ID', { minimumFractionDigits: 0 });
    }
</script>


</body>
</html>
