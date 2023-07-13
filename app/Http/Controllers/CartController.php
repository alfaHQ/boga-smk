<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function beli($idmenu) {

        if( session()->missing('idpelanggan') ) {
            return redirect('login');
        }
        
        $menu = Menu::where('idmenu', $idmenu)->first();

        $cart = session()->get('cart', []);

        if( isset($cart[$idmenu]) ) {
            $cart[$idmenu]['jumlah']++;
        } else {
            $cart[$idmenu] = [
                'idmenu' => $menu->idmenu,
                'menu' => $menu->menu,
                'harga' => $menu->harga,
                'jumlah' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect('cart');     
    }

    public function cart() {
        $kategoris = Kategori::all();

        return view('cart', ['kategoris'=>$kategoris]);
    }

    public function hapus($idmenu) {

        $cart = session()->get('cart');
        
        if ( isset($cart[$idmenu]) ) {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }

        return redirect('cart');
    }

    public function batal() {
        
        session()->forget('cart');

        return redirect('/');
    }

    public function tambah($idmenu) {

        $cart = session()->get('cart');
        $cart[$idmenu]['jumlah']++;

        session()->put('cart', $cart);

        return redirect('cart');
    }

    public function kurang($idmenu) {

        $cart = session()->get('cart');
        
        if ( $cart[$idmenu]['jumlah'] > 1 ) {
            $cart[$idmenu]['jumlah']--;
        } else {
            unset($cart[$idmenu]);
        }

        // kode buatan sendiri

        if( $cart == [] ) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        // buatan sendiri

        return redirect('cart');
    }

    public function checkout() {

        $total = 0;
        $idorder = date('YmdHms');
        
        foreach (session('cart') as $key => $value) {
            $data = [
                'idorder' => $idorder,
                'idmenu' => $value['idmenu'],
                'jumlah' => $value['jumlah'],
                'hargajual' => $value['harga'],
            ];

            $total = $total + ( $value['harga'] * $value['jumlah'] );

            OrderDetail::create($data);
        }

        $data = [
            'idorder' => $idorder,
            'idpelanggan' => session('idpelanggan')['idpelanggan'],
            'tglorder' => date('Y-m-d'),
            'total' => $total,
            'bayar' => 0,
            'kembali' => 0,
            'status' => 0,
        ];

        Order::create($data);

        session()->forget('cart');

        return redirect('/');
    }
}
