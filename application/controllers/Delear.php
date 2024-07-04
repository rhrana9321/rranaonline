<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delear extends CI_Controller {

	static $helper   = array('url','delear_authentication');
	public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_superadmin'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		//isAuthenticate();
	
	 }
	
	public function index()
	{
		$data['usermgs'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ''));
		$this->load->view('superadmin/login_page', $data);
	}
	public function login()
	{
		superadmin();
	}
	
	public function logout()
	{
		logoutUser();
	}
	
}
