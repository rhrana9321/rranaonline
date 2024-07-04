<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends CI_Controller {

	static $helper   = array('url', 'authentication');
	public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join', 'M_superadmin'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->helper('text');
		$this->load->library('email');
		//$this->load->library('pagination');
		$this->load->library('upload');
		isAuthenticate();		
		$user_type 			= $this->session->userdata('email');
		if($user_type != 'User'){
		redirect('Home');
		}	
	 }

	public function index()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['Discount_List'] = $this->M_cloud->findAll('payment_table', 'payment_id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		$this->load->view('user/DiscountPage', $data);
	}
	
	
	
	
	
}
