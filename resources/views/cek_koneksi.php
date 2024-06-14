<!DOCTYPE html>
<html>
<head>
    <title>Check Database Connection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #333;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Konfigurasi database
        $servername = "localhost"; // Ganti dengan nama server Anda
        $username = "root"; // Ganti dengan nama pengguna database Anda
        $password = ""; // Ganti dengan kata sandi database Anda
        $dbname = "db_agenda_tjs"; // Ganti dengan nama database Anda

        // Mencoba koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Mengecek koneksi
        if ($conn->connect_error) {
            echo "<h1 class='error'>Koneksi Gagal: " . $conn->connect_error . "</h1>";
        } else {
            echo "<h1 class='success'>Koneksi Berhasil</h1>";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </div>
</body>
</html>
