<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
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
                'nama_ruangan' => 'Ruang Teori '
            ],
            [
                'nama_ruangan' => 'Laboratorium Pemrograman'
            ],
            [
                'nama_ruangan' => 'Laboratorium Proyek'
            ],
            [
                'nama_ruangan' => 'Laboratorium Komputer dan Jaringan'
            ],
            [
                'nama_ruangan' => 'Laboratorium Sistem Informasi'
            ],
            [
                'nama_ruangan' => 'Lab. Sistem Cerdas '
            ],
            [
                'nama_ruangan' => 'Lab. Digital Talent Scholarship'
            ],
            [
                'nama_ruangan' => 'Ruang Meeting'
            ],

            [
                'nama_ruangan' => 'Ruang Ujian'
            ]
        ];
        DB::table('ruangan')->insert($dataItem);
    }
}
