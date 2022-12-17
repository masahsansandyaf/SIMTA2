<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Revision extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_Revisi'          => [
                'type'           => 'BIGINT',
                'constraint'     => 25,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           => false
            ],
             'MHS_nrp'       => [
                 'type'           => 'BIGINT',
                 'constraint'     => 25,
                 'unsigned'       => true,
                 'null'           => false
             ],
             'dosen_nip'      => [
                 'type'           => 'BIGINT',
                 'constraint'     => 25,
                 'unsigned'       => true,
                 'null'           => false
             ],
             'TA_id'      => [
                 'type'           => 'INT',
                 'constraint'     => 25,
                 'unsigned'       => true,
                 'null'           => false
            ],
            'Status' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'Ket_revisi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 500,
            ],
        ]);
        $this->forge->addKey('id_Revisi', TRUE);
        $this->forge->addForeignKey('MHS_nrp', 'mahasiswa', 'nrp', 'CASCADE', '');
        $this->forge->addForeignKey('dosen_nip', 'dosen', 'nip', 'CASCADE','');
        $this->forge->addForeignKey('TA_id', 'tugasakhir', 'id_TA', 'CASCADE','');
        $this->forge->createTable('revision');
    }

    public function down()
    {
        //
        $this->forge->dropTable('revision');
    }
}
