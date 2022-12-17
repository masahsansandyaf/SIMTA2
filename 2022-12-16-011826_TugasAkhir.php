<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TugasAkhir extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_TA'          => [
                'type'           => 'INT',
                'constraint'     => 25,
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true
            ],
             'nrp'       => [
                 'type'           => 'INT',
                 'constraint'     => 25,
                 'unsigned'       => true,
                 'null'           => false
             ],
             'nip'      => [
                 'type'           => 'INT',
                 'constraint'     => 25,
                 'unsigned'       => true,
                 'null'           => false
             ],
            'Judul_TA' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'laboratorium'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addKey('id_TA', TRUE);
        $this->forge->addForeignKey('nip', 'dosen', 'nip', '');
        $this->forge->addForeignKey('nrp', 'mahasiswa', 'nrp', '');
        $this->forge->createTable('tugasakhir');
	    
    }

    public function down()
    {
        $this->forge->dropTable('tugasakhir');
    }
}
