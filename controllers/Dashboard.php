<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('user_model');
	}
	
	function index()
	{
		
		
		$this->load->view('common/header');
		$this->load->view('dashboard/index');
		$this->load->view('common/footer');
	}
	
	function logout()
	{
		$data = array(
				'user_id'	=>		'',
				'name'		=>		'',
				'last_updated'	=>	'',
				'created'		=>	''
		);
		$this->session->set_userdata($data);
		$this->session->sess_destroy();
		redirect('/login');
	}
	
}