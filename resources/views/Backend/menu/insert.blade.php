@extends('Backend.back')

@section('admincontent')
    <div class="row">
        <div class="col-6">
            <form action="{{ url('admin/menu') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div>
                        <h1>INSERT DATA</h1>
                    </div>
            
                    <select class="form-select" name="idkategori">
                        @foreach ( $kategoris as $kategori )
                            <option value="{{ $kategori->idkategori }}">
                                {{ $kategori->kategori }}
                            </option>
                        @endforeach
                    </select>
                    
                    <div class="form-group mt-1">
                        <label class="form-label" for="">Menu :</label>
                        <input class="form-control" type="text" name="menu">
                        <span class="text-danger">
                            @error('menu')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-1">
                        <label class="form-label" for="">Deskripsi :</label>
                        <input class="form-control" type="text" name="deskripsi">
                        <span class="text-danger">
                            @error('deskripsi')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-1">
                        <label class="form-label" for="">Harga :</label>
                        <input class="form-control" type="number" name="harga">
                        <span class="text-danger">
                            @error('harga')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group mt-1">
                        <label class="form-label" for="">Gambar Menu :</label>
                        <input class="form-control" type="file" name="gambar">
                        <span class="text-danger">
                            @error('gambar')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="mt-3 d-flex justify-content-start">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
            </form>
        </div>
    </div>
@endsection