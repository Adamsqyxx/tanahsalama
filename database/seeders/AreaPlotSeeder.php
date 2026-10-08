<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Plot;
use Illuminate\Database\Seeder;

class AreaPlotSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            [
                'kode_area' => 'A01',
                'nama_area' => 'Serenity Garden',
                'deskripsi' => 'Area pemakaman yang tenang, nyaman, dan tertata.',
            ],
            [
                'kode_area' => 'A02',
                'nama_area' => 'Harmony Garden',
                'deskripsi' => 'Area pemakaman yang nyaman untuk keluarga.',
            ],
            [
                'kode_area' => 'A03',
                'nama_area' => 'Tranquility Garden',
                'deskripsi' => 'Area dengan suasana sederhana, bersih, dan tenang.',
            ],
        ];

        foreach ($areas as $areaData) {

            $area = Area::create($areaData);

            for ($i = 1; $i <= 40; $i++) {

                $kategori = match ($i % 3) {
                    0 => 'Family',
                    1 => 'Single',
                    2 => 'Couple',
                };

                $status = match ($i) {
                    3, 8, 17, 24, 31 => 'OCCUPIED',
                    5, 12 => 'BOOKED',
                    default => 'AVAILABLE',
                };

                Plot::create([
                    'area_id' => $area->id,
                    'kode_plot' => $area->kode_area . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'kategori' => $kategori,
                    'jenis_lahan' => $i % 2 === 0 ? 'Rumput' : 'Tanah',
                    'harga' => match ($kategori) {
                        'Single' => 25000000,
                        'Couple' => 40000000,
                        'Family' => 60000000,
                    },
                    'status' => $status,
                    'deskripsi' => 'Petak makam ' . $kategori . ' di ' . $area->nama_area . '.',
                ]);
            }
        }
    }
}
