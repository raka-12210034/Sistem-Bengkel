<?php

namespace App\Database\Seeds;

use App\Database\Migrations\JenisKendaraan;
use App\Models\JenisKendaraan as JenisKendaraanModel;
use App\Models\JenisKendaraanModel as ModelsJenisKendaraanModel;
use CodeIgniter\Database\Seeder;

class JenisKendaraanSeeder extends Seeder
{
    public function run()
    {
        $id = (new ModelsJenisKendaraanModel())->insert([
            'jenis' => 'Pickup',
            'aktif' => 'Y',
        ]);
        echo "hasil id = $id";
    }
}
