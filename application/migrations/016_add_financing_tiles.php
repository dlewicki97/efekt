<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_financing_tiles extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                        'active' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'constraint' => '1',
                                'default' => 1
                        ),
                        'title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'subtitle' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                        ),
                        'category' => array(
                                'type' => 'ENUM("kredyt","leasing")',
                                'default'=> "kredyt"
                        ),
                        'photo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'photo_webp' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'NULL' => true
                        ),
                        'alt' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'name_photo_1' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'server_photo_1' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'photo2' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'server_photo_2' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'name_photo_2' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'server_photo_3' => array(
                                'type' => 'TEXT',
                        ),
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('financing_tiles');
        }

        public function down()
        {
                $this->dbforge->drop_table('financing_tiles');
        }
}