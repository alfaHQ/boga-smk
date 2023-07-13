<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Boga SMK3</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="row justify-content-center p-3 mt-5">
        <div class="col-4 mt-5">
            <h1 class="mb-3">LOGIN ADMIN</h1>

            <form action="{{ url('admin/postlogin') }}" method="POST">
                @csrf

                @if ( Session::has('pesan') )
                    <div class="alert alert-danger">
                        {{ Session::get('pesan') }}
                    </div>
                @endif

                <div class="form-group mt-1">
                    <label class="form-label" for="">Email :</label>
                    <input class="form-control" value="{{ old('email') }}" type="email" name="email">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
    
                <div class="form-group mt-1">
                    <label class="form-label" for="">Password :</label>
                    <input class="form-control" type="password" name="password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mt-3 d-flex justify-content-start">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>