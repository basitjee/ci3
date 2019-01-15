<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
    // private $data = array();
	
	public function __construct() {
		parent::__construct();				
	}
 	 
	public function index($page = "home") {	    
		$this->load->database();
		
		// Query builder example
		// $users = $this->db->query("SELECT * FROM users WHERE id = 1");
		// $users = $this->db->query("SELECT * FROM users WHERE id = 1")->row();
		// $users = $this->db->query("SELECT * FROM users WHERE id = ?", [3])->row();
		
		// Active records example
		// insert example
		/*
		$this->db->where('id > ', 1);
		$this->db->where('id < ', 7);
		//$this->db->or_where('id = ', 8);
		$this->db->like('username', 's', 'after');				
		$users = $this->db->get('users')->result();	
		*/ 
		
		// insert example
		/*
		$data = array('username' => 'mr', 'email' => 'sdfdsdgsdsf@gmail.com', 'password' => md5('secret'));
		$users = $this->db->insert('users', $data);
		*/
		
		// update example
		/*
		$data 	= array('email' => 'akram2016@gmail.com');
		$this->db->where('id = ', 16);
		$users 	= $this->db->update('users', $data);
	 	*/
	 	
	 	// delete example
	 	/*
	 	$this->db->where('id = ', 16);
		$this->db->delete('users');
	 	*/
	 	
	 	// join example
	 	/*
	 	$this->db->select('users.username , posts.title');
	 	$this->db->join('users', 'posts.user_id = users.id', 'left');
		$posts = $this->db->get('posts')->result(); 
		*/ 
		// echo "<pre>";
		// some following statement works for query and some works for query with row.
		// print_r($users);
		// echo $this->db->last_query();
		// echo "</br>";
		// print_r($posts);
		// print_r($this->db->affected_rows());
		// echo $users->username." : ".$users->email."</br>";
		// print_r($users->num_rows());
		// print_r($users->result());
		// print_r($users->result_array());
	 	// echo "</pre>";
			/*
			foreach($users->result_array() as $user) {
				echo $user['username']." : ";
				echo $user['email']."<br/>";
			}
			 */			 
				
		$this->db->where('parent_id', 0);
        $data['categories']         = $this->db->get('category')->result();     
        $this->data['categories']   = $data['categories'];		 
    		if ($page == "index" || $page == "eng" || $page == "ur") {
    			$page = "home";
    		}
 		$path                        = APPPATH."views/pages/$page.php";
		// $this->load->view("pages/$page.php");				 
			if (file_exists($path)) {
				$this->load->view("pages/$page", $this->data);
			} else {
				show_404();
			}						 			  
	}
	
}
