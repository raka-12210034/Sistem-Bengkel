<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true , 'auto_increment' => true ,'null' => false],
            'pemeriksaan_id'        => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true ,'null' => false],
            'tgl_byr'               => ['type' => 'datetime' ,'null' => true],
            'metodebayar_id'       => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true  ,'null' => false],
            'dibayaroleh'           => ['type' => 'varchar' , 'constraint' => 100,'null' => true],
            'catatan'               => ['type' => 'text'  ,'null' => true],
            'karyawan_id'           => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true  ,'null' => false],
            'total_bayar'           => ['type' => 'double' , 'null' => true],
            'created_at'            => ['type' => 'datetime' ,'null' => true],
            'updated_at'            => ['type' => 'datetime' , 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pemeriksaan_id' , 'pemeriksaan' , 'id' , 'cascade');
        $this->forge->addForeignKey('metodebayar_id' , 'metodebayar' , 'id' , 'cascade');
        $this->forge->addForeignKey('karyawan_id'    , 'karyawan'    , 'id' , 'cascade');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
