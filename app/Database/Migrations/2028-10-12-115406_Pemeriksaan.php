<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemeriksaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                      => ['type' =>  'int', 'constraint'=> 10 , 'unsigned' => true , 'auto_increment' => true , 'null' => false],
            'tgl'                     => ['type' =>  'datetime', 'null' => false],
            'kendaraan_id'            => ['type' =>  'int', 'constraint' => 10 , 'unsigned' => true , 'null' => false],
            'kilometer_skr'           => ['type' =>  'double', 'null' => true],
            'catatan'                 => ['type' =>  'text', 'null' => true],
            'sa_karyawan_id'          => ['type' =>  'int', 'constraint' => 10 , 'unsigned' => true , 'null' => true],
            'mon_karyawan_id'         => ['type' =>  'int', 'constraint' => 10 , 'unsigned' => true , 'null' => true],
            'tagihan'                 => ['type' =>  'double',  'null' => true],
            'statuspemeriksaan_id'    => ['type' =>  'int', 'constraint' => 10 , 'unsigned' => true , 'null' => false],
            'created_at'              => ['type' =>  'datetime', 'null' => true],
            'updated_at'              => ['type' =>  'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('statuspemeriksaan_id', 'statuspemeriksaan', 'id', 'cascade');
        $this->forge->addForeignKey('kendaraan_id', 'kendaraan', 'id', 'cascade');
        $this->forge->addForeignKey('sa_karyawan_id', 'karyawan', 'id', 'cascade');
        $this->forge->addForeignKey('mon_karyawan_id', 'karyawan', 'id', 'cascade');

        $this->forge->createTable('pemeriksaan');
        
    }
    
    public function down()
    {
        $this->forge->dropTable('pemeriksaan');
        
    }
}
