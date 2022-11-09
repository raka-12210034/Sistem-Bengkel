<?php

namespace App\Database\Seeds;

use App\Models\Pembayaran;
use App\Models\PembayaranModel;
use CodeIgniter\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        $id = (new PembayaranModel())->insert([
            'pemeriksaan_id' => '1',
            'tgl_byr'=> '25-10-2022',
            'metodebayar_id' => '1',
            'dibayaroleh' => 'Meh',
            'catatan' => 'selamat',
            'karyawan_id' => '1',
        ]);
        echo "hasil id = $id";
    }
}
