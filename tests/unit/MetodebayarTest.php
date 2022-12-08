<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class MetodebayarTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'metodebayar', [
            'metodebayar' => 'Debit',         
        'keterangan'  => 'Pembayaran Cash',         
        'aktif'       => 'Y',      
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "metodebayar/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'metodebayar', [
            'metodebayar' => 'Debit',         
        'keterangan'  => 'Pembayaran Cash',         
        'aktif'       => 'Y',      
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'metodebayar', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'metodebayar/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}