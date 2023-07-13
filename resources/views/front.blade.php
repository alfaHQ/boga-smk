<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boga SMK 3</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>

        body {
            overflow: hidden;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="mt-2">

            <div class="navbar navbar-expand-lg bg-success">
                <div class="container-fluid p-3">
                    <a href="/"><img width="230" src="{{ asset('gambar/logo-sekolah.png') }}" alt=""></a>
                    <ul class="navbar-nav gap-3 text-light">

                        @if( session()->has('cart') )
                           
                            <li class="nav-item">
                                <a href="{{ url('cart') }}">Cart  (
                                    @php
                                        $count = count( session('cart') );
                                        echo $count;
                                    @endphp
                                )
                                </a>
                            </li>
                        @endif

                        @if( session()->missing('idpelanggan') )
                            <li class="nav-item"><a class="btn btn-outline-light" href="{{ url('register') }}">register</a></li>
                            <li class="nav-item"><a class="btn btn-light" href="{{ url('login') }}">Login</a></li>
                        @endif
 
                        @if ( session()->has('idpelanggan') )
                            <li class="nav-item">{{ session('idpelanggan')['email'] }}</li>
                            <li class="nav-item"><a class="btn btn-light" href="{{ url('logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 mt-2">
                <ul class="list-group">
                    @foreach ( $kategoris as $kategori )
                        <a class="text-decoration-none" href="{{ url('show/' . $kategori['idkategori']) }}">
                            <li class="list-group-item border-success">{{ $kategori['kategori'] }}</li>
                        </a>
                    @endforeach
                </ul>
            </div>

            <div class="col-10">
                @yield('content')
            </div>
        </div>

        <div class="bg-light mt-5">
            <p class="text-center">bogasmk.com</p>
        </div>
    </div>
    
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>