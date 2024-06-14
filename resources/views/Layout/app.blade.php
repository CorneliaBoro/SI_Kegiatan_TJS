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
            background-color: #ffffff; /* Background yang lebih terang untuk form */
            padding: 20px;
            margin-bottom: 40px;
            margin-top:140px;
            border-radius: 8px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        .alert {
            margin-bottom: 20px; /* Memberikan jarak antara alert dan form */
        }
        .center-screen {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.alert-custom {
    background-color: #d4edda; /* Warna background hijau muda */
    color: #155724; /* Warna teks hijau gelap */
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 600px; /* Lebar maksimum untuk penampilan yang baik */
    height: 300px;
    width: 100%;
    margin: 20px auto; /* Posisi tengah secara horizontal */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.alert-custom .icon {
    font-size: 3em;
    margin-bottom: 20px;
}

.btn-group {
        margin-top: 40px; /* Ubah margin-top sesuai kebutuhan */
        display: flex;
        justify-content: space-around; /* Mengatur jarak antara tombol */
        width: 100%;
    }

.btn-group .btn {
        width: 10%; /* Lebar masing-masing tombol */
        border-radius: 12px; /* Mengatur bentuk bulat */
        text-align: center; /* Memastikan teks berada di tengah tombol */
    }
    </style>
</head>
<body>
    <div class="container center-screen">
        @yield('content')
    </div>
</body>
</html>
