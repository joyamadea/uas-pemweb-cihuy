<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class ErrorPage extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','form'));
        $this->load->model('M_account'); //call model
    }

     public function index() {
 
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
         // End fungsi login
         $this->load->view('pages/404.php',$data);
     }
     
 }