<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

    public function _example_output($output = null)
	{
		$this->load->view('pages/admin.php',(array)$output);
    }
    
	public function index()
	{

    }
    
    public function setup(){
        //$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['output'] = (object)array('output' => '' , 'js_files' => array() , 'css_files' => array());
        $data['output'] = (array)$data['output'];
		//$data['food'] = $this->menu->show_data()->result();
		$this->load->view('pages/admin.php', $data);
    }

    public function food(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('food')
            ->display_as('foodName','Food')
            ->display_as('foodCategory','Category')
            ->display_as('photoLink','Photo')
            ->display_as('desc','Description');
        $crud->set_relation('foodCategory','foodcategory','categoryName');
        $crud->set_field_upload('photoLink','assets/uploads/files');

        $output = $crud->render();
        $data['output'] = (array)$output;
        // echo var_dump($data['output']);
        $this->load->view('pages/admin.php',(array)$data);
    }

    public function food_category(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('foodcategory')
            ->columns('categoryID','categoryName')
            ->display_as('categoryID','ID')
            ->display_as('categoryName','Category');

        $output = $crud->render();
        $data['output'] = (array)$output;
        // echo var_dump($data['output']);
        $this->load->view('pages/admin.php',(array)$data);
    }
}
