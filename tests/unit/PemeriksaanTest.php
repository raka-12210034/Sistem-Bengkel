<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PemeriksaanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'pemeriksaan', [
            'tgl'                  => '2022-10-22 08:10:00',            
            'kendaraan_id'         => '1',            
            'kilometer_skr'        => '10',            
            'catatan'              => 'Kendaraan Pertama',            
            'sa_karyawan_id'       => '1',            
            'mon_karyawan_id'      => '1',            
            'tagihan'              => '90',            
            'statuspemeriksaan_id' => '1',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "pemeriksaan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'pemeriksaan', [
            'tgl'                  => '2022-10-22 08:10:00',            
            'kendaraan_id'         => '1',            
            'kilometer_skr'        => '10',            
            'catatan'              => 'Kendaraan Pertama',            
            'sa_karyawan_id'       => '1',            
            'mon_karyawan_id'      => '1',            
            'tagihan'              => '90',            
            'statuspemeriksaan_id' => '1',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'pemeriksaan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'pemeriksaan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}