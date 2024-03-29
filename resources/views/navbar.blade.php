<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{ asset('nav.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg" style="padding: 20px 70px">
        <div class="container-fluid">
          <a class="navbar-brand" href="/" style="font-weight: 600">ABSENSI | QR SCAN</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto w-100 justify-content-end">
              <li class="nav-item" style="padding: 0 10px">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="/home" style="font-weight: 500">HOME</a>
              </li>
              <li class="nav-item" style="padding: 0 10px">
                <a class="nav-link {{ Request::is('absen') ? 'active' : '' }}" href="/absen" style="font-weight: 500">ABSEN</a>
              </li>
              <li class="nav-item" style="padding-right: 10px">
                <a class="nav-link {{ Request::is('rekap*') ? 'active' : '' }}" href="/rekap" style="font-weight: 500">REKAP</a>
              </li>
              @auth
              <form action="/logout" method="post">
                @csrf
                <li class="nav-item" style="padding-right: 10px">
                    <button class="nav-link" type="submit" style="border: none;
                    outline: none;
                    background: none;
                    cursor: pointer;
                    padding-top: 10px;
                    text-decoration: none;
                    font-weight: 500;">
                    <i class="bi bi-box-arrow-right"></i> LOGOUT</button>
                </li>
            </form>
              @else
              <li class="nav-item" style="padding-right: 10px">
                <a class="nav-link" href="/login" style="font-weight: 500"><i class="bi bi-box-arrow-in-right"></i> LOGIN</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
