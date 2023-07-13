@extends('Backend.back')

@section('admincontent')
<form action="{{ url('admin/user/' . $users->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row p-3">
        <div class="col-6">
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
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </div>
</form>
@endsection