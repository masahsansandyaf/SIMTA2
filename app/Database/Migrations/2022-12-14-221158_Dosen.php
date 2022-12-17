<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'nip'          => [
				'type'           => 'BIGINT',
				'constraint'     => 25,
				'unsigned'       => true,
				'auto_increment' => true,
				'null'           => false
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'phone' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'address'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);

		$this->forge->addKey('nip', TRUE);

		$this->forge->createTable('dosen', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('dosen');
    }
}
