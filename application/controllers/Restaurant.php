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
		$data['category'] = $this->menu->getAllCategory();

		$search = $this->input->post('search');
		$field  = $this->input->post('field');
		$searchInput = $this->input->post('searchInput');
		
		$sort = $this->input->post('sort');
		$fieldSort  = $this->input->post('fieldSort');

		$fieldFilter  = $this->input->post('fieldFilter');
		$filter  = $this->input->post('filter');


        if (isset($search) && !empty($searchInput) && !empty($field) ) {
			if($field=="foodCategory"){
				$query = $this->db->get_where('foodCategory',array('categoryName' => $searchInput));
				foreach ($query->result() as $row){
        			$searchInput = $row->categoryID;
				}
			}
            $data['food'] = $this->menu->getDataWhere($field, $searchInput);
        } else if (isset($sort) && !empty($fieldSort)) {
			$data['food'] = $this->menu->sortData($fieldSort);
			
        } else if (isset($filter) && !empty($fieldFilter)) {
			$data['food'] = $this->menu->getDataOf($fieldFilter);
			
        }else {
			$data['food'] = $this->menu->show_data()->result();
		}

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
