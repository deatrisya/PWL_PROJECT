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
        ]);
    }
}
