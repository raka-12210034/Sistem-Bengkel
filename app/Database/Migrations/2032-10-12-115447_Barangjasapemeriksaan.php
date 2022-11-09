<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barangjasapemeriksaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true , 'auto_increment' => true ,'null' => false],
            'pemeriksaan_id'    => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true , 'null' => false],
            'barangjasa_id'    => ['type' => 'int' , 'constraint' => 10 , 'unsigned' => true , 'null' => false],
            'qty'               => ['type' => 'double' , 'unsigned' => true  , 'null' => false],
            'harga_satuan'      => ['type' => 'double' , 'unsigned' => true , 'null' => false],
            'created_at'        => ['type' => 'datetime' ,'null' => true],
            'updated_at'        => ['type' => 'datetime' ,'null' => true],
        ]);
            $this->forge->addPrimaryKey('id');
            $this->forge->addForeignKey('pemeriksaan_id' , 'pemeriksaan' , 'id' , 'cascade');
            $this->forge->addForeignKey('barangjasa_id' , 'barangjasa' , 'id' , 'cascade');
            $this->forge->createTable('barangjasapemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('barangjasapemeriksaan');
    }
}
