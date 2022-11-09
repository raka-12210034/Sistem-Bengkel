<?php

namespace App\Database\Seeds;

use App\Models\MetodebayarModel;
use CodeIgniter\Database\Seeder;

class MetodebayarSeeder extends Seeder
{
    public function run()
    {
        $id = (new MetodebayarModel())->insert([
        'metodebayar' => 'Debit',         
        'keterangan'  => 'Pembayaran Cash',         
        'aktif'       => 'Y',                
        ]);
        echo "hasil id = $id";
    }
}
