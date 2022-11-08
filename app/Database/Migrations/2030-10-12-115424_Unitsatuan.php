<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Unitsatuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'     => ['type' => 'int', 'constraint' => 10 ,'unsigned' => true , 'auto_increment' => true, 'null' => false],
            'satuan' => ['type' => 'varchar', 'constraint' => 100 ,'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('unitsatuan');
    }

    public function down()
    {
        $this->forge->dropTable('unitsatuan');
        //
    }
}
