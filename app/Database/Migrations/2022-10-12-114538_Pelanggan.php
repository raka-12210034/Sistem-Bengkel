<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
       $this->forge->addField([
        'id'             => ['type'=>'int', 'constraint' => 10 , 'null' => false  , 'unsigned' => true , 'auto_increment' => true],
        'nama_depan'     => ['type'=>'varchar', 'constraint' => 50 , 'null' => false  ],
        'nama_belakang'  => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
        'gender'         => ['type'=>'enum("L","P")' , 'null' => true  ],
        'alamat'         => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
        'kota'           => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
        'notelp'         => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
        'hp'             => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
        'email'          => ['type'=>'varchar', 'constraint' => 50 , 'null' => true  ],
        'tgl_daftar'     => ['type'=>'date', 'null' => true  ],
        'created_at'     => ['type'=>'datetime', 'null' => true  ],
        'updated_at'     => ['type'=>'datetime', 'null' => true  ],
        'deleted_at'=> ['type'=>'datetime', 'null' => true  ],
       ]);
       $this->forge->addPrimaryKey('id');
       $this->forge->createTable('Pelanggan');   
    }

    public function down()
    {
        $this->forge->dropTable('Pelanggan');
    }
}
