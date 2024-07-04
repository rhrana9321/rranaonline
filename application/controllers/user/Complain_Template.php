<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complain_Template extends CI_Controller {

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
		$data['complain_template_table_List'] = $this->M_cloud->findAll('complain_template_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/Complain_TemplatePage', $data);
	}
	
	public function store()
	{
		$data['comments'] 	   		= $this->input->post('comments');
		$this->db->insert('complain_template_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Complain_Template');
	}
	
	
    
	public function edit($id)
	{
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['complain_templateList'] = $this->M_cloud->findbyidstock('complain_template_table', array('id'=> $id));
		$this->load->view('user/complain_template_editPage', $data);
	}
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['comments'] 	   		= $this->input->post('comments');
		$this->db->update('complain_template_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Complain_Template');
		
	}
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('complain_template_table', $where);
		$this->M_cloud->destroyAll('complain_template_table', $where);
		redirect('user/Complain_Template');
	}
	
	
	
}
