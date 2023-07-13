<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')->select(['menus.*', 'kategoris.*'])->paginate(3);
        $kategoris = Kategori::all();

        return view('Backend.menu.select', ['menus' => $menus, 'kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        
        return view('Backend.menu.insert', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->input());
        $data = $request->validate([
            'idkategori' => 'required',
            'gambar' => 'required|max:2048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $namagambar = $request->file('gambar')->getClientOriginalName();
        $request->gambar->move(public_path('gambar'), $namagambar);

        $idkategori = $data['idkategori'];

        Menu::create([
            'idkategori' => $idkategori,
            'gambar' => $namagambar,
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
        ]);

        return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($idmenu)
    {
        Menu::where('idmenu', $idmenu)->delete();

        return redirect('admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($idmenu)
    {
        $kategoris = Kategori::all();
        $menus = Menu::where('idmenu', $idmenu)->first();
        
        return view('Backend.menu.update', [
            'kategoris' => $kategoris,
            'menus' => $menus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idmenu)
    {
        $data = $request->validate([
            'idkategori' => 'required',
            'gambar' => 'max:2048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        if ( isset($request->gambar) ) {
            $namagambar = $request->file('gambar')->getClientOriginalName();
            $request->gambar->move(public_path('gambar'), $namagambar);
            
            Menu::where('idmenu', $idmenu)->update([
                'idkategori' => $data['idkategori'],
                'gambar' => $namagambar,
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
            ]);
        } else {
            
            Menu::where('idmenu', $idmenu)->update([
                'idkategori' => $data['idkategori'],
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
            ]);
        }

        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function select(Request $request) {
        $id = $request->idkategori;

        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')->select(['menus.*', 'kategoris.*'])
        ->where('menus.idkategori', $id)
        ->paginate(2);
        $kategoris = Kategori::all();

        return view('Backend.menu.select', ['menus' => $menus, 'kategoris' => $kategoris]);
    }
}
