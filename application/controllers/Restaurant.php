<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('menu');
	}

	public function index()
	{
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);

		$data['food'] = $this->menu->show_data()->result();
		$this->load->view('pages/restaurant.php', $data);
	}

	public function product()
	{
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$id = $this->uri->segment(3);
		$data['details'] = $this->menu->detail_prod($id);
		
        
        $this->load->view('pages/product.php', $data);
    }
}
