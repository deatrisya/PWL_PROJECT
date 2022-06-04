<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
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
                'logo' => null,
                'nama_perusahaan' => 'M-de Elektronik',
                'alamat' => 'Jl. Raya Surabaya - Malang No.Sengonagung, Wangkit, Purwosari, Kec. Purwosari, Pasuruan, Jawa Timur 67162'
            ],
            [
                'logo' => null,
                'nama_perusahaan' => 'Bringin Jaya Abadi ',
                'alamat' => 'Sumberingin, Sumbersuko, Kec. Gempol, Pasuruan, Jawa Timur 67155'
            ],
            [
                'logo' => null,
                'nama_perusahaan' => 'DYNASTY COMPUTER INDONESIA',
                'alamat' => 'Perumahan Graha Pandaan, Blk. A No.8-9, Pandaan, Kec. Pandaan, Pasuruan, Jawa Timur 67156'
            ],
            [
                'logo' => null,
                'nama_perusahaan' => 'PT. MILLENIA FURNITURE INDUSTRIES',
                'alamat' => 'Jl. Raya Wonorejo KM 14, Sambisirah, Wonorejo, Cobansari, Coban Blimbing, Kec. Wonorejo, Pasuruan, Jawa Timur 67173'
            ]
        ];
        DB::table('supplier')->insert($dataItem);
    }
}
