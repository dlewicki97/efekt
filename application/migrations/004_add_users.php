<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
                        'active' => array(
                                'type' => 'INT',
                                'constraint' => 1,
                        ),
                        'login' => array(
                                'type' => 'TEXT',
                        ),
                        'email' => array(
                                'type' => 'TEXT',
                        ),
                        'password' => array(
                                'type' => 'TEXT',
                        ),
                        'first_name' => array(
                                'type' => 'TEXT',
                        ),
                        'last_name' => array(
                                'type' => 'TEXT',
                        ),
                        'avatar' => array(
                                'type' => 'TEXT',
                        ),
                        'rola' => array(
                                'type' => 'TEXT',
                        ),
                        'server_photo_1' => array(
                                'type' => 'TEXT',
                        ),
                        'server_photo_2' => array(
                                'type' => 'TEXT',
                        ),
                        'server_photo_3' => array(
                                'type' => 'TEXT',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');
                $data = [
                        'active' => 1,
                        'login' => 'admin',
                        'email' => 'dawid.plociennik13@gmail.com',
                        'password' => '$2y$12$w0SOOfP5i7i32aSjxKLZs.ZY0qeaht3Q8Xj.btLaSVsKrK3VLM/ma',
                        'first_name' => 'Dawid',
                        'last_name' => 'Płóciennik',
                        'rola' => 'administrator'
                ];

                $this->db->insert('users', $data);

        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}