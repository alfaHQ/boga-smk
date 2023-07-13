@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Menu</h1>
    </div>
    <div>
        <a href="{{ url('admin/menu/create') }}" class="btn btn-primary mb-2">Tambah Data</a>
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <form action="{{ url('admin/select') }}" method="GET">
                <select class="form-select" name="idkategori" onchange="this.form.submit()">
                    <option value="">-- Pilih Kategori --</option>
                   @foreach ( $kategoris as $kategori )
                        <option value="{{ $kategori->idkategori }}">
                            {{ $kategori->kategori }}
                        </option>
                   @endforeach
                </select>
            </form>
        </div>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Menu</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Harga</th>
            </tr>

            @php
                $no = 1;
            @endphp
            
            @foreach ( $menus as $menu )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $menu->kategori }}</td>
                    <td>{{ $menu->menu }}</td>
                    <td>{{ $menu->deskripsi }}</td>
                    <td><img src="{{ asset('gambar/' . $menu->gambar) }}" alt="" width="100px"></td>
                    <td>{{ $menu->harga }}</td>
                    <td><a href="{{ url('admin/menu/' . $menu->idmenu . '/edit') }}">Ubah</a></td>
                    <td><a href="{{ url('admin/menu/' . $menu->idmenu) }}">Hapus</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $menus->withQueryString()->links() }}
    </div>
@endsection