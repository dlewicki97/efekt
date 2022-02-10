<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mails extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'BIGINT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                        'answer' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'constraint' => 1,
                        ),
                        'name' => array(
                                'type' => 'TEXT',
                        ),
                        'email' => array(
                                'type' => 'TEXT',
                        ),
                        'phone' => array(
                                'type' => 'TEXT',
                        ),
                        'subject' => array(
                                'type' => 'TEXT',
                        ),
                        'message' => array(
                                'type' => 'TEXT',
                        ),
                        'attachment' => array(
                                'type' => 'TEXT',
                        ),
                        'rodo' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                        ),
                        'rodo_mail' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                        ),
                        'rodo_tel' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('mails');
        }

        public function down()
        {
                $this->dbforge->drop_table('mails');
        }
}