@extends('front')

@section('content')

        <form action="{{ url('postlogin') }}" method="POST">
            @csrf

            <div class="row p-3">
                <h1 class="mb-3">Login</h1>

                    @if ( Session::has('pesan') )
                        <div class="alert alert-danger">
                            {{ Session::get('pesan') }}
                        </div>
                    @endif

                <div class="col-6">
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

                <div class="col-8">
                    <div class="mt-3 d-flex justify-content-start">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </div>
        </form>
@endsection