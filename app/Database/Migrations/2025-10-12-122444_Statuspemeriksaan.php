<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statuspemeriksaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => ['type'=>'int', 'constraint' => 10 , 'null' => false  , 'unsigned' => true , 'auto_increment' => true],
            'status'    => ['type'=>'varchar', 'constraint' => 50 , 'null' => false  ],
            'urutan'    => ['type'=>'int', 'constraint' => 50 ,'default'=> 1, 'null' => false , 'unsigned' => true ],
            'aktif'    => ['type'=>'enum("Y","T")' ,'default'=> 'Y' , 'null' => true  ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('statuspemeriksaan');
    }

    public function down()
    {
        $this->forge->dropTable('statuspemeriksaan');
    }
}
