<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class WarnaKendaraanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'warnakendaraan', [
            'warna' => 'Kuning',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "warnakendaraan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'warnakendaraan', [
            'warna' => 'Kuning',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'warnakendaraan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'warnakendaraan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}