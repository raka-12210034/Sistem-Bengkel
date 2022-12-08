<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class UnitsatuanTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'unitsatuan', [
            'satuan' => 'kg',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "unitsatuan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'unitsatuan', [
            'satuan' => 'kg',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'unitsatuan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'unitsatuan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}