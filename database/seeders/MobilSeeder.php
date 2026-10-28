<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    public function run(): void
    {
        $mobils = [
            [
                'nama' => 'Avanza 1.5 G CVT',
                'brand' => 'Toyota',
                'harga' => 275000000,
                'tahun' => 2024,
                'transmisi' => 'CVT',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
                'foto' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341',
            ],
            [
                'nama' => 'Civic RS Turbo',
                'brand' => 'Honda',
                'harga' => 615000000,
                'tahun' => 2023,
                'transmisi' => 'CVT',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
                'foto' => 'https://images.unsplash.com/photo-1606611013016-969c19ba27bb',
            ],
            [
                'nama' => 'Xpander Ultimate',
                'brand' => 'Mitsubishi',
                'harga' => 330000000,
                'tahun' => 2024,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Bensin',
                'status' => 'sold',
                'foto' => 'https://images.unsplash.com/photo-1494976388531-d1058494cdd8',
            ],
            [
                'nama' => 'Fortuner 2.4 VRZ',
                'brand' => 'Toyota',
                'harga' => 570000000,
                'tahun' => 2023,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Diesel',
                'status' => 'tersedia',
                'foto' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf',
            ],
            [
                'nama' => 'Ioniq 5 Signature',
                'brand' => 'Hyundai',
                'harga' => 780000000,
                'tahun' => 2024,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Listrik',
                'status' => 'tersedia',
                'foto' => 'https://images.unsplash.com/photo-1617788138017-80ad40651399',
            ],
            [
                'nama' => 'Brio RS Manual',
                'brand' => 'Honda',
                'harga' => 205000000,
                'tahun' => 2022,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
                'foto' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70',
            ],
            [
                'nama' => 'Corolla Cross Hybrid',
                'brand' => 'Toyota',
                'harga' => 495000000,
                'tahun' => 2024,
                'transmisi' => 'CVT',
                'bahan_bakar' => 'Hybrid',
                'status' => 'sold',
                'foto' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d',
            ],
        ];

        foreach ($mobils as $mobil) {
            Mobil::create($mobil);
        }
    }
}
