<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model(array('carty','menu'));
		$this->load->library(array('form_validation','session'));
	}

	public function index()
	{
		$this->session->unset_userdata('transID');
		
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        $data['trans'] = $this->carty->getTransactions();
        $data['detail'] = $this->carty->getDetailItems();
        $data['food'] = $this->menu->getFood();

		$this->load->view('pages/history.php', $data);
	}

	
}
