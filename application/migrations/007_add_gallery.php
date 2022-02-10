<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_gallery extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'BIGINT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

                        'photo' => array(
                                'type' => 'TEXT'
                        ),
                        'photo_webp' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'NULL' => true
                        ),
                        'alt' => array(
                                'type' => 'TEXT'
                        ),
                        'table_name' => array(
                                'type' => 'TEXT'
                        ),
                        'item_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'category' => array(
                                'type' => 'TEXT'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('gallery');
        }

        public function down()
        {
                $this->dbforge->drop_table('gallery');
        }
}