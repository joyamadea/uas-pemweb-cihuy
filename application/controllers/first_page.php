<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class first_page extends CI_Controller {
 
      public function index()
      {
           $this->load->view('account/beranda');
      }
 }