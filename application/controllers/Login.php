<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
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
             if($res==false){
                $this->session->set_flashdata("sukses","Username/password incorrect");
            }
            else{
                foreach($res as $r){
                    $hash=$r->password;
                    $dispName=$r->displayName;
                    $id=$r->custID;
                    $pic=$r->profileLink;
                    $role=$r->role;
                }

                if(password_verify($password,$hash)){
                    $this->session->set_userdata('email',$email);
                    $this->session->set_userdata('login_id',uniqid(rand()));
                    $this->session->set_userdata('name',$dispName);
                    $this->session->set_userdata('id',$id);
                    $this->session->set_userdata('pic',$pic);
                    $this->session->set_userdata('role',$role);

                    if($role == 'admin'){
                        redirect(site_url('admin'));
                    }
                    else if($role == 'user'){
                        redirect(base_url());
                    }
                    
                    
                }
                else{
                    echo "login tidak sukses";
                }
            }
         }

         $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
         // End fungsi login
         $this->load->view('account/v_login',$data);
     }
 
     public function out(){
         $this->session->sess_destroy();
         redirect('restaurant','refresh');
     }        
 }