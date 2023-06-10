
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('sidebar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
    <body>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">Menu</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                                <a href="/admin" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/matkul*') ? 'active' : '' }}">
                                <a href="/admin/matkul" class="nav-link px-0 align-middle">
                                    <i class="bi bi-journal" style="font-size: 1.5rem"></i> <span class="ms-1 d-none d-sm-inline">Mata Kuliah</span></a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/dosen*') ? 'active' : '' }}">
                                <a href="/admin/dosen" class="nav-link px-0 align-middle ">
                                    <i class="bi bi-person-badge" style="font-size: 1.5rem"></i> <span class="ms-1 d-none d-sm-inline">Dosen</span></a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/mhs*') ? 'active' : '' }}">
                                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link  px-0 align-middle">
                                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Mahasiswa</span> </a>
                                    <ul class="collapse nav flex-column ms-1 {{ Request::is('admin/mhs*') ? 'collapse show' : '' }}" id="submenu3" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="/admin/mhs/d3tia" class="nav-link {{ Request::is('admin/mhs/d3tia*') ? 'active' : '' }} px-0"> <span class="d-none d-sm-inline">D3TI</span> .A</a>
                                    </li>
                                    <li>
                                        <a href="/admin/mhs/d3tib" class="nav-link {{ Request::is('admin/mhs/d3tib*') ? 'active' : '' }} px-0"> <span class="d-none d-sm-inline">D3TI</span> .B</a>
                                    </li>
                                    <li>
                                        <a href="/admin/mhs/d3tic" class="nav-link {{ Request::is('admin/mhs/d3tic*') ? 'active' : '' }} px-0"> <span class="d-none d-sm-inline">D3TI</span> .C</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        <div class="dropdown pb-4">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" data-bs-auto-close="true" aria-controls="navbarNavDarkDropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">
                                    @auth
                                        {{ auth()->user()->name }}
                                    @endauth
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow dropup" id="navbarNavDarkDropdown">
                                <li><a class="dropdown-item" href="/home">Ke Halaman Utama</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <li><button class="dropdown-item" href="#">Sign out</button></li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col py-3 px-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>



