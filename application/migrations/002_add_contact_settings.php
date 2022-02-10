<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_contact_settings extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'company' => array(
                                'type' => 'TEXT',
                        ),
                        'name' => array(
                                'type' => 'TEXT',
                        ),
                        'map' => array(
                                'type' => 'TEXT',
                        ),
                        'address' => array(
                                'type' => 'TEXT',
                        ),
                        'city' => array(
                                'type' => 'TEXT',
                        ),
                        'zip_code' => array(
                                'type' => 'TEXT',
                        ),
                        'nip' => array(
                                'type' => 'TEXT',
                        ),
                        'label_phone1' => array(
                                'type' => 'TEXT',
                        ),
                        'phone1' => array(
                                'type' => 'TEXT',
                        ),
                        'label_phone2' => array(
                                'type' => 'TEXT',
                        ),
                        'phone2' => array(
                                'type' => 'TEXT',
                        ),
                        'label_phone3' => array(
                                'type' => 'TEXT',
                        ),
                        'phone3' => array(
                                'type' => 'TEXT',
                        ),
                        'label_email1' => array(
                                'type' => 'TEXT',
                        ),
                        'email1' => array(
                                'type' => 'TEXT',
                        ),
                        'label_email2' => array(
                                'type' => 'TEXT',
                        ),
                        'email2' => array(
                                'type' => 'TEXT',
                        ),
                        'label_hours' => array(
                                'type' => 'TEXT',
                        ),
                        'hours' => array(
                                'type' => 'TEXT',
                        ),
                        'hours2' => array(
                                'type' => 'TEXT',
                        ),
                        

                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('contact_settings');
        }

        public function down()
        {
                $this->dbforge->drop_table('contact_settings');
        }
}