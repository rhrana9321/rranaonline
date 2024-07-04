<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Village_Info extends CI_Controller {

	static $helper   = array('url', 'authentication');
	public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join', 'M_user'));
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
		$data['superdetails'] = $this->M_cloud->findbyidstock('user', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('village_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		$this->load->view('user/Village_InfoPage', $data);
	}
	
	public function store()
	{
		$data['name'] 			= $this->input->post('name');
		$this->db->insert('village_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Village_Info');
	}
	
	
	public function edit($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('user', array('id'=> '1'));
		$data['find_zone_info'] = $this->M_cloud->findbyidstock('village_table', array('id' => $id));
		$this->load->view('user/Village_Info_editPage', $data);
	}
	
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['name'] 	   	= $this->input->post('name');
		
		$this->db->update('village_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Village_Info');
		
	}
	
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('village_table', $where);
		$this->M_cloud->destroyAll('village_table', $where);
		redirect('user/Village_Info');
	}
	
	
	
}
