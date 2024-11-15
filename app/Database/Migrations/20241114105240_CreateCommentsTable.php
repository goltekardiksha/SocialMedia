<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
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
            'user_id'    => [
                'type'           => 'INT',
                'constraint'     => 100,
            ],
            'comment'    => [
                'type'           => 'TEXT',
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
        
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
