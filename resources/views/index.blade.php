@extends('layout.main_nofooter')
@section('title', $title)
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('index.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h5>Halo, Selamat datang</h5>
        <h3>Proyek Absensi</h3>
        <h3>Mahasiswa</h3>
        <p>Silahkan login untuk melakukan absensi</p>

        @auth
            <button type="button" class="btn btn-primary" disabled><a href="/login" style="text-decoration: none; color: white;">Login</a></button>
        @else
            <button type="button" class="btn btn-primary"><a href="/login" style="text-decoration: none; color: white;">Login</a></button>
        @endauth
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
@endsection

