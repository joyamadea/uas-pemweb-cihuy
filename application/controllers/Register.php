 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Register extends CI_Controller {
     
     function __construct(){
         parent::__construct();
         $this->load->library(array('form_validation'));
         $this->load->helper(array('url','form'));
         $this->load->model('M_account'); //call model
     }
 
     public function index() {
 
         $this->form_validation->set_rules('displayName', 'DISPLAYNAME','required');
         $this->form_validation->set_rules('email','EMAIL','required|valid_email');
         $this->form_validation->set_rules('password','PASSWORD','required');
         $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
         $this->form_validation->set_rules('birthDate','BIRTHDATE','required');
         if($this->form_validation->run() == FALSE) {
            $data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
             $this->load->view('account/v_register',$data);

         }else{
             $data['displayName']   =    $this->input->post('displayName');
             $data['password'] =    password_hash($this->input->post('password'), PASSWORD_BCRYPT);
             $data['email']  =    $this->input->post('email');
             $data['birthDate']  =    $this->input->post('birthDate');
 
             $this->M_account->daftar($data);
             
             $data['message'] =    "Registration success";
             $data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
             
             $this->load->view('account/v_success',$data);
         }
     }
 }