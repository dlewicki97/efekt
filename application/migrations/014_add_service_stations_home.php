<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_service_stations_home extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                        'station_id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                        ),
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
                $this->dbforge->create_table('service_stations_home');
                $this->db->query('ALTER TABLE `service_stations_home` ADD FOREIGN KEY(`station_id`) REFERENCES `service_stations`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;');

        }

        public function down()
        {
                $this->dbforge->drop_table('service_stations_home');
        }
}