<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
        $this->load->helper(array('url','form'));
        $this->load->model(array('setup','stats'));

		$this->load->library('form_validation');
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
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['trans'] = $this->stats->daily_data();
        
        $this->load->view('pages/statistics.php', $data);
    }

    public function food(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['output'] = $this->setup->show_data();
        $data['cat'] = $this->setup->category();
        // echo var_dump($data['output']);
        $this->load->view('pages/food.php',(array)$data);
    }

    public function food_category(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['output'] = $this->setup->category();
        // echo var_dump($data['output']);
        $this->load->view('pages/food_category.php',(array)$data);
    }

    public function users(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['output'] = $this->setup->user();
        // echo var_dump($data['output']);
        $this->load->view('pages/users.php',(array)$data);
    }

    public function add(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['table'] = $this->uri->segment(3);
        $data['cat'] = $this->setup->category();

        $this->load->view('crud/add.php',$data);
    }

    public function addFood(){
        $link = $this->input->post('link');

        $config['upload_path']  = './assets/uploads/files';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('foodName','Food Name','required');
        $this->form_validation->set_rules('foodCategory','Food Category','required');
        $this->form_validation->set_rules('stock','Stock','required|numeric');
        $this->form_validation->set_rules('desc','Description','required');
        $this->form_validation->set_rules('price','Price','required|numeric');

        $add['foodName'] = $this->input->post('foodName');
        $add['foodCategory'] = $this->input->post('foodCategory');
        $add['stock'] = $this->input->post('stock');
        $add['desc'] = $this->input->post('desc');
        $add['price'] = $this->input->post('price');
        

        if($this->form_validation->run() == FALSE && !$this->upload->do_upload('photo')){
            $errors = array('error' => $this->upload->display_errors(),
                    'form' => validation_errors());

            $val = array('foodName' => null,
                        'foodCategory' => null,
                        'stock' => null,
                        'desc' => null,
                        'price' => null);

            if(isset($add['foodName'])){
                $val['foodName'] = $add['foodName'];
            }
            if(isset($add['foodCategory'])){
                $val['foodCategory'] = $add['foodCategory'];
            }
            if(isset($add['stock'])){
                $val['stock'] = $add['stock'];
            }
            if(isset($add['desc'])){
                $val['desc'] = $add['desc'];
            }
            if(isset($add['price'])){
                $val['price'] = $add['price'];
            }

            $this->session->set_flashdata('set',$val);
            $this->session->set_flashdata('failFood',$errors);
            redirect(site_url($link));
        }
        else if($this->form_validation->run() == FALSE){
            $errors = array('error' => null,
                    'form' => validation_errors());
            $this->session->set_flashdata('failFood',$errors);
            redirect(site_url($link));
        }
        else if(!$this->upload->do_upload('photo')){
            $errors = array('error' => $this->upload->display_errors(),
                    'form' => validation_errors());

                    $val = array('foodName' => null,
                        'foodCategory' => null,
                        'stock' => null,
                        'desc' => null,
                        'price' => null);

            if(isset($add['foodName'])){
                $val['foodName'] = $add['foodName'];
            }
            if(isset($add['foodCategory'])){
                $val['foodCategory'] = $add['foodCategory'];
            }
            if(isset($add['stock'])){
                $val['stock'] = $add['stock'];
            }
            if(isset($add['desc'])){
                $val['desc'] = $add['desc'];
            }
            if(isset($add['price'])){
                $val['price'] = $add['price'];
            }

            $this->session->set_flashdata('set',$val);
            $this->session->set_flashdata('failFood',$errors);
            redirect(site_url($link));
        }
        else{
            $data = $this->upload->data();
            
            $add['photoLink'] = $data['file_name'];
           

             $this->setup->addFood($add);
            redirect(site_url('admin/food'));
        }      
        

    }

    public function addFoodCategory(){
        $link = $this->input->post('link');
        $this->form_validation->set_rules('categoryName','Category Name','required');
        if($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            $this->session->set_flashdata('fail',$errors);
            redirect(site_url($link));
        }
        else{
            $add['categoryName'] = $this->input->post('categoryName');

            $this->setup->addCategory($add);

            redirect(site_url('admin/food_category'));
        }
    }

    public function edit(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);

        $id = $this->uri->segment(4);
        $table = $this->uri->segment(3);
        
        $data['data'] = $this->setup->getProd($id,$table);
        if($table == "food"){
            $data['cat'] = $this->setup->category();
        }

        $this->load->view('crud/edit.php',$data);
    }


    public function editFood(){
        $link = $this->input->post('link');

        $config['upload_path']  = './assets/uploads/files';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('foodName','Food Name','required');
        $this->form_validation->set_rules('foodCategory','Food Category','required');
        $this->form_validation->set_rules('stock','Stock','required|numeric');
        $this->form_validation->set_rules('desc','Description','required');
        $this->form_validation->set_rules('price','Price','required|numeric');

        if (!empty($_FILES['photo']['name']))
        {
            if($this->form_validation->run() == FALSE || !$this->upload->do_upload('photo')){
                $errors = array('error' => $this->upload->display_errors(),
                        'form' => validation_errors());
                $this->session->set_flashdata('failFood',$errors);
                redirect(site_url($link));
            }else{
                $data = $this->upload->data();
                $path='./assets/uploads/files/'.$this->input->post('old_image');
                unlink($path);
                $edit['id'] = $this->input->post('foodId');
                $edit['name'] = $this->input->post('foodName');
                $edit['category'] = $this->input->post('foodCategory');
                $edit['stock'] = $this->input->post('stock');
                $edit['photo'] = $data['file_name'];
                $edit['desc'] = $this->input->post('desc');
                $edit['price'] = $this->input->post('price');

                $this->setup->editFood($edit);
                redirect(site_url('admin/food'));
            }      
        }
        else{
            if($this->form_validation->run() == FALSE){
                $errors = array('error' => null,
                        'form' => validation_errors());
                $this->session->set_flashdata('failFood',$errors);
                redirect(site_url($link));
            }else{

                $data = $this->upload->data();
                $edit['id'] = $this->input->post('foodId');
                $edit['name'] = $this->input->post('foodName');
                $edit['category'] = $this->input->post('foodCategory');
                $edit['stock'] = $this->input->post('stock');
                $edit['photo'] = $this->input->post('old_image');
                $edit['desc'] = $this->input->post('desc');
                $edit['price'] = $this->input->post('price');

                $this->setup->editFood($edit);
                 redirect(site_url('admin/food'));
            }    
        }

    }

    public function editFoodCategory(){
        $link = $this->input->post('link');
        $this->form_validation->set_rules('categoryName','Category Name','required');
        if($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            $this->session->set_flashdata('fail',$errors);
            redirect(site_url($link));
        }
        else{
            $edit['id'] = $this->input->post('categoryId');
            $edit['name'] = $this->input->post('categoryName');

            $this->setup->editCategory($edit);

            redirect(site_url('admin/food_category'));
        }
    }
}
