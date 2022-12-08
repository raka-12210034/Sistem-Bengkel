<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class KendaraanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'kendaraan', [
            'pelanggan_id'      => '1',
            'jeniskendaraan_id' => '1',
            'no_pol'            => 'KB 7462 ZZ',
            'tahun'             => '2012',
            'warnakendaraan_id' => '1',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "kendaraan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'kendaraan', [
            'pelanggan_id'      => '1',
            'jeniskendaraan_id' => '1',
            'no_pol'            => 'KB 7462 ZZ',
            'tahun'             => '2012',
            'warnakendaraan_id' => '1',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'kendaraan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'kendaraan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}