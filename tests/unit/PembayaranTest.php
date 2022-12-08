<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PembayaranTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'pembayaran', [
            'pemeriksaan_id' => '1',
            'tgl_byr'=> '25-10-2022',
            'metodebayar_id' => '1',
            'dibayaroleh' => 'Meh',
            'catatan' => 'selamat',
            'karyawan_id' => '1',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "pembayaran/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'pembayaran', [
            'pemeriksaan_id' => '1',
            'tgl_byr'=> '25-10-2022',
            'metodebayar_id' => '1',
            'dibayaroleh' => 'Meh',
            'catatan' => 'selamat',
            'karyawan_id' => '1',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'pembayaran', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'pembayaran/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}