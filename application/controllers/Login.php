 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Login extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','form'));
        $this->load->model('M_account'); //call model
    }

     public function index() {
 
         // Fungsi Login
         $valid = $this->form_validation;
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         $valid->set_rules('email','Email','required');
         $valid->set_rules('password','Password','required');
 
         if($valid->run()) {
             $res=$this->M_account->login($email);
         }

         if($res==false){
             echo "login tidak sukses (email)";
         }
         else{
             foreach($res as $r){
                $hash=$r->password;
                $dispName=$r->displayName;
             }

             if(password_verify($password,$hash)){
                $this->session->set_userdata('email',$email);
                $this->session->set_userdata('login_id',uniqid(rand()));
                $this->session->set_userdata('name',$dispName);
                 echo "login sukses dgn nama ".$this->session->userdata('name');
             }
             else{
                 echo "login tidak sukses";
             }
         }
         // End fungsi login
         $this->load->view('account/v_login');
     }
 
     public function logout(){
         $this->simple_login->logout();
     }        
 }