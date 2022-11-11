<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeeder extends Seeder
{
    public function run()
    {
        $this->call('pelangganseeder');
        $this->call('jeniskendaraanseeder');
        $this->call('warnakendaraanseeder');
        $this->call('statuspemeriksaanseeder');
        $this->call('kendaraanseeder');
        $this->call('karyawanseeder');
        $this->call('pemeriksaanseeder');
        $this->call('metodebayarseeder');
        $this->call('unitsatuanseeder');
        $this->call('barangjasaseeder');
        $this->call('barangjasapemeriksaanseeder');
        $this->call('pembayaranseeder');
    }
}
