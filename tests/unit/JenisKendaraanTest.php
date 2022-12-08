<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class JenisKendaraanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'jeniskendaraan', [
            'jenis' => 'Pickup',
            'aktif' => 'Y',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "jeniskendaraan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'jeniskendaraan', [
            'jenis' => 'Pickup',
            'aktif' => 'Y',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'jeniskendaraan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'jeniskendaraan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}