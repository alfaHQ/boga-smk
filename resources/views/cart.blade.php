@extends('front')

@section('content')
    @php
        $no = 1;
        $total = 0;
    @endphp

    @if (session('cart'))
        <div>

            <a class="btn btn-danger my-2" href="{{ url('batal') }}">Batal</a>

            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Menu</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                        <td>Total</td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( session('cart') as $menu=>$idmenu )
                    <tr>
                        <td>{{  $no++ }}</td>
                        <td>{{  $idmenu['menu'] }}</td>
                        <td>{{  $idmenu['harga'] }}</td>
                        <td>
                            <span><a href="{{ url('kurang/' . $idmenu['idmenu']) }}">[-]</a></span>
                            {{  $idmenu['jumlah'] }}
                            <span><a href="{{ url('tambah/' . $idmenu['idmenu']) }}">[+]</a></span>
                        </td>
                        <td>{{  $idmenu['harga'] * $idmenu['jumlah'] }}</td>
                        <td><a href="{{ url('hapus/' . $idmenu['idmenu']) }}">Hapus</a></td>
                    </tr>

                        @php
                            $total = $total + ( $idmenu['harga'] * $idmenu['jumlah'] );
                        @endphp
                    @endforeach

                    <tr>
                        <td colspan="4">Total pembayaran</td>
                        <td>{{ $total }}</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <a class="btn btn-success" href="{{ url('checkout') }}">Checkout</a>
            </div>
        </div>
    @else
        <script>
            window.location.href = '/';
        </script>
    @endif
@endsection