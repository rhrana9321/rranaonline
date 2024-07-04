<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
	
	 }

	
	public function index()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/SettingsPage', $data);
	}

	
	
	
	public function logo_updated()
	{
		$id 	=  $this->input->post('id');
		$logo_image 			= $this->input->post('logo_image');
		$config['upload_path']   = './upload';
		$config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
		$config['max_size']			= '10000';
		$config['file_name']		= time();
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload('logo_image'))
		{
			$uploadData = $this->upload->data();
			$uploaded_photo  = $uploadData['file_name'];
			$data['logo_image'] = $uploaded_photo;
		}
		$this->db->update('superadmin', $data, array('id' => 1));
		redirect('software/Settings');
	}
	
	
	public function company_updated()
	{
		$data['companyname'] 		= $this->input->post('companyname');
		$data['title'] 				= $this->input->post('title');
		$data['address'] 			= $this->input->post('address');
		$data['company_mobile'] 	= $this->input->post('company_mobile');
		$data['password'] 	        = md5($this->input->post('password'));
		$this->db->update('superadmin', $data, array('id' => 1));
		redirect('software/Settings');
	}
	
	public function Excel_updated()
	{
		$data['excel_company_name'] 		= $this->input->post('excel_company_name');
		$data['excel_company_title'] 				= $this->input->post('excel_company_title');
		$data['excel_company_keyword'] 			= $this->input->post('excel_company_keyword');
		$this->db->update('superadmin', $data, array('id' => 1));
		redirect('software/Settings');
	}
	
	
	public function sms_updated()
	{
		$data['sms_cname'] 				= $this->input->post('sms_cname');
		$data['sms_user'] 				= $this->input->post('sms_user');
		$data['sms_password'] 			= $this->input->post('sms_password');
		$data['sms_sender'] 			= $this->input->post('sms_sender');
		$data['support_num'] 			= $this->input->post('support_num');
		$this->db->update('superadmin', $data, array('id' => 1));
		redirect('software/Settings');
	}
	
	
	
}
