<?php

namespace App\Database\Seeds;

use App\Models\BarangJasaModel;
use CodeIgniter\Database\Seeder;

class BarangJasaSeeder extends Seeder
{
    public function run()
    {
        $id = (new BarangJasaModel())->insert([
            'nama' => 'Oli',
            'jenis_bj' => 'B',
            'Unitsatuan_id' => '1',
            'harga_satuan' => '60',
            'keterangan' => 'Ganti Oli',
            
        ]);
        echo "hasil id = $id";
    }
}
