<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('user_model');
		
		if (!empty($this->session->userdata('user_id'))) 
		{
			redirect('/dashboard/');
		}
	}
	
	public function index()
	{
		$this->load->library('form_validation');
		/*
		 $this->form_validation->set_rules(
		 'name', 'Username',
		 'required|min_length[5]|max_length[12]|is_unique[users.username]',
		 array(
		 'required'      => 'You have not provided %s.',
		 'is_unique'     => 'This %s already exists.'
		 )
		 );*/
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == false)
		{
			$this->load->view('common/header');
			$this->load->view('login/index');
			$this->load->view('common/footer');
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			
			
			if ($user = $this->user_model->authenticate($email, $password))
			{
				// set session user datas
				$data = array(
					'user_id'	=>		(int) $user->id,
					'name'		=>		(string) $user->name,
					'last_updated'	=>		$user->last_updated,
					'created'		=>		$user->created		
				);
				
				$this->session->set_userdata($data);
				
				$this->load->view('common/header');
				$this->load->view('dashboard/index');
				$this->load->view('common/footer');
				redirect('/dashboard/');
			}
			else
			{
				$data = array(
					'message'=>'Incorrect username or password.'	
				);
				$this->load->view('common/header');
				$this->load->view('login/index', $data);
				$this->load->view('common/footer');
			}
		}
		
		
	}
}