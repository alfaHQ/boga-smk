@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Order Detail</h1>
    </div>
    <div>
        <form action="{{ url('admin/orderdetail/create') }}" method="GET">
        
            <div class="row my-3 align-items-center">
                <div class="form-group col-4">
                    <label class="form-label" for="">Tgl Mulai :</label>
                    <input class="form-control" type="date" name="tglmulai">
                </div>

                <div class="form-group col-4">
                    <label class="form-label" for="">Tgl Akhir :</label>
                    <input class="form-control" type="date" name="tglakhir">
                </div>

                <div class="col-4 mt-4">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
    <div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            
            @php
                $no = 1;
            @endphp
            
            @foreach ( $details as $detail )
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $detail->tglorder }}</td>
                    <td>{{ $detail->pelanggan }}</td>
                    <td>{{ $detail->menu }}</td>
                    <td>{{ $detail->harga }}</td>
                    <td>{{ $detail->jumlah }}</td>
                    <td>{{ $detail->total }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $details->withQueryString()->links() }}
    </div>
@endsection