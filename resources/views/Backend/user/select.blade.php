@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Kategori</h1>
    </div>
    <div>
        <a href="{{ url('admin/user/create') }}" class="btn btn-primary">Tambah Data</a>
        @if ( session()->has('pesan') )
            <p class="alert alert-danger my-2">{{ session()->get('pesan') }}</p>
        @endif
    </div>
    <div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>level</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
            
            @php
                $no = 1;
            @endphp
            
            @foreach ( $users as $user )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->level }}</td>
                    <td><a href="{{ url('admin/user/' . $user->id . '/edit') }}">Ubah password</a></td>
                    <td><a href="{{ url('admin/user/' . $user->id) }}">Hapus</a></td>
                </tr>
                </tr>
            @endforeach
        </table>
    </div>
    <div>

    </div>
@endsection  