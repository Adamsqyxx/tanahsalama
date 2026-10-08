<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plot;
use Illuminate\Database\Seeder;

class PlotSeeder extends Seeder
{
    public function run(): void
    {
        $single = Category::where('nama_kategori', 'Single')->first();
        $couple = Category::where('nama_kategori', 'Couple')->first();
        $family = Category::where('nama_kategori', 'Family')->first();

        // Single
        for ($i = 1; $i <= 10; $i++) {
            Plot::create([
                'category_id' => $single->id,
                'kode_plot' => 'S-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'jenis_lahan' => $i % 2 === 0 ? 'Rumput' : 'Tanah',
                'harga' => $single->harga,
                'status' => 'AVAILABLE',
                'deskripsi' => 'Petak makam kategori Single.',
            ]);
        }

        // Couple
        for ($i = 1; $i <= 10; $i++) {
            Plot::create([
                'category_id' => $couple->id,
                'kode_plot' => 'C-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'jenis_lahan' => $i % 2 === 0 ? 'Rumput' : 'Tanah',
                'harga' => $couple->harga,
                'status' => 'AVAILABLE',
                'deskripsi' => 'Petak makam kategori Couple.',
            ]);
        }

        // Family
        for ($i = 1; $i <= 10; $i++) {
            Plot::create([
                'category_id' => $family->id,
                'kode_plot' => 'F-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'jenis_lahan' => $i % 2 === 0 ? 'Rumput' : 'Tanah',
                'harga' => $family->harga,
                'status' => 'AVAILABLE',
                'deskripsi' => 'Petak makam kategori Family.',
            ]);
        }
    }
}