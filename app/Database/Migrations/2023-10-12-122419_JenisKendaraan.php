<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisKendaraan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => ['type'=>'int', 'constraint' => 10 , 'null' => false  , 'unsigned' => true , 'auto_increment' => true],
            'jenis'    => ['type'=>'varchar', 'constraint' => 60 , 'null' => false  ],
            'aktif'    => ['type'=>'enum("Y","T")' , 'null' => true  ],
        ]);
        $this->forge->addPrimaryKey('id');
       $this->forge->createTable('jeniskendaraan'); 
    }

    public function down()
    {
        $this->forge->dropTable('jeniskendaraan');
    }
}
