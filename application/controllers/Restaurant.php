<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('menu');
		$this->load->library(array('form_validation','session'));
	}

	public function index()
	{
		
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['category'] = $this->menu->getAllCategory();
		$data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
		$data['food'] = $this->menu->show_data()->result();

		$this->load->view('pages/restaurant.php', $data);
	}

	public function filter(){

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['category'] = $this->menu->getAllCategory();
		$data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
		$search = $this->input->post('search');
		$field  = $this->input->post('field');
		$searchInput = $this->input->post('searchInput');
		
		$fieldSort  = $this->input->post('fieldSort');

		$fieldFilter  = $this->input->post('fieldFilter');
		
        if (isset($search) && !empty($searchInput) && !empty($field) ) {
			$data['food'] = $this->menu->getDataWhere($field, $searchInput);
			$data['search'] = $search;
			$this->session->set_flashdata('search',$searchInput);
			
        } else if (!empty($fieldSort)) {
			$data['food'] = $this->menu->sortData($fieldSort);
			
        } else if (!empty($fieldFilter)) {
			$data['food'] = $this->menu->getDataOf($fieldFilter);
			$data['selected'] = $fieldFilter;
			
        }else {
			$data['food'] = $this->menu->show_data()->result();
		}

		$this->load->view('pages/restaurant.php', $data);
	}

	public function out(){
         
		$this->session->sess_destroy();


        ob_clean();
		$this->load->view('account/v_login.php');
	} 

 
	public function product()
	{
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
		$id = $this->uri->segment(3);
		$data['details'] = $this->menu->detail_prod($id);
		
        
        $this->load->view('pages/product.php', $data);
	}
}
