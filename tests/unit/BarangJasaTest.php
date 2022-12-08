<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class BarangJasaTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'barangjasa', [
            'nama' => 'Oli',
            'jenis_bj' => 'B',
            'Unitsatuan_id' => '1',
            'harga_satuan' => '60',
            'keterangan' => 'Ganti Oli',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "barangjasa/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'barangjasa', [
            'nama' => 'Oli',
            'jenis_bj' => 'B',
            'Unitsatuan_id' => '1',
            'harga_satuan' => '60',
            'keterangan' => 'Ganti Oli',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'barangjasa', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'barangjasa/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}