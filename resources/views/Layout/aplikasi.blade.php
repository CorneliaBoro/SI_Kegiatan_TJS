<!DOCTYPE html>
<html lang="en">

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-ux5ag57RPB8gqHIeB3jkzHv5xUp3o0pgKd6Yoho+RDgMQLdhayHyG9+8DPyWO0xZ" crossorigin="anonymous">

    <title>@yield('title', $title)</title>
</head>

<body>
    <div class="container py-5">
        {{-- <h1>@yield('title', $title)</h1>  --}}
        @yield('content')
    </div>

</body>



</html>
