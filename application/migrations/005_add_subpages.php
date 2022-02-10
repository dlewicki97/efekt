<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_subpages extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

                        'title' => array(
                                'type' => 'TEXT',
                        ),
                        'subtitle' => array(
                                'type' => 'TEXT',
                        ),
                        'description' => array(
                                'type' => 'TEXT',
                        ),
                        'photo' => array(
                                'type' => 'TEXT',
                        ),
                        'alt' => array(
                                'type' => 'TEXT',
                        ),
                        'page' => array(
                                'type' => 'TEXT',
                        ),
                        'is_nav' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'constraint' => 1,
                        ),
                        'is_banner' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'constraint' => 1,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('subpages');

                // $this->db->query('ALTER TABLE `subpages` ADD FOREIGN KEY(`nav_category_id`) REFERENCES `navbar_categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');
                
        }

        public function down()
        {
                $this->dbforge->drop_table('subpages');
        }
}