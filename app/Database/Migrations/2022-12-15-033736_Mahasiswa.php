<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
			'nrp'          => [
				'type'           => 'INT',
				'constraint'     => 25,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'name_MHS'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email_MHS'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'phone_MHS' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'address_MHS'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);

		
		$this->forge->addKey('nrp', TRUE);
		$this->forge->createTable('mahasiswa', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('mahasiswa');
    }
}
