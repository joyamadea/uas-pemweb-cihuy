<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Cart extends CI_Controller {
     
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
        $transID = $this->carty->getTransId()[0]->transID;
        $data['total'] = $this->carty->getTransId()[0]->total;
        $data['food'] = $this->menu->getFood();
        $data['cart'] = $this->carty->getItems($transID);

		$this->load->view('pages/shopping_cart.php', $data);
     }

     public function add(){
        $data['custID'] = $this->session->userdata('id');
        $data['foodID'] = $this->input->post('foodID');
        $data['quantity'] = $this->input->post('quantity');
        $format = "%Y-%m-%d";
        $data['date'] = mdate($format);
        $url=base_url().'restaurant/product/'.$data['foodID'];

        if($data['custID'] == null){
            $this->load->view('account/v_login.php');
        }
        else if($data['quantity'] == 0){
            $this->session->set_flashdata('prodFail','Amount has to be > 0');
            redirect($url);
        }
        else{
           $price = $this->menu->getPrice($data['foodID'])[0]->price;
           $data['total'] = (int)$data['quantity'] * (int)$price;
           if(!$this->carty->getTransId()){
                $trans=$this->carty->insert($data);
                $data['transID']=$trans[0]->last_id;
                $this->carty->detail($data);
           }
           else{
                $data['transID'] = $this->carty->getTransId()[0]->transID;
               $currTotal = $this->carty->getTransId()[0]->total;
               $data['total']=(int)$currTotal + $data['total'];
               $this->carty->detail($data);
               $this->carty->updateTotal($data);
           }
           $this->session->set_flashdata('prodSuccess','Item added to cart');
           redirect($url);
           
            
        }
        // echo var_dump($data['total']);
     }

     public function check_out(){

        $this->load->view('pages/check_out.php');
     }
 }