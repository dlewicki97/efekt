<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_settings extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'meta_title' => array(
                                'type' => 'TEXT',
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                        ),
                        'keywords' => array(
                                'type' => 'TEXT',
                        ),
                        'privace' => array(
                                'type' => 'TEXT',
                        ),
                        'logo' => array(
                                'type' => 'TEXT',
                        ),
                        'rodo' => array(
                                'type' => 'TEXT',
                        ),
                        'rodo_tel' => array(
                                'type' => 'TEXT',
                        ),
                        'rodo_mail' => array(
                                'type' => 'TEXT',
                        ),
                        'fb_link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'inst_link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'linked_in_link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'yt_link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'tw_link' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'slogan' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'virtual_map' => array(
                                'type' => 'TEXT',
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('settings');

        }

        public function down()
        {
                $this->dbforge->drop_table('settings');
        }
}