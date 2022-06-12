<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'foto' => null,
            'nama' => 'Deatrisya M.H',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'tgl_lahir' => '2001-12-18',
            'tempat_lahir' => 'Pasuruan',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Niaga 2'
        ],
        [
            'foto' => null,
            'nama' => 'Siti Aisyah',
            'username' => 'aisyah',
            'email' => 'sitiaisyah4110@gmail.com',
            'password' => Hash::make('aisyah'),
            'tgl_lahir' => '2002-01-14',
            'tempat_lahir' => 'Pasuruan',
            'jenis_kelamin' => 'P',
            'alamat' => 'Jl. Kutuan Timur'
        ]
    );
    }
}
