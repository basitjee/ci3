<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Ajax_form extends CI_Controller {
    private $data = array();
    
        public function __construct() {
                parent::__construct();
                // Put your own constructor code here
                // load your model here if any DB operations through model
                // $this->load->model('demo/form_model','fm');
                $this->load->model('demo/form_model');
        }
        
        public function index() {
                // Index page which gets loaded when someone visits /demo/ajax_form
                //Load CI form and url helpers needed later
                // $this->load->helper(array('form','url'));
                // Load CI form_validation library    
                $this->load->library('form_validation');
                //Below line sets validation rules. 'name' has been made required. The rules are automatically
                // enforced by CI form validation library.
                $this->form_validation->set_rules('name', 'Name', 'required');

                if (!($this->input->post(NULL,TRUE)) )
                {
                    // This loop is executed when the form loads initially and no data has been submitted.
                    // Load the form to be seen and submitted by user. This form is created at demo/form_view
                    // under view folder. If form is located at any other place , change the below accordingly.
                        $this->load->view('demo/form_view');
                }
                elseif ($this->input->post(NULL,TRUE) AND $this->form_validation->run() === FALSE)
                {
                        // '$this->input->post(NULL,TRUE)' ensures that data has been submitted through POST method
                        // and CI returns all the data through XSS filtering.
                        // '$this->form_validation->run() === FALSE' checks if the form has passed all the validation rules
                        // or not. FALSE is returned when any validation fails.
                        // this loop will execute only when data has been submitted through POST and form validations failed.
                        $form_ret['error'] = 'Y' ; // Setting error indicator to 'Y' 
                        $form_ret['message'] = validation_errors() ; // Return validation error messages back to form
                        die(json_encode($form_ret)); // JSON encode all the values and return them back to calling form. die() ensures that control returns back and no further code is executed.
                        
                }                
                else
                {
                        // This loop is executed when the form has been submitted and there are no form validation errors
                        // Values from the POST can be extracted as below and used either for display or stored in database.
                        //var_dump($this->input->post(NULL,TRUE)) ; // Use this if you want to check the array submitted through POST.
                        $name = $this->input->post(NULL,TRUE)['name'] ;
                        $dob = $this->input->post(NULL,TRUE)['dob'] ;
                        $email = $this->input->post(NULL,TRUE)['email'] ;
                        $form_ret['error'] = 'N' ; // Set error indicator to 'N'
                        // setting some success message and passing back the submitted values to be displayed.
                        // In a real application, you may want to store the submitted values in database or process
                        // them as per your application logic.
                        $data = array(
                            'name'    => $name,
                            'dob'     => $dob,
                            'email'   => $email,
                        );
                        $insert = $this->form_model->insert('persons', $data);                         
                            if ($insert) {
                                // echo "Data Inserted Successfully";        
                            }
                        $form_ret['message'] = "Successfully submitted. Name: $name , date of birth: $dob, Email: $email" ;                         
                        die(json_encode($form_ret)); // JSON encode the return values and pass the control back
                        /*
                                                  
                        */       
                }
        }
}
?>