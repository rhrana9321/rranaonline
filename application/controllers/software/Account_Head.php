<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Head extends CI_Controller {

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
		if($user_type != 'Superadmin'){
		redirect('Home');
		}	
	 }

	public function index()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['account_head_List'] = $this->M_cloud->findAll('account_head_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Account_HeadPage', $data);
	}
	
	public function store()
	{
		$data['name'] 			= $this->input->post('name');
		$data['details'] 			= $this->input->post('details');
		$this->db->insert('account_head_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Account_Head');
	}
	
	
	public function edit($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_zone_info'] = $this->M_cloud->findbyidstock('zone_table', array('id' => $id));
		$this->load->view('superadmin/Zone_Info_editPage', $data);
	}
	
	
	public function updated()
	{
		$id 						=  $this->input->post('id');
		$data['name'] 				= $this->input->post('name');
		$data['details'] 			= $this->input->post('details');
		
		$this->db->update('account_head_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('software/Account_Head');
		
	}
	
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('account_head_table', $where);
		$this->M_cloud->destroyAll('account_head_table', $where);
		redirect('software/Account_Head');
	}
	
	
	
}
