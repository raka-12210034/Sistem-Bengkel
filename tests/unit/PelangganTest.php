<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class PelangganTest extends CIUnitTestCase{

    use FeatureTestTrait;


    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'pelanggan', [
            'nama_depan' => 'Bella',
            'nama_belakang' => 'Prisillia',
            'gender' => 'P',
            'alamat' => 'Jl.samaaku Gg.guindia A.12',
            'kota' => 'Serpong',
            'notelp' => '081222003456',
            'hp' => 'POCO X3 NFC',
            'email' => 'bellaimoet@gmail.com',
            'tgl_daftar' => '2001-09-11',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertTrue(isset( $js['id']) > 0);

        $this->call('get', "pelanggan/". isset ($js['id']))
            ->assertStatus(200);

        $this->call('patch', 'pelanggan', [
            'nama_depan' => 'Bella',
            'nama_belakang' => 'Prisillia',
            'gender' => 'P',
            'alamat' => 'Jl.samaaku Gg.guindia A.12',
            'kota' => 'Serpong',
            'notelp' => '081222003456',
            'hp' => 'POCO X3 NFC',
            'email' => 'bellaimoet@gmail.com',
            'tgl_daftar' => '2001-09-11',
            'id' => isset($js['id'])
        ])->assertStatus(200);

        $this->call('delete', 'pelanggan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }


    public function testRead(){
        $this->call('get', 'pelanggan/all')
             ->assertStatus(200);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}