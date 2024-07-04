<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Complain_For_Imminent_User extends CI_Controller {

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
		
		$this->load->view('superadmin/Add_Complain_For_Imminent_UserPage', $data);
	}
	
	public function store()
	{
		$data['complain_date'] 	   			= $this->input->post('complain_date'); 
		$data['complain_time'] 	   			= $this->input->post('complain_time');
		$data['customer_id'] 	   			= $this->input->post('customer_name');
		$data['customer_address'] 	   		= $this->input->post('customer_address');
		$data['customer_mobile'] 	   		= $this->input->post('customer_mobile');
		$data['template'] 	   				= $this->input->post('template');
		$data['details'] 					= $this->input->post('details');
		$data['note'] 						= $this->input->post('note');
		$data['employee'] 					= $this->input->post('employee');
		$data['sms_check'] 					= $this->input->post('sms_check');
		$data['type'] 						= 'Add_Imminent_complain';
		
		$this->db->insert('add_complain_table', $data);
		
		
		
		$employee 		= $data['employee']; 
		$employ_info = $this->M_cloud->findbyidstock('employee_table', array('name'=> $employee));
		
		
		
		$mobile 			= $data['customer_mobile'];
		
		$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
		$sender_id='483';
		
		$header_text 				= 'Dear, Customer';
		$employ_send_text 			= 'Our Employee:';
		$employ_name				= $employ_info->name;
		$employ_send_mobile_text 	= 'Mobile:';
		$employ_Mobile				= $employ_info->mobile;
		$note_text 					= 'Note:';
		$employ_note				= $data['note'];
		$mobile_no					= $data['customer_mobile'];
		
		
		$header_text2 				= 'Our Clint:';
		$employ_cus_id			= $data['customer_id'];
		
		
		$tem_cus_text 			= 'Complain:';
		$Complain_Template		= $data['details'];
		
		$tem_cus_m_text 		= 'Mobile:';
		$m_Template				= $data['customer_mobile'];
		
		$tem_cus_a_text 		= 'Address:';
		$a_Template				= $data['customer_address'];
		
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
		
		
		$message2	= $header_text2.$space.$employ_cus_id.$comma.$tem_cus_a_text.$a_Template.$comma.$tem_cus_m_text.$m_Template.$comma.$tem_cus_text.$Complain_Template.$Thank_you.$space.$footer_text.$comma.$Support_send_text.$Support;
		
		$url2 = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data2 = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message2,'mobile_no' =>$employ_info->mobile);
		// use key 'http' even if you send the request to https://...
		$options2 = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data2)));
		$context2  = stream_context_create($options2);
		$result2 = file_get_contents($url2, false, $context2);
		
		
		redirect('software/Add_Complain_For_Imminent_User');
	}
	
	public function View_All_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		
		$data['all_com'] 		= $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['pending_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 0), 'id asc');
		$data['Solved_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 1), 'id asc');
		$data['Reviewed_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 2), 'id asc');
		$data['Not_Solved_com'] = $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 3), 'id asc');
		$data['imadi_com'] 		= $this->M_cloud->minimamaqty('add_complain_table', array('type'=> 'Add_Imminent_complain'), 'id asc');
		$this->load->view('superadmin/View_All_ComplainPage', $data);
	}
    
	
	public function Imminent_com_edit($id)
	{
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['complain_template_table_List'] = $this->M_cloud->findAll('complain_template_table', 'id desc');
		$data['Employee_List'] = $this->M_cloud->findAll('employee_table', 'auto_id desc');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_tableList'] = $this->M_cloud->findbyidstock('add_complain_table', array('id'=> $id));
		$this->load->view('superadmin/Imminent_com_editPage', $data);
	}
	
	
	public function add_com_edit($id)
	{
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['complain_template_table_List'] = $this->M_cloud->findAll('complain_template_table', 'id desc');
		$data['Employee_List'] = $this->M_cloud->findAll('employee_table', 'auto_id desc');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_tableList'] = $this->M_cloud->findbyidstock('add_complain_table', array('id'=> $id));
		$this->load->view('superadmin/add_com_editPage', $data);
	}
	
	
	
	public function Imminent_com_Update()
	{
		$id 	=  $this->input->post('id');
		$data['complain_date'] 	   			= $this->input->post('complain_date'); 
		$data['complain_time'] 	   			= $this->input->post('complain_time');
		$data['customer_id'] 	   			= $this->input->post('customer_name');
		$data['customer_address'] 	   		= $this->input->post('customer_address');
		$data['customer_mobile'] 	   		= $this->input->post('customer_mobile');
		$data['template'] 	   				= $this->input->post('template');
		$data['details'] 					= $this->input->post('details');
		$data['note'] 						= $this->input->post('note');
		$data['employee'] 					= $this->input->post('employee');
		$data['sms_check'] 					= $this->input->post('sms_check');
		$data['type'] 						= 'Add_Imminent_complain';
		$this->db->update('add_complain_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('software/Add_Complain_For_Imminent_User/View_All_Complain');
	}
	
	
	public function add_com_Update()
	{
		$id 	=  $this->input->post('id');
		$customer_id	   		= $this->input->post('customer_id');
		$customer_info = $this->M_cloud->findbyidstock('customer_table', array('name'=> $customer_id));
		
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
		
		$this->db->update('add_complain_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('software/Add_Complain_For_Imminent_User/View_All_Complain');
	}
	
	public function delete($auto_id)
	{
		$where = array('auto_id' => $auto_id);
		$result 	= $this->M_cloud->tbWhRow('employee_table', $where);
		$this->M_cloud->destroyAll('employee_table', $where);
		redirect('software/Add_New_Employee/View_all_Employee');
	}
	
	
	public function Change_status()
	{
		date_default_timezone_set('Asia/Dhaka');
		$id 							= $this->input->post('id');
		$data2['status'] 				= $this->input->post('status');
		$data2['solve_date'] 			= date("d-m-Y");
		$this->db->update('add_complain_table', $data2, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Add_Complain_For_Imminent_User/View_All_Complain');
	}
	
	
	public function All_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['all_com'] 		= $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['pending_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 0), 'id asc');
		$data['Solved_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 1), 'id asc');
		$data['Reviewed_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 2), 'id asc');
		$data['Not_Solved_com'] = $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 3), 'id asc');
		$data['imadi_com'] 		= $this->M_cloud->minimamaqty('add_complain_table', array('type'=> 'Add_Imminent_complain'), 'id asc');
		$this->load->view('superadmin/All_ComplainPage', $data);
	}
	
	public function Solved_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['all_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 1), 'id asc');
		$this->load->view('superadmin/All_ComplainPage', $data);
	}
	
	
	public function Pending_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['all_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 0), 'id asc');
		$this->load->view('superadmin/All_ComplainPage', $data);
	}
	
	
	
	
	public function Reviewed_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['all_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 2), 'id asc');
		$this->load->view('superadmin/All_ComplainPage', $data);
	}
	
	public function Not_Solved_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['all_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('status'=> 3), 'id asc');
		$this->load->view('superadmin/All_ComplainPage', $data);
	}
	
	
	public function Imminent_Customers_Complain()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_complain_table_List'] = $this->M_cloud->findAll('add_complain_table', 'id asc');
		$data['all_com'] 	= $this->M_cloud->minimamaqty('add_complain_table', array('type'=> 'Add_Imminent_complain'), 'id asc');
		$this->load->view('superadmin/All_ComplainPage', $data);
	}
	
	
	
	
	
}
