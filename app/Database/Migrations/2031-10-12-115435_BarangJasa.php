<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangJasa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true , 'auto_increment' => true ,'null' => false],
            'nama'          => ['type' => 'varchar' , 'constraint' => 100 ,'null' => false],
            'jenis_bj'      => ['type' => 'enum("B","J")' ,'null' => true],
            'unitsatuan_id' => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true , 'null' => true],
            'harga_satuan'  => ['type' => 'double' , 'unsigned' => true , 'null' => true],
            'keterangan'    => ['type' => 'text' , 'null' => true],
            'foto'          => ['type' => 'varbinary' , 'constraint' => 255, 'null' => true],
            'created_at'    => ['type' => 'datetime' , 'null' => true],
            'updated_at'    => ['type' => 'datetime' , 'null' => true],
            'deleted_at'    => ['type' => 'datetime' , 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('unitsatuan_id' , 'unitsatuan' , 'id' , 'cascade');
        $this->forge->createTable('barangjasa');
    }

    public function down()
    {
        $this->forge->dropTable('barangjasa');
    }
}
