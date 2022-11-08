<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => ['type'=>'int', 'constraint' => 10 , 'null' => false  , 'unsigned' => true , 'auto_increment' => true],
            'nama_lengkap'    => ['type'=>'varchar', 'constraint' => 60 , 'null' => false  ],
            'email'    => ['type'=>'varchar', 'constraint' => 255 , 'null' => false  ],
            'nohp'    => ['type'=>'varchar' ,'constraint' => 16 , 'null' => true  ],
            'alamat'    => ['type'=>'varchar', 'constraint' => 255 , 'null' => true  ],
            'kota'    => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
            'sandi'    => ['type'=>'varchar', 'constraint' => 60 , 'null' => true  ],
            'token_reset'    => ['type'=>'varchar', 'constraint' => 10 , 'null' => true  ],
            'level'    => ['type'=>'enum("MAN","ADM","SA","MON")', 'null' => true  ],
            'foto'    => ['type'=>'varbinary', 'constraint' => 255 ,'null' => true  ],
            'created_at'    => ['type'=>'datetime', 'null' => true  ],
            'updated_at'    => ['type'=>'datetime', 'null' => true  ],
            'deleted_at'=> ['type'=>'datetime', 'null' => true  ],
           ]);
           $this->forge->addPrimaryKey('id');
           $this->forge->createTable('Karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('Karyawan');
    }
}
