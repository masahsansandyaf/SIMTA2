<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Revision extends Migration
{
      public function up()
     {
         
         $this->forge->addField([
	 		'id_Revisi'          => [
	 			'type'           => 'INT',
	 			'constraint'     => 25,
	 			'unsigned'       => true,
	 			'auto_increment' => true,
                 'null'           => false
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
              'id_TA'      => [
	 		 	'type'           => 'INT',
	 		 	'constraint'     => 25,
				  'unsigned'       => true,
                  'null'           => false
	 		],
	 		'Ket_revisi' => [
	 			'type'           => 'VARCHAR',
	 			'constraint'     => 100,
	 		],
	 	]);
         $this->forge->addKey('id_Revisi', TRUE);
         $this->forge->addForeignkey('nip','dosen','nip','');
         $this->forge->addForeignkey('nrp','mahasiswa','nrp','');
         $this->forge->addForeignkey('id_TA','tugasakhir','id_TA','');
	 	$this->forge->createTable('revision');
     }

     public function down()
     {
         
         $this->forge->dropTable('revision');
     }
}
