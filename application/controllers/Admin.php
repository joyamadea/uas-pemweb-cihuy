<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
        $this->load->helper('url');
        $this->load->model(array('setup','stats'));

		$this->load->library('grocery_CRUD');
	}

    public function _example_output($output = null)
	{
		$this->load->view('pages/admin.php',(array)$output);
    }
    
	public function index()
	{
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        
        $number = $this->stats->sum();
        foreach($number as $n){
            $data['total'] = $n->total;
        }

        $users = $this->stats->users();
        foreach($users as $u){
            $data['users'] = $u->total;
        }
        
        
        $this->load->view('pages/admin.php', $data);
    }

    public function statistics(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['trans'] = $this->stats->daily_data();
        
        $this->load->view('pages/statistics.php', $data);
    }

    public function food(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['output'] = $this->setup->show_data();
        // echo var_dump($data['output']);
        $this->load->view('pages/food.php',(array)$data);
    }

    public function food_category(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['output'] = $this->setup->category();
        // echo var_dump($data['output']);
        $this->load->view('pages/food_category.php',(array)$data);
    }
}
