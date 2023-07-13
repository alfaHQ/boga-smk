@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Kategori</h1>
    </div>

    <div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telp</th>
                <th>Status.,</th>
            </tr>
            
            @php
                $no = 1;
            @endphp
            
            @foreach ( $pelanggans as $pelanggan )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pelanggan->pelanggan }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>{{ $pelanggan->telp }}</td>
                    @php
                        if( $pelanggan->aktif == 0 ) {
                            $status = '<a href="'. url('admin/pelanggan/' . $pelanggan->idpelanggan) .'">BANNED</a>';
                        } else {   
                            $status = '<a href="'. url('admin/pelanggan/' . $pelanggan->idpelanggan) .'">AKTIF</a>';
                        }
                    @endphp
                    <td>{!! $status !!}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $pelanggans->withQueryString()->links() }}
    </div>
@endsection