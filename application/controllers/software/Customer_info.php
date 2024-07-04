<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_info extends CI_Controller {

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
		$data['village_List'] = $this->M_cloud->findAll('village_table', 'id desc');
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Customer_infoPage', $data);
	}
	
    /* public function Print($custo_id)
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['all_customer_List'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/PrintPage', $data);
	}*/
	
	
	public function print_coustomer()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/print_coustomerPage', $data);
	}
	
	public function remarks($custo_id)
	{
		$data['custo_id'] = $custo_id;
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['remarks_List'] = $this->M_cloud->minimamaqty('remarks_table', array('customer_id'=> $custo_id), 'remarks_id  desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/remarksPage', $data);
	}
	
	
	public function remarks_store()
	{
		date_default_timezone_set('Asia/Dhaka');
		$customer_id 					= $this->input->post('customer_id');
		$data['customer_id'] 			= $this->input->post('customer_id');
		$data['comments'] 				= $this->input->post('comments');
		$data['cdate_time'] 			= date('d/m/Y h:i:s a', time());
		$this->db->insert('remarks_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Customer_info/remarks/' .$customer_id);
	}
	
	
	public function remarks_edit($remarks_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['find_remarks_info'] = $this->M_cloud->findbyidstock('remarks_table', array('remarks_id'=> $remarks_id));
		$this->load->view('superadmin/Remarks_editPage', $data);
	}
	
	
	public function remarks_update_now()
	{
		$remarks_id 	   	= $this->input->post('remarks_id');
		$customer_id = $this->M_cloud->findbyidstock('remarks_table', array('remarks_id'=> $remarks_id));
		$data['comments'] 		= $this->input->post('comments');
		$this->db->update('remarks_table', $data, array('remarks_id' => $remarks_id));
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Customer_info/remarks/' .$customer_id->customer_id);
	}
	
	public function sms_send()
	{
		$id 				= $this->input->post('id');
		$mobile 				= $this->input->post('mobile');
		
		$sms_table_text_send = $this->M_cloud->findbyidstock('add_customer_sms_table', array('id'=> '1'));
		
		
		$header_sms			= $sms_table_text_send->header_sms;
		$comments			= $sms_table_text_send->sms_details;
		
		
			$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
			$sender_id='483';
			
			$header_sms 		= $header_sms;
			$header_text 		= $comments;
			
			$footer_text 	= 'Meghnalink.com';
			$Support_send_text 	= 'Support Number:';
			$Support 			= '01854238062';
			$space 				= ' ';
			$comma 				= ',';
			
			$message	= $header_sms.$space.$header_text.$space.$footer_text.$space.$Support_send_text.$Support;
	
			$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
			$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$mobile);
			// use key 'http' even if you send the request to https://...
			$options = array(
			'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
		
	}
	
	
	public function remarks_delete($remarks_id)
	{
		$customer_id = $this->M_cloud->findbyidstock('remarks_table', array('remarks_id'=> $remarks_id));
		$where = array('remarks_id' => $remarks_id);
		$result 	= $this->M_cloud->tbWhRow('remarks_table', $where);
		$this->M_cloud->destroyAll('remarks_table', $where);
		redirect('software/Customer_info/remarks/' .$customer_id->customer_id);
	}
	
	
	public function delete($custo_id)
	{
		$where = array('custo_id' => $custo_id);
		$result 	= $this->M_cloud->tbWhRow('customer_table', $where);
		$this->M_cloud->destroyAll('customer_table', $where);
		redirect('software/Customer_info');
	}
	
	
	
	public function details($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_customer_info'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$this->load->view('superadmin/Customer_details_infoPage', $data);
	}
	
	public function edit($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['village_List'] = $this->M_cloud->findAll('village_table', 'id desc');
		$data['find_customer_info'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$data['package_List'] = $this->M_cloud->findAll('package_table', 'id asc');
		
		
		$this->load->view('superadmin/Customer_details_editPage', $data);
	}
	
	
	
	
	
	
	public function update_now()
	{
		$custo_id 	   	= $this->input->post('custo_id');
		
		$orgDate 				= $this->input->post('connection_date');  
    	$newDate 				= date("Y-m-d", strtotime($orgDate));
		$data['name'] 	   		= $this->input->post('name'); 
		$data['mobile'] 	   	= $this->input->post('mobile');
		$data['regularmobile'] 	= $this->input->post('regularmobile');
		$data['email'] 			= $this->input->post('email');
		$data['national_id'] 	= $this->input->post('national_id');
		$data['details'] 		= $this->input->post('details');
		$data['zone'] 			= $this->input->post('zone'); 
		$data['con_date']   	= $newDate;
		$data['taka'] 			= $this->input->post('taka');
		$data['running_bill'] 			= $this->input->post('taka');
		$data['bill_date'] 		= $this->input->post('bill_date');
		$data['status'] 		= $this->input->post('status');
		$data['village'] 	   		= $this->input->post('village');
		$data['Clint_IP'] 	   		= $this->input->post('Clint_IP');
		//$data['Speed'] 	   		= $this->input->post('Speed');
		//$data['package'] 	   		= $this->input->post('package');
		$data['previus_months_due'] 	   		= $this->input->post('previus_months_due'); 
		$data['previus_due_note'] 	   	= $this->input->post('previus_due_note');
		
		
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
		
		
		$this->db->update('customer_table', $data, array('custo_id' => $custo_id));
		
		if($data['previus_months_due'] == 0){
		$lastid = $custo_id;
		$data_pre['customer_id'] 	= $lastid;
		$data_pre['payment_date'] 	= date("Y-m-d");
		$data_pre['amount'] 		= $data['previus_months_due'];
		$data_pre['details'] 		= $data['previus_due_note'];
		$this->db->insert('pre_customer_report_table', $data_pre);
		}
		
		
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Customer_info');
	}
	
	public function zoneshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$zone 	= $this->input->post('zone');
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone), 'custo_id desc');
		$data['all_customer_List23'] = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone), 'custo_id desc');
		$this->load->view('superadmin/zone_wise_coustomer_show', $data);
	}
	
	public function villageshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$village 	= $this->input->post('village');
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('village'=> $village), 'custo_id desc');
		$data['all_customer_List23'] = $this->M_cloud->minimamaqty('customer_table', array('village'=> $village), 'custo_id desc');
		$this->load->view('superadmin/zone_wise_coustomer_show', $data);
	}
	
	
	
	
	public function allshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$zone 	= $this->input->post('zone');
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id desc');
		$data['all_customer_List23'] = $this->M_cloud->findAll('customer_table', 'custo_id desc');
		$this->load->view('superadmin/zone_wise_coustomer_show', $data);
	}
	
	
	public function activeshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$zone 	= $this->input->post('zone');
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '1'), 'custo_id desc');
		$data['all_customer_List23'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '1'), 'custo_id desc');
		$this->load->view('superadmin/zone_wise_coustomer_show', $data);
	}
	
	public function inactiveshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$zone 	= $this->input->post('zone');
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '0'), 'custo_id desc');
		$data['all_customer_List23'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '0'), 'custo_id desc');
		$this->load->view('superadmin/zone_wise_coustomer_show', $data);
	}
	
	
	
}
