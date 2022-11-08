<?php

namespace App\Database\Seeds;

use App\Models\Karyawan as ModelsKaryawan;
use App\Models\KaryawanModel;
use App\Models\StatuspemeriksaanModel;
use CodeIgniter\Database\Seeder;

class StatuspemeriksaanSeeder extends Seeder
{
    public function run()
    {
        $id = (new StatuspemeriksaanModel())->insert([
            'status'    => 'Pesan',
            'urutan'    => '1',
            'aktif'     => 'Y',
        ]);
        echo "hasil id = $id";

    }
}
