<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Single',
            'deskripsi' => 'Petak makam untuk satu orang.',
            'harga' => 25000000,
        ]);

        Category::create([
            'nama_kategori' => 'Couple',
            'deskripsi' => 'Petak makam untuk dua orang.',
            'harga' => 40000000,
        ]);

        Category::create([
            'nama_kategori' => 'Family',
            'deskripsi' => 'Petak makam untuk keluarga.',
            'harga' => 60000000,
        ]);
    }
}
