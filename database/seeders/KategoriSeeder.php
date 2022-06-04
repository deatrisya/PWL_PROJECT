<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataItem = [
            [
                'nama_kategori' => 'Komputer dan Hardware'
            ],
            [
                'nama_kategori' => 'Meja dan Kursi'
            ],
            [
                'nama_kategori' => 'Proyektor'
            ],
            [
                'nama_kategori' => 'Jaringan'
            ],
            [
                'nama_kategori' => 'Alat Praktik Jaringan'
            ]
        ];
        DB::table('kategori')->insert($dataItem);
    }
}
