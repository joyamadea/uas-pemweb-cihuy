<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('menu');
                $this->load->helper('url');
	}

	public function index()
	{
		$data['food'] = $this->menu->show_data()->result();
		$this->load->view('restaurant.php', $data);
	}
}
