<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */

 class KaryawanTest extends CIUnitTestCase{
    
    use FeatureTestTrait;

    public function testLogin(){
        $this->call('post','login', [
            'email' => 'rakarss11@gmail.com',
            'sandi' => '123456'
        ])->assertStatus(404);
    }

    public function testCreateShowUpdateDelete(){
        $json = $this->call('post' , 'karyawan' , [
            'nama_lengkap'       => 'Raka S',
            'email'      => 'rakarss11@gmail.com',
            'kota'         => 'PTK',
        ])->getJSON();

        $js = json_decode($json, true);
        $this->assertTrue($js['id'] > 0);

        $this->call('get', "karyawan/".$js['id'])
             ->assertStatus(200);

        $this->call('patch' , 'karyawan' ,[
            'nama_lengkap'       => 'Rika S',
            'email'      => 'rakasahal12@gmail.com',
            'kota'         => 'BDG',
            'id' => $js['id']
            ])->assertStatus(200);
            
        $this->call('delete' , 'karyawan', [
            'id' => $js['id']
        ])->assertStatus(200);
    }

    public function testRead(){
        $this->call('get' , 'karyawan/all' )
             ->assertStatus(200);
    }

 }
