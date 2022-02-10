<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_media extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'BIGINT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

                        'name' => array(
                                'type' => 'TEXT'
                        ),
                        'raw_name' => array(
                                'type' => 'TEXT'
                        ),
                        'type' => array(
                                'type' => 'TEXT'
                        ),
                        'size' => array(
                                'type' => 'float'
                        ),
                        'full_path' => array(
                                'type' => 'TEXT'
                        ),
                        'file_path' => array(
                                'type' => 'TEXT'
                        ),
                        'is_photo' => array(
                                'type' => 'INT',
                                'constraint' => 1
                        ),
                        'photo_webp' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'NULL' => true
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('media');
        }

        public function down()
        {
                $this->dbforge->drop_table('media');
        }
}