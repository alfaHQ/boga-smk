@extends('Backend.back')

@section('admincontent')
<form action="{{ url('admin/user') }}" method="POST">
    @csrf

    <div class="row p-3">
        <div class="col-6">
            <div class="form-group mt-1 col-4">
                <select class="form-select" name="level">
                    <option value="manager">Manager</option>
                    <option value="kasir">Kasir</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <div class="form-group mt-2">
                <label class="form-label" for="">Nama :</label>
                <input class="form-control" value="{{ old('name') }}" type="text" name="name">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-1">
                <label class="form-label" for="">Email :</label>
                <input class="form-control" value="{{ old('email') }}" type="text" name="email">
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
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</form>
@endsection