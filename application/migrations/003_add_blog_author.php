<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog_author extends CI_Migration {

        public function up()
        {                 
                $field = array(                         
                    'author' => array(
                            'type'          => 'VARCHAR',
                            'constraint'    => '150',
                            'default'       => 'Abdul Basit',
                    ),                          
                );                                 
                $this->dbforge->add_column('blog', $field);
        }

        public function down()
        {
                $this->dbforge->drop_column('blog', 'author');
        }
}

