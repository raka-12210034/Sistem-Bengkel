<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kendaraan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type'=>'int', 'constraint' => 10 , 'null' => false  , 'unsigned' => true , 'auto_increment' => true],
            'pelanggan_id'      => ['type'=>'int', 'constraint' => 10 , 'null' => false, 'unsigned' => true  ],
            'jeniskendaraan_id' => ['type'=>'int', 'constraint' => 10 , 'null' => false,'unsigned' => true  ],
            'no_pol'            => ['type'=>'varchar', 'constraint' => 12 , 'null' => true  ],
            'tahun'             => ['type'=>'year', 'constraint' => 4 , 'null' => true  ],
            'warnakendaraan_id' => ['type'=>'int', 'constraint' => 10 , 'null' => true , 'unsigned' => true ],
            'created_at'        => ['type'=>'datetime' , 'null' => true  ],
            'updated_at'         => ['type'=>'datetime' , 'null' => true  ],
            'deleted_at'        => ['type'=>'datetime' , 'null' => true  ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('pelanggan_id', 'pelanggan', 'id', 'cascade');
        $this->forge->addForeignKey('jeniskendaraan_id', 'jeniskendaraan', 'id', 'cascade');
        $this->forge->addForeignKey('warnakendaraan_id', 'warnakendaraan', 'id', 'cascade');
        $this->forge->createTable('kendaraan');
    }

    public function down()
    {
        $this->forge->dropTable('kendaraan');
    }
}
