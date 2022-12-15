<?php

namespace App\Database\Seeds;

use App\Models\Karyawan;
use App\Models\KaryawanModel;
use App\Models\KendaraanModel;
use App\Models\Statuspemeriksaan;
use App\Models\StatuspemeriksaanModel;
use CodeIgniter\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $id = (new KaryawanModel())->insert([
            'nama_lengkap'  => 'Administrator',
            'email'         => 'admin@gmail.com',
            'nohp'          => '089527384716',
            'alamat'        => 'Jl. Kontraktor Gg. Sawo',
            'kota'          => 'Jakarta Selatan',
            'sandi'         => password_hash('admin', PASSWORD_BCRYPT),
            'token_reset'   => '',
            'level'         => 'MAN',
            'foto'         => '',
        ]);
        echo "hasil id = $id";
        
    }
}
