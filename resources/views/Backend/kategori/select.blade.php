@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Kategori</h1>
    </div>
    <div>
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th></th>
                <th></th>
            </tr>
            
            @php
                $no = 1;
            @endphp
            
            @foreach ( $kategoris as $kategori )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kategori->kategori }}</td>
                    <td><a href="{{ url('admin/kategori/' . $kategori->idkategori . '/edit') }}">Ubah</a></td>
                    <td><a href="{{ url('admin/kategori/' . $kategori->idkategori) }}">Hapus</a></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>

    </div>
@endsection