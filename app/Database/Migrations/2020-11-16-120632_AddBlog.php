<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use phpDocumentor\Reflection\PseudoTypes\False_;

class AddBlog extends Migration
{
	public function up()
	{
		$fields = [
                        'id'    => 
                        [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true
                        ],
                        'judul' => 
                        [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'slug'  => 
                        [
                                'type'		=> 'VARCHAR',
                                'constraint'	=> '100',
                                'unique'	=> TRUE,
                        ],
                        'penulis'        => 
                        [
                                'type'           =>'VARCHAR',
                                'constraint'     => 100,
                                'default'        => 'YoKYa',
                        ],
                        'deskripsi' => 
                        [
                                'type'           => 'TEXT',
                                'null'           => true,
                        ],
                        'status'      => 
                        [
                                'type'           => 'ENUM',
                                'constraint'     => ['publish', 'pending', 'draft'],
                                'default'        => 'pending',
                        ],
                        'tipe'          =>
                        [
                                'type'           => 'ENUM',
                                'constraint'     => ['post','halaman'],
                                'default'        => 'halaman',
                        ],
                        'created_at'    =>
                        [
                                'type'          => 'DATETIME',
                                'null'          => true,
                        ],
                        'updated_at'    =>
                        [
                                'type'          => 'DATETIME',
                                'null'          => true,
                        ]
		];
		$this->forge->addField($fields);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('blog');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('blog');
	}
}
