<?php 
    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }
 
class Code extends CI_Controller {
    /* Initialize the controller by calling the necessary helpers and libraries */
    public function __construct() 
    {
        parent::__construct();
        /* Load the libraries and helpers */
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'captcha'));
    }
 
    /* The default function that gets called when visiting the page */
    public function index()
    {
        /* Set form validation rules */
        $this->form_validation->set_rules('name', "Name", 'required');
        $this->form_validation->set_rules('captcha', "Captcha", 'required');         
        $userCaptcha    = $this->input->post('captcha');        
        /* Get the user's entered captcha value from the form */
        /* Check if form (and captcha) passed validation*/
        $image          = $this->session->userdata('filename');
            if (file_exists('./captcha_images/'.$image)) {
                unlink('./captcha_images/'.$image);        
            }        
            if ($this->form_validation->run() == true && strcmp(strtolower($userCaptcha), strtolower($this->session->userdata('captchaWord'))) == 0) {
                /** Validation was successful; show the Success view **/
                /* Clear the session variable */
                /* delete captcha file but we need to write this function and also call it in fail case */
                // $this->deleteOldCaptcha('./captcha_images/'.$this->session->userdata('captchaName').'.jpg');
                // $this->session->unset_userdata('captchaName');
                
                $this->session->unset_userdata('captchaWord');
                /* Get the user's name from the form */
                $name = $this->input->post('name');
                /* Pass in the user input to the success view for display */
                $data = array('name' => $name);
                // do as your requirement
                echo "Captcha Passed";
                echo "</br>";
                print_r($data);
                exit;
            } else {
                /** Validation was not successful - Generate a captcha **/
                /* Setup vals to pass into the create_captcha function */
                $captcha = $this->_generateCaptcha();
                
                /* Store the captcha value (or 'word') in a session to retrieve later */
                $this->session->set_userdata('captchaWord', $captcha['word']);
                $this->session->set_userdata('filename', $captcha['filename']);
                
             
                /* Load the captcha view containing the form (located under the 'views' folder) */
                $this->load->view('captcha_view', $captcha);
            }
    }
 
    // this function will create captcha
    private function _generateCaptcha()
    {
        $vals = array(
            'img_path' => './captcha_images/',
            'img_url' => base_url('captcha_images/'),             
            'img_height' => 30,
            'expiration' => 7200,
            'word_length'   => 8,
            'font_size' => 16,
            'colors'    => array(
                /*
                'background'    => array(255,255,255),
                'border'    => array(153,102,102),
                'text'      => array(204,153,153),
                'grid'      => array(255,182,182)
                 */
                'background'    => array(0,0,0),
                'border'    => array(0,0,0),
                'text'      => array(255,255,255),
                'grid'      => array(0,0,0)  
            )
        );
        /* Generate the captcha */
        return create_captcha($vals);
    }
}
/* End of file captcha.php */
/* Location: ./application/controllers/captcha.php */

