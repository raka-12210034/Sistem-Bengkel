<?php

namespace App\Database\Seeds;

use App\Models\Kendaraan;
use App\Models\KendaraanModel;
use CodeIgniter\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    public function run()
    {
        $id = (new KendaraanModel())->insert([
            'pelanggan_id'      => '1',
            'jeniskendaraan_id' => '1',
            'no_pol'            => 'KB 7462 ZZ',
            'tahun'             => '2012',
            'warnakendaraan_id' => '1',
        ]);
        echo "hasil id = $id";
    }
}
