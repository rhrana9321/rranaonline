<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_customer extends CI_Controller {

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
		//$this->load->library('upload');
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
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		$this->load->view('user/New_customerPage', $data);
	}
	
	
	public function date_to_date()
	{
		$from 					= $this->input->post('from_date');
		$to						= $this->input->post('to_date');
    	$from_newDate 			= date("Y-m-d", strtotime($from));
    	$to_newDate 			= date("Y-m-d", strtotime($to));
		$status 				= $this->input->post('status');
		$data['from_date'] 			= $from;
		$data['to_date'] 			= $to;
		$data['total_active_coustomerall'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		
		$data['total_active_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		$data['total_inactive_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id  desc');
		
		
		$this->load->view('user/show_coustomer_reportPage', $data);
	}
	
    public function active_date_to_date()
	{
		$from 					= $this->input->post('from_date');
		$to						= $this->input->post('to_date');
    	$from_newDate 			= date("Y-m-d", strtotime($from));
    	$to_newDate 			= date("Y-m-d", strtotime($to));
		$data['from_date'] 			= $from;
		$data['to_date'] 			= $to;
		$data['total_active_coustomerall'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		
		$data['total_active_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		$data['total_inactive_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate, 'status' => 1), 'custo_id  desc');
		$this->load->view('superadmin/show_active_and_inactive_coustomer_reportPage', $data);
	}
	
	public function inactive_date_to_date()
	{
		$from 					= $this->input->post('from_date');
		$to						= $this->input->post('to_date');
    	$from_newDate 			= date("Y-m-d", strtotime($from));
    	$to_newDate 			= date("Y-m-d", strtotime($to));
		$data['from_date'] 			= $from;
		$data['to_date'] 			= $to;
		$data['total_active_coustomerall'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		
		$data['total_active_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		$data['total_inactive_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate, 'status' => 0), 'custo_id  desc');
		$this->load->view('superadmin/show_active_and_inactive_coustomer_reportPage', $data);
	}
	
	public function allactive_date_to_date()
	{
		$from 					= $this->input->post('from_date');
		$to						= $this->input->post('to_date');
    	$from_newDate 			= date("Y-m-d", strtotime($from));
    	$to_newDate 			= date("Y-m-d", strtotime($to));
		$data['from_date'] 			= $from;
		$data['to_date'] 			= $to;
		
		
		$data['total_active_coustomerall'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		
		$data['total_active_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		$data['total_inactive_coustomer'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0,'con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id asc');
		
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('con_date >=' => $from_newDate, 'con_date <=' => $to_newDate), 'custo_id  desc');
		$this->load->view('superadmin/show_active_and_inactive_coustomer_reportPage', $data);
	}
	
	
	
}
