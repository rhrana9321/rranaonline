<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Complain extends CI_Controller {

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
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['complain_template_table_List'] = $this->M_cloud->findAll('complain_template_table', 'id desc');
		$data['Employee_List'] = $this->M_cloud->findAll('employee_table', 'auto_id desc');
		
		$this->load->view('superadmin/Add_ComplainPage', $data);
	}
	
	public function store()
	{
		$customer_id	   				= $this->input->post('customer_id');
		$customer_info 					= $this->M_cloud->findbyidstock('customer_table', array('customer_id_create'=> $customer_id));
		
		$data['customer_id'] 	   		= $this->input->post('customer_id');
		$data['template'] 	   			= $this->input->post('template');
		$data['details'] 	   			= $this->input->post('details');
		$data['note'] 					= $this->input->post('note');
		$data['employee'] 				= $this->input->post('employee');
		$data['sms_check'] 				= $this->input->post('sms_check');
		$data['type'] 					= 'Add_complain';
		$data['customer_address'] 		= $customer_info->details;
		$data['customer_mobile'] 		= $customer_info->mobile;
		$data['complain_date'] 			= date("d-m-Y");
		$this->db->insert('add_complain_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		
		$name 		= $data['customer_id'];
		$cus_info = $this->M_cloud->findbyidstock('customer_table', array('customer_id_create'=> $name));
		
		$employee 		= $data['employee']; 
		$employ_info = $this->M_cloud->findbyidstock('employee_table', array('name'=> $employee));
		
		
		
		$mobile 			= $cus_info->mobile;
		
		$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
		$sender_id='483';
		
		$header_text 				= 'Dear, Customer';
		$employ_send_text 			= 'Our Employee:';
		$employ_name				= $employ_info->name;
		$employ_send_mobile_text 	= 'Mobile:';
		$employ_Mobile				= $employ_info->mobile;
		$note_text 					= 'Note:';
		$employ_note				= $data['note'];
		$mobile_no					= $mobile;
		
		$header_text2 				= 'Our Clint:';
		$employ_send_cus_text 	= 'Customer ID: CUS';
		$employ_cus_id			= $cus_info->customer_id_create;
		
		$tem_cus_text 			= 'Complain:';
		$Complain_Template		= $data['details'];
		
		$tem_cus_m_text 			= 'Mobile:';
		$m_Template					= $cus_info->mobile;
		
		$tem_cus_a_text 			= 'Address:';
		$a_Template					= $cus_info->details;
		
		
		$footer_text 		= 'Meghnalink.com';
		$Support_send_text 	= 'Support:';
		$Support 			= '01854238062';
		$Thank_you 			= 'Thank you.';
		$space 	= ' ';
		$comma 	= ',';
		
		
		$message	= $header_text.$space.$employ_send_text.$employ_name.$comma.$space.$employ_send_mobile_text.$employ_Mobile.$comma.$space.$note_text.$employ_note.$space.$Thank_you.$space.$footer_text.$comma.$Support_send_text.$Support;

		$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$mobile_no);
		// use key 'http' even if you send the request to https://...
		$options = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		
		
		$message2	= $header_text2.$space.$employ_send_cus_text.$employ_cus_id.$comma.$tem_cus_a_text.$a_Template.$comma.$tem_cus_m_text.$m_Template.$comma.$tem_cus_text.$Complain_Template.$Thank_you.$space.$footer_text.$comma.$Support_send_text.$Support;
		
		$url2 = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data2 = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message2,'mobile_no' =>$employ_info->mobile);
		// use key 'http' even if you send the request to https://...
		$options2 = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data2)));
		$context2  = stream_context_create($options2);
		$result2 = file_get_contents($url2, false, $context2);
		
				
		redirect('software/Add_Complain');
	}
	
	public function View_all_Employee()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['Employee_List'] = $this->M_cloud->findAll('employee_table', 'auto_id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		
		$this->load->view('superadmin/View_all_EmployeePage', $data);
	}
    
	public function edit($auto_id)
	{
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['employeeList'] = $this->M_cloud->findbyidstock('employee_table', array('auto_id'=> $auto_id));
		$this->load->view('superadmin/employee_editPage', $data);
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
		redirect('software/Add_New_Employee/View_all_Employee');
		
	}
	
	public function delete($auto_id)
	{
		$where = array('auto_id' => $auto_id);
		$result 	= $this->M_cloud->tbWhRow('employee_table', $where);
		$this->M_cloud->destroyAll('employee_table', $where);
		redirect('software/Add_New_Employee/View_all_Employee');
	}
	
	
	
}
