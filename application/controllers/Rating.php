<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Rating extends CI_Controller {
     
     function __construct(){
         parent::__construct();
         $this->load->library(array('form_validation'));
         $this->load->helper(array('url','form','date'));
         $this->load->model(array('carty','menu')); //call model
     }
 
     public function index() {
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        
        if($this->session->userdata('transID')){
            $transId=$this->session->userdata('transID');
            $data['cart'] = $this->carty->getItems($transId);
            $data['food'] = $this->menu->getFood();
            $this->load->view('pages/rating.php', $data);
        }
        else{
            redirect(base_url());
        }
        

		
     }

     public function rating(){
         $index = $this->input->post('index');
         $transId=$this->session->userdata('transID');
         $cart = $this->carty->getItems($transId);
         $i = 0;
         foreach($cart as $c){
             $data['foodID'] = $c->foodID;
             $data['rating'] = $this->input->post('stars'.$i);
             $data['transId'] = $transId;
             $i++;
             $this->carty->rateFood($data);
         }
         $this->session->unset_userdata('transID');
         redirect(base_url());

         
     }

 }