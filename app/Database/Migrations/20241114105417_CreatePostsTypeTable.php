<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTypeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false,
            ],
            'deleted'    => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 0,
                'null'           => false,
            ],
            'created_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        
        $this->forge->createTable('post_type');
    }

    public function down()
    {
        $this->forge->dropTable('post_type');
    }
}
