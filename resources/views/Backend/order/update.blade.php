@extends('Backend.back')

@section('admincontent')
<form action="{{ url('admin/order/' . $orders->idorder) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <h1>{{ number_format($orders->total) }}</h1>
    </div>

    <div class="row p-3">
        <div class="col-6">
            <div class="form-group mt-1">
                <label class="form-label" for="">Bayar :</label>
                <input class="form-control" min="{{ $orders->total }}" value="{{ $orders->total }}" type="text" name="bayar">
                <span class="text-danger">
                    @error('bayar')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mt-3 d-flex justify-content-start">
                <button class="btn btn-primary" type="submit">Bayar</button>
            </div>
        </div>
    </div>
</form>
@endsection