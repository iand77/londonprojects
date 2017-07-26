<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		
		if ($this->form_validation->run() == false)
		{
			$this->load->view('common/header');
			$this->load->view('register/index');
			$this->load->view('common/footer');
		}
		else
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
				
			if ($this->user_model->create_user($name, $email, $password))
			{
			
				$data = array(
						'name' =>  $this->input->post('name'),
						'email' =>  $this->input->post('email')
				);
				// user creation ok
				$this->load->view('common/header');
				$this->load->view('register/success', $data);
				$this->load->view('common/footer');
			}
			else
			{
				$data = array(
					'message'=>'An unexpected error occurred. Please try again later.'	
				);
				$this->load->view('common/header');
				$this->load->view('register/index', $data);
				$this->load->view('common/footer');
			}
		}
		
			
	}
	
	
}