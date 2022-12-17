<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TugasAkhir extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_TA'          => [
                'type'           => 'INT',
                'constraint'     => 25,
                'unsigned'       => true,
                'null'           => false,
                'auto_increment' => true
            ],
             'nrp_MHS'       => [
                 'type'           => 'BIGINT',
                 'constraint'     => 25,
                 'unsigned'       => true,
             ],
             'nip_dosen'      => [
                 'type'           => 'BIGINT',
                 'constraint'     => 25,
                 'unsigned'       => true,
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
        $this->forge->addForeignKey('nrp_MHS', 'mahasiswa', 'nrp', 'CASCADE', '');
        $this->forge->addForeignKey('nip_dosen', 'dosen', 'nip', 'CASCADE','');
        $this->forge->createTable('tugasakhir');
    }

    public function down()
    {
        //
        $this->forge->dropTable('tugasakhir');
    }
}
