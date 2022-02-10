<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_job_offers extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE,
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                        'active' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'constraint' => '1',
                                'default' => 1
                        ),
                        'home_page' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'constraint' => '1',
                                'default' => 0
                        ),
                        'worksite' => array(
                                'type' => 'TEXT'
                        ),
                        'city' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'min_rate' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                        ),
                        'max_rate' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                        ),
                        'currency' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'contract' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                        ),
                        'description' => array(
                                'type' => 'TEXT'
                        ),
                        'requirements' => array(
                                'type' => 'TEXT'
                        ),
                        'offer' => array(
                                'type' => 'TEXT'
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
                $this->dbforge->create_table('job_offers');
        }

        public function down()
        {
                $this->dbforge->drop_table('job_offers');
        }
}