<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_New_Employee extends CI_Controller {

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
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		$data['maxmeberid']    = $this->M_cloud->basicall('employee_table', 'auto_id  desc');
		
		$this->load->view('user/Add_New_EmployeePage', $data);
	}
	
	public function View_all_Employee()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['Employee_List'] = $this->M_cloud->findAll('employee_table', 'auto_id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		
		$this->load->view('user/View_all_EmployeePage', $data);
	}
	
	
	public function store()
	{
		$maxmeberid   = $this->M_cloud->basicall('employee_table', 'employee_id desc');
		$str = $maxmeberid->employee_id + 1;
		if(!empty($maxmeberid)){
		$data['employee_id'] = $str ;
		} else{
		$data['employee_id'] = '1001';	
		}
		
		$data['name'] 	   		= $this->input->post('name');
		$data['designation'] 	   		= $this->input->post('designation');
		$data['mobile'] 	   	= $this->input->post('mobile');
		$data['regularmobile'] 	= $this->input->post('regularmobile');
		$data['email'] 			= $this->input->post('email');
		$data['national_id'] 	= $this->input->post('national_id');
		$data['details'] 		= $this->input->post('details');
		$data['con_date']   	= $this->input->post('con_date'); 
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
		
		
		$this->db->insert('employee_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Add_New_Employee');
	}
	
	
    
	public function edit($auto_id)
	{
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['employeeList'] = $this->M_cloud->findbyidstock('employee_table', array('auto_id'=> $auto_id));
		$this->load->view('user/employee_editPage', $data);
	}
	
	public function updated()
	{
		$auto_id 	=  $this->input->post('auto_id');
		$data['name'] 	   		= $this->input->post('name');
		$data['designation'] 	   		= $this->input->post('designation');
		$data['mobile'] 	   	= $this->input->post('mobile');
		$data['regularmobile'] 	= $this->input->post('regularmobile');
		$data['email'] 			= $this->input->post('email');
		$data['national_id'] 	= $this->input->post('national_id');
		$data['details'] 		= $this->input->post('details');
		$data['con_date']   	= $this->input->post('con_date'); 
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
			
		$this->db->update('employee_table', $data, array('auto_id' => $auto_id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Add_New_Employee/View_all_Employee');
		
	}
	
	public function delete($auto_id)
	{
		$where = array('auto_id' => $auto_id);
		$result 	= $this->M_cloud->tbWhRow('employee_table', $where);
		$this->M_cloud->destroyAll('employee_table', $where);
		redirect('user/Add_New_Employee/View_all_Employee');
	}
	
	
	
}
