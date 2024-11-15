<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsMetaTable extends Migration
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
            'post_id'    => [
                'type'           => 'INT',
                'constraint'     => 100,
            ],
            'title'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
                'null'           => false,
            ],
            'description'    => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => false,
            ],
            'meta_data'    => [
                'type'           => 'JSON',
                'null'           => true,
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
        
        $this->forge->createTable('posts_meta');
    }

    public function down()
    {
        $this->forge->dropTable('posts_meta');
    }
}
