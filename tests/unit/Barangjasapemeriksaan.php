<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class BarangjasapemeriksaanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'barangjasapemeriksaan', [
            'pemeriksaan_id' => '1',
            'barangjasa_id'=> '1',
            'qty' => '1',
            'harga_satuan' => '60',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "barangjasapemeriksaan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'barangjasapemeriksaan', [
            'pemeriksaan_id' => '1',
            'barangjasa_id'=> '1',
            'qty' => '1',
            'harga_satuan' => '60',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'barangjasapemeriksaan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'barangjasapemeriksaan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}