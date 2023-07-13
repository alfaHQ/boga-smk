@extends('front')

@section('content')

        <form action="{{ url('postregister') }}" method="POST">
            @csrf

            <div class="row p-3">
                <h1 class="mb-3">Formulir Registrasi</h1>

                <div class="col-5">
                    <div class="form-group mt-1">
                        <label class="form-label" for="">Pelanggan :</label>
                        <input class="form-control" value="{{ old('pelanggan') }}" type="text" name="pelanggan">
                        <span class="text-danger">
                            @error('pelanggan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
        
                    <div class="form-group mt-1">
                        <label class="form-label" for="">Jenis Kelamin :</label>
                        <select class="form-select" name="jeniskelamin">
                            <option value="l">L</option>
                            <option value="p" selected>P</option>
                        </select>
                    </div>

                    <div class="form-group mt-1">
                        <label class="form-label" for="">Alamat :</label>
                        <input class="form-control" value="{{ old('alamat') }}" type="text" name="alamat">
                        <span class="text-danger">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group mt-1">
                        <label class="form-label" for="">Telp. :</label>
                        <input class="form-control" value="{{ old('telp') }}" type="text" name="telp">
                        <span class="text-danger">
                            @error('telp')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
        
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
                </div>

                <div class="col-10">
                    <div class="mt-3 d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </div>
            </div>
        </form>
@endsection