<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
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
            'user_id'    => [
                'type'           => 'INT',
                'constraint'     => 100,
            ],
            'type'    => [
                'type'           => 'INT',
                'constraint'     => 11,
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
            'updated_at'  => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
