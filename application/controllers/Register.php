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
             $this->load->view('account/v_register');

         }else{
             echo '<script>console.log("Salah")</script>';
             $data['displayName']   =    $this->input->post('displayName');
             $data['password'] =    password_hash($this->input->post('password'), PASSWORD_DEFAULT);
             $data['email']  =    $this->input->post('email');
             $data['birthDate']  =    $this->input->post('birthDate');
 
             $this->M_account->daftar($data);
             
             $pesan['message'] =    "Pendaftaran berhasil";
             
             $this->load->view('account/v_success',$pesan);
         }
     }
 }