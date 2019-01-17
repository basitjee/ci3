<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Modify_blog_author extends CI_Migration {

        public function up()
        {                 
                $field = array(                         
                    'author' => array(
                        'name'          => 'author_name',    
                        'type'          => 'VARCHAR',
                        'constraint'    => '150',
                        'default'       => 'Abdul Basit',
                    ),                          
                );                                 
                $this->dbforge->modify_column('blog', $field);
        }

        public function down()
        {
                $this->dbforge->drop_column('blog', 'author_name');
        }
        
}