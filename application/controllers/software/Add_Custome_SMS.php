<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Custome_SMS extends CI_Controller {

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
		$data['add_customer_sms_tableList'] = $this->M_cloud->findbyidstock('add_customer_sms_table', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Add_Custome_SMSPage', $data);
	}
	
	public function Add_action()
	{
		$data['header_sms'] 			= $this->input->post('header_sms');
		$data['sms_details'] 			= $this->input->post('sms_details');
		$this->db->update('add_customer_sms_table', $data, array('id' => '1'));
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Add_Custome_SMS');
	}
	
	public function Due_sms()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_customer_sms_tableList'] = $this->M_cloud->findbyidstock('due_customer_sms_table', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Due_smsPage', $data);
	}
	
	public function due_action()
	{
		$data['header_sms'] 			= $this->input->post('header_sms');
		$data['sms_details'] 			= $this->input->post('sms_details');
		$this->db->update('due_customer_sms_table', $data, array('id' => '1'));
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Add_Custome_SMS/Due_sms');
	}
	
	
	public function Due_sms_action()
	{
		$zone 				= $this->input->post('zone');
		if(empty($zone)){
		$all_customer_List  = $this->M_cloud->minimamaqty('customer_table', array('previus_months_due >'=> 0),'custo_id  desc');
		}else {
		$all_customer_List  = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone, 'previus_months_due >'=> 0), 'custo_id  asc');
		}
		
		
		$header_sms			= $this->input->post('header_sms');
		$comments			= $this->input->post('comments');
		
		foreach ($all_customer_List as $v) {
			$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
			$sender_id='483';
			
			$header_sms 		= $header_sms;
			$header_text 		= $comments;
			
			$Support_send_text 	= 'Support Number:';
			$Support 			= '01854238062';
			$space 				= ' ';
			$comma 				= ',';
			
			$message	= $header_sms.$space.$header_text.$space.$Support_send_text.$Support;
	
			$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
			$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$v->mobile);
			// use key 'http' even if you send the request to https://...
			$options = array(
			'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
		}
		redirect('software/Add_Custome_SMS/Due_sms');
	}
	
	
	
	public function Occational_sms()
	{
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_customer_sms_tableList'] = $this->M_cloud->findbyidstock('occational_customer_sms_table', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Occational_smsPage', $data);
	}
	
	public function Occasional_sms_action()
	{
		$zone 				= $this->input->post('zone');
		if(empty($zone)){
		$all_customer_List  = $this->M_cloud->minimamaqty('customer_table', array('status'=> 1),'custo_id  desc');
		}else {
		$all_customer_List  = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone, 'status'=> 1), 'custo_id  asc');
		}
		
		$comments			= $this->input->post('comments');
		
		foreach ($all_customer_List as $v) {
			$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
			$sender_id='483';
			
			$header_text 		= $comments;
			$Support_send_text 	= 'Support Number:';
			$Support 			= '01854238062';
			$space 				= ' ';
			$comma 				= ',';
			
			$message	= $header_text.$space.$Support_send_text.$Support;
	
			$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
			$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$v->mobile);
			// use key 'http' even if you send the request to https://...
			$options = array(
			'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
		}
		
		
		
		redirect('software/Add_Custome_SMS/Occational_sms');
	}
	
	
	
	
	public function Occasional_action()
	{
		$data['sms_details'] 			= $this->input->post('sms_details');
		$this->db->update('occational_customer_sms_table', $data, array('id' => '1'));
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Add_Custome_SMS/Occational_sms');
	}
	
	
	
	
	
	public function inactive_customer_sms()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['add_customer_sms_tableList'] = $this->M_cloud->findbyidstock('inactive_customer_sms_table', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/inactive_customer_smsPage', $data);
	}
	
	
	
	public function inactive_action()
	{
		$data['sms_details'] 			= $this->input->post('sms_details');
		$this->db->update('inactive_customer_sms_table', $data, array('id' => '1'));
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Add_Custome_SMS/inactive_customer_sms');
	}
	
	
	
	public function inactive_sms_action()
	{
		
		$all_customer_List  = $this->M_cloud->minimamaqty('customer_table', array('status'=> 0),'custo_id  desc');
		$comments			= $this->input->post('comments');
		
		foreach ($all_customer_List as $v) {
			$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
			$sender_id='483';
			
			$header_text 		= $comments;
			$Support_send_text 	= 'Support Number:';
			$Support 			= '01854238062';
			$space 				= ' ';
			$comma 				= ',';
			
			$message	= $header_text.$space.$Support_send_text.$Support;
	
			$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
			$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$v->mobile);
			// use key 'http' even if you send the request to https://...
			$options = array(
			'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
		}
		redirect('software/Add_Custome_SMS/inactive_customer_sms');
	}
	
	
}
