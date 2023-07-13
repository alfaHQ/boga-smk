@extends('Backend.back')

@section('admincontent')
<form action="{{ url('admin/kategori') }}" method="POST">
    @csrf

    <div class="row p-3">
        <div class="col-6">
            <div class="form-group mt-1">
                <label class="form-label" for="">Kategori :</label>
                <input class="form-control" value="{{ old('kategori') }}" type="text" name="kategori">
                <span class="text-danger">
                    @error('kategori')
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