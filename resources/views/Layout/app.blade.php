<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan Tunjungsekar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-ux5ag57RPB8gqHIeB3jkzHv5xUp3o0pgKd6Yoho+RDgMQLdhayHyG9+8DPyWO0xZ" crossorigin="anonymous">
    <style>
          .form-container {
        background-color: #ffffff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .alert {
        margin-bottom: 20px;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .alert-custom {
        background-color: #d4edda; /* Warna latar belakang hijau */
        color: #155724; /* Warna teks */
        padding: 40px; /* Padding untuk konten */
        border-radius: 8px; /* Sudut border */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        text-align: center; /* Teks rata tengah */
        max-width: 600px; /* Lebar maksimum */
        margin: 20px auto; /* Margin untuk posisi tengah */
        display: flex; /* Tampilan flexbox */
        flex-direction: column; /* Susunan vertikal */
        justify-content: center; /* Penyusunan konten secara vertikal */
        align-items: center; /* Penyusunan konten secara horizontal */
    }

    .alert-custom .fa-circle-check {
        font-size: 3em; /* Ukuran ikon */
        margin-bottom: 20px; /* Jarak antara ikon dan teks */
    }

    .btn-group {
        margin-top: 40px; /* Jarak dari tombol ke konten di atasnya */
        display: flex; /* Tampilan flexbox */
        justify-content: space-around; /* Penyusunan tombol */
        width: 100%; /* Lebar maksimum */
    }

    .btn-group .btn {
        width: 45%; /* Lebar tombol */
        border-radius: 12px; /* Sudut border tombol */
        text-align: center; /* Teks rata tengah */
    }

    .header {
        background-color: #f8f9fa;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px; /* Tambahkan margin atas */
    }

    .header h1 {
        margin: 0;
        font-size: 2em;
        font-weight: bold;
        color: #343a40;
    }

    .container {
        padding: 20px; /* Padding kontainer */
    }

    .center-screen {
        display: flex; /* Tampilan flexbox */
        justify-content: center; /* Penyusunan konten secara horizontal */
        align-items: center; /* Penyusunan konten secara vertikal */
        min-height: 100vh; /* Tinggi minimum */
        flex-direction: column; /* Susunan vertikal */
    }
    </style>
</head>
<body>
    <div class="container center-screen">
        @yield('content')
    </div>
</body>
</html>
