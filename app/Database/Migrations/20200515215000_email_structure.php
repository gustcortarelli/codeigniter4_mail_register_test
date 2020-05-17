<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EmailStructure extends Migration {

    public function up() {
        $this->forge->addField([
                'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 9,
                    'unsigned'       => TRUE,
                    'auto_increment' => TRUE
                ],
                'email'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '200',
                ],
                'username' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => '80',
                    'null'           => TRUE,
                ],
                'created_at' => [
                    'type'           => 'TIMESTAMP',
                    'null'           => FALSE,
                ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('email');
    }

    public function down() {
        $this->forge->dropTable('email');
    }

}