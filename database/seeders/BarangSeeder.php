<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
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
                'kode_barang' => 'M01',
                'foto_barang' => null,
                'nama_barang' => 'Meja Dosen',
                'stok' => '23',
                'kategori_id' => '2'
            ],
            [
                'kode_barang' => 'K01',
                'foto_barang' => null,
                'nama_barang' => 'Komputer Mac',
                'stok' => '121',
                'kategori_id' => '1'
            ]
        ];
        DB::table('barang')->insert($dataItem);
    }
}
