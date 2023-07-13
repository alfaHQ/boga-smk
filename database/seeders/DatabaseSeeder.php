<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kategori::create([
            'kategori' => 'makanan'
        ]);

        Kategori::create([
            'kategori' => 'minuman'
        ]);

        Menu::create([
            'idkategori' => '1',
            'menu' => 'Mie goreng',
            'gambar' => 'mie-goreng.jpg',
            'deskripsi' => 'mie goreng sedap',
            'harga' => '10000',
        ]);

        Menu::create([
            'idkategori' => '1',
            'menu' => 'Tteoboki',
            'gambar' => 'tteoboki.jpg',
            'deskripsi' => 'tteoboki sedap',
            'harga' => '14000',
        ]);

        Menu::create([
            'idkategori' => '1',
            'menu' => 'Ayam Goreng Kentucky',
            'gambar' => 'kentucky.jpg',
            'deskripsi' => 'kentucky sedap',
            'harga' => '12000',
        ]);

        Menu::create([
            'idkategori' => '2',
            'menu' => 'Teh',
            'gambar' => 'teh.jpg',
            'deskripsi' => 'teh hangat',
            'harga' => '3000',
        ]);

        Menu::create([
            'idkategori' => '2',
            'menu' => 'Es Kelapa',
            'gambar' => 'es-kelapa.jpg',
            'deskripsi' => 'kelapa segar',
            'harga' => '5000',
        ]);

        Pelanggan::create([
            'pelanggan' => 'ucup',
            'email' => 'ucup@gmail.com',
            'password' => bcrypt('ucupganteng'),
            'jeniskelamin' => 'L',
            'alamat' => 'Kemayoran Jakput',
            'telp' => '0887-003-923',
            'aktif' => '1',
        ]);

        User::create([
            'name' => 'amanda',
            'email' => 'amanda@gmail.com',
            'password' => bcrypt('kepolo'),
            'level' => 'manager',
        ]);
    }
}
