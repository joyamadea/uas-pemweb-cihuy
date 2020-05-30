<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
        $this->load->helper(array('url','form','date'));
        $this->load->model(array('setup','stats'));

		$this->load->library('form_validation');
	}
    
	public function index()
	{
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        $data['footer'] = $this->load->view('templates/footer',NULL,TRUE);
        
        if(!$this->session->userdata('name') || $this->session->userdata('role') == 'user'){
            redirect(base_url());
        }
        else{
            $data['total'] =  $this->stats->sum()[0]->total;
            $data['users'] = $this->stats->users()[0]->total;
            $thisMonth = mdate("%m");
            if(!$this->stats->monthlySales($thisMonth)){
                $data['monthly'] = 0;
            }
            else{
                $data['monthly'] = $this->stats->monthlySales($thisMonth)[0]->total;
            }
            $data['rating'] = $this->stats->overallRating();
            $data['payment'] = $this->stats->payment();
            $data['trans'] = $this->stats->daily_data($thisMonth);
            if(!$this->stats->best()){
                $data['best'] = "No";   
            }
            else{
                $data['best'] = $this->stats->best();
            }
            
            
            $this->load->view('admin/admin.php', $data);
        }
        
    }

    public function statistics(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);
        
        if(!$this->session->userdata('name')  || $this->session->userdata('role') == 'user'){
            redirect(base_url());
        }
        else{
            $thisMonth = mdate("%m");
            $data['trans'] = $this->stats->daily_data($thisMonth);
            $data['payment'] = $this->stats->payment();
            
            $this->load->view('admin/statistics.php', $data);
        }
        
        
    }

    public function food(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);

        if(!$this->session->userdata('name') || $this->session->userdata('role') == 'user'){
            redirect(base_url());
        }
        else{
            $data['output'] = $this->setup->show_data();
            $data['cat'] = $this->setup->category();
            // echo var_dump($data['output']);
            $this->load->view('admin/food.php',(array)$data);
        }
       
    }

    public function food_category(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);

        if(!$this->session->userdata('name') || $this->session->userdata('role') == 'user'){
            redirect(base_url());
        }
        else{
            $data['output'] = $this->setup->category();
            // echo var_dump($data['output']);
            $this->load->view('admin/food_category.php',(array)$data);
        }
       
    }

    public function users(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);

        if(!$this->session->userdata('name') || $this->session->userdata('role') == 'user'){
            redirect(base_url());
        }
        else{
            $data['output'] = $this->setup->user();
            // echo var_dump($data['output']);
            $this->load->view('admin/users.php',(array)$data);
        }
        
    }

    public function add(){
        $data['style'] = $this->load->view('include/style',NULL,TRUE);
        $data['script'] = $this->load->view('include/script',NULL,TRUE);
        
        $data['sidebar'] = $this->load->view('templates/sidebar',NULL,TRUE);
        $data['topbar'] = $this->load->view('templates/topbar',NULL,TRUE);

        if(!$this->session->userdata('name') || $this->session->userdata('role') == 'user'){
            redirect(base_url());
        }
        else{
            $data['table'] = $this->uri->segment(3);
            $data['cat'] = $this->setup->category();
    
            $this->load->view('crud/add.php',$data);
        }
       
    }

    public function addFood(){
        $link = $this->input->post('link');

        $config['upload_path']  = './assets/uploads/files';
        $config['allowed_types'] = 'jpg|png';

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('foodName','Food Name','required');
        $this->form_validation->set_rules('foodcategory','Food Category','required');
        $this->form_validation->set_rules('stock','Stock','required|numeric');
        $this->form_validation->set_rules('desc','Description','required');
        $this->form_validation->set_rules('price','Price','required|numeric');

        $add['foodName'] = $this->input->post('foodName');
        $add['foodcategory'] = $this->input->post('foodcategory');
        $add['stock'] = $this->input->post('stock');
        $add['desc'] = $this->input->post('desc');
        $add['price'] = $this->input->post('price');
        

        if($this->form_validation->run() == FALSE && !$this->upload->do_upload('photo')){
            $errors = array('error' => $this->upload->display_errors(),
                    'form' => validation_errors());

            $val = array('foodName' => null,
                        'foodcategory' => null,
                        'stock' => null,
                        'desc' => null,
                        'price' => null);

            if(isset($add['foodName'])){
                $val['foodName'] = $add['foodName'];
            }
            if(isset($add['foodcategory'])){
                $val['foodcategory'] = $add['foodcategory'];
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
                        'foodcategory' => null,
                        'stock' => null,
                        'desc' => null,
                        'price' => null);

            if(isset($add['foodName'])){
                $val['foodName'] = $add['foodName'];
            }
            if(isset($add['foodcategory'])){
                $val['foodcategory'] = $add['foodcategory'];
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

    public function addfoodcategory(){
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

    public function delete(){
        $data['id'] = $this->uri->segment(4);
        $data['table'] = $this->uri->segment(3);

        $this->setup->delete($data);
        redirect(site_url('admin/').$data['table']);
    }


    public function editFood(){
        $link = $this->input->post('link');

        $config['upload_path']  = './assets/uploads/files';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

        $this->form_validation->set_rules('foodName','Food Name','required');
        $this->form_validation->set_rules('foodcategory','Food Category','required');
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
                $edit['category'] = $this->input->post('foodcategory');
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
                $edit['category'] = $this->input->post('foodcategory');
                $edit['stock'] = $this->input->post('stock');
                $edit['photo'] = $this->input->post('old_image');
                $edit['desc'] = $this->input->post('desc');
                $edit['price'] = $this->input->post('price');

                $this->setup->editFood($edit);
                 redirect(site_url('admin/food'));
            }    
        }

    }

    public function editfoodcategory(){
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
