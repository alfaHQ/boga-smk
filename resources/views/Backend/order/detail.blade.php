@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>DETAIL ORDER</h1>
        <h3>Pelanggan : {{ $orders[0]['pelanggan'] }}</h3>
        <h5>Total Bayar : {{ number_format( $orders[0]['total'] ) }}</h5>
    </div>

    <div>
        <table class="table mt-3">
            <tr>
                <th>No</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            
            @php
                $no = 1;
            @endphp
            
            @foreach ( $orders as $order )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $order->menu }}</td>
                    <td>{{ number_format($order->hargajual) }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>{{ number_format( ($order->hargajual * $order->jumlah) ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>

    </div>
@endsection