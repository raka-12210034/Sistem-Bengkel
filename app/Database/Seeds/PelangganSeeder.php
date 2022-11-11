<?php

namespace App\Database\Seeds;

use App\Models\Pelanggan as PelangganModel;
use App\Models\PelangganModel as ModelsPelangganModel;
use CodeIgniter\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $id = (new ModelsPelangganModel())->insert([
            'nama_depan' => 'Bella',
            'nama_belakang' => 'Prisillia',
            'gender' => 'P',
            'alamat' => 'Jl.samaaku Gg.guindia A.12',
            'kota' => 'Serpong',
            'notelp' => '081222003456',
            'hp' => 'POCO X3 NFC',
            'email' => 'bellaimoet@gmail.com',
            'tgl_daftar' => '2001-09-11',
        ]);
        echo "hasil id = $id";
    }
}
