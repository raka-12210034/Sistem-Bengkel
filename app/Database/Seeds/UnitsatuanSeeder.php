<?php

namespace App\Database\Seeds;

use App\Models\UnitsatuanModel;
use CodeIgniter\Database\Seeder;

class UnitsatuanSeeder extends Seeder
{
    public function run()
    {
        $id = (new UnitsatuanModel())->insert([
            'satuan' => 'kg'            
        ]);
        $id = (new UnitsatuanModel())->insert([
            'satuan' => 'qty'            
        ]);
        echo "hasil id = $id";
    }
    
}
