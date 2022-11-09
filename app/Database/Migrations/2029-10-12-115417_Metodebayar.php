<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Metodebayar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'int', 'constraint' => 10 , 'unsigned' => true , 'auto_increment' => true , 'null' => false],
            'metodebayar' => ['type' => 'varchar' , 'constraint' => 50 , 'null' => false],
            'keterangan'  => ['type'  => 'text' , 'null' => true],
            'aktif'       => ['type'  => 'enum("Y","T")' , 'null' => true],
            'created_at'  => ['type'  => 'datetime' , 'null' => true],
            'updated_at'  => ['type'  => 'datetime' , 'null' => true],
            'deleted_at'  => ['type'  => 'datetime' , 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('metodebayar');
        
        
    }
    
    public function down()
    {
        $this->forge->dropTable('metodebayar');
        //
    }
}
