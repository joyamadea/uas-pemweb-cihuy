<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model(array('m_account','menu'));
		$this->load->library(array('form_validation','session'));
	}

	public function index()
	{		
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('templates/navbar',NULL,TRUE);
		$email = $this->session->userdata('email');
		$data['self'] = $this->m_account->login($email)[0];

		$this->load->view('account/profile.php', $data);
	}

	public function editPic()
	{
		$config['upload_path']  = './assets/uploads/profile';
        $config['allowed_types'] = 'jpg|png';
		$config['overwrite'] = true;
		

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('photo'))
		{
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$data['id'] = $this->session->userdata('id');
			$data['profileLink'] = $this->upload->data()['file_name'];

			$this->session->set_userdata('pic',$data['profileLink']);

			$this->m_account->profile($data);
			$this->session->set_flashdata('change','Successfully changed profile picture');
			redirect(site_url('profile'));
		}
	}

	public function editName(){
		$data['name'] = $this->input->post('name');
		$data['id'] = $this->session->userdata('id');

		$this->m_account->name($data);
		$this->session->set_userdata('name',$data['name']);

		$this->session->set_flashdata('change','Successfully changed display name');
		redirect(site_url('profile'));
	}
}
