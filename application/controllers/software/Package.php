<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

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
		$data['zone_List'] = $this->M_cloud->findAll('package_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		$this->load->view('superadmin/PackagePage', $data);
	}
	
	public function store()
	{
		
		$kb_and_mb_check 			= $this->input->post('Speed');
		$status 			= $this->input->post('status');
		if($status == 'KBps'){
		$data['kb_count'] 		= $kb_and_mb_check;
		}else{
		$data['kb_count'] 		= $kb_and_mb_check*1024;
		}
		$Speed 					= $this->input->post('Speed');
		$data['name'] 			= $this->input->post('name');
		$data['status'] 		= $status;
		$data['Speed'] 			= $Speed .$status;
		$data['direct_value'] 		= $kb_and_mb_check;
		$data['amount'] 		= $this->input->post('amount');
		
		$this->db->insert('package_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Package');
	}
	
	
	public function edit($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_zone_info'] = $this->M_cloud->findbyidstock('package_table', array('id' => $id));
		$this->load->view('superadmin/package_editPage', $data);
	}
	
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$kb_and_mb_check 			= $this->input->post('Speed');
		$status 			= $this->input->post('status');
		if($status == 'KBps'){
		$data['kb_count'] 		= $kb_and_mb_check;
		}else{
		$data['kb_count'] 		= $kb_and_mb_check*1024;
		}
		$Speed 					= $this->input->post('Speed');
		$data['name'] 			= $this->input->post('name');
		$data['status'] 		= $status;
		$data['Speed'] 			= $Speed .$status;
		$data['direct_value'] 		= $kb_and_mb_check;
		$data['amount'] 		= $this->input->post('amount');
		
		$this->db->update('package_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('software/Package');
		
	}
	
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('zone_table', $where);
		$this->M_cloud->destroyAll('zone_table', $where);
		redirect('software/Zone_Info');
	}
	
	
	
}
