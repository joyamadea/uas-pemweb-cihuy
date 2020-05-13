 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
 
     public function index() {
 
         // Fungsi Login
         $valid = $this->form_validation;
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         $valid->set_rules('email','Email','required');
         $valid->set_rules('password','Password','required');
 
         if($valid->run()) {
             $this->simple_login->login($email,$password, base_url('dashboard'), base_url('login'));
         }
         // End fungsi login
         $this->load->view('account/v_login');
     }
 
     public function logout(){
         $this->simple_login->logout();
     }        
 }