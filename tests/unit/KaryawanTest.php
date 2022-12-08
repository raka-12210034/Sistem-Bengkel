<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
class KaryawanTest extends CIUnitTestCase{

    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post', 'karyawan', [
            'email' => 'admin@gmail.com',
            'sandi' => 'admin'
        ])->assertStatus(302);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post', 'karyawan', [
            'nama_lengkap'  => 'Administrator',
            'email'         => 'admin@gmail.com',
            'nohp'          => '089527384716',
            'alamat'        => 'Jl. Kontraktor Gg. Sawo',
            'kota'          => 'Jakarta Selatan',
            'sandi'         => password_hash('admin', PASSWORD_BCRYPT),
            'token_reset'   => '',
            'level'         => 'MAN',
        ])->getJSON();
        $js = json_decode($json, true);

        $this->assertNotTrue(isset( $js['id']) > 0);

        $this->call('get', "karyawan/". isset ($js['id']))
            ->assertStatus(302);

        $this->call('patch', 'karyawan', [
            'nama_lengkap'  => 'Administrator',
            'email'         => 'admin@gmail.com',
            'nohp'          => '089527384716',
            'alamat'        => 'Jl. Kontraktor Gg. Sawo',
            'kota'          => 'Jakarta Selatan',
            'sandi'         => password_hash('admin', PASSWORD_BCRYPT),
            'token_reset'   => '',
            'level'         => 'MAN',
            'id' => isset($js['id'])
        ])->assertStatus(302);

        $this->call('delete', 'karyawan', [
            'id' => isset($js['id'])
        ])->assertStatus(302);
    }


    public function testRead(){
        $this->call('get', 'karyawan/all')
             ->assertStatus(302);
    }

    public function testLogout(){
        $this->call('delete', 'login')
             ->assertStatus(302);
    }
}