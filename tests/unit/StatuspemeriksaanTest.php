<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class StatuspemeriksaanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'statuspemeriksaan', [
            'status'    => 'Pesan',
            'urutan'    => '1',
            'aktif'     => 'Y',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "statuspemeriksaan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'statuspemeriksaan', [
            'status'    => 'Pesan',
            'urutan'    => '1',
            'aktif'     => 'Y',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'statuspemeriksaan', [
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