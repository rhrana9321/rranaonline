<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill_Collection extends CI_Controller {

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
		if($user_type != 'User'){
		redirect('Home');
		}	
	 }
	
	
	public function index()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '1'), 'custo_id  desc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/Bill_CollectionPage', $data);
	}
	
	public function zone_wise_print()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '1'), 'custo_id  desc');
		$zone 	= $this->input->post('zone');
		$data['zone_List'] = $this->M_cloud->findbyidstock('zone_table', array('id'=> $zone));
		if(empty($zone)){
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		}else {
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone), 'custo_id  asc');
		}
		$this->load->view('user/zone_wise_printPage', $data);
	}
	
	function sms_send(){
		// post mathots //
		
		$id 		= $this->input->post('id');
		$mobile 	= $this->input->post('mobile');
		$total_due 	= $this->input->post('total_due');
		
		
		$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
		$sender_id='483';
		$header_text 		= 'Dear, Customer';
		$footer_text 		= 'Meghnalink.com';
		$mobile_no			= $mobile;
		$cus_send_text 		= 'Your ID: CUS';
		$customer_id 		= $id;
		$bill_send_text 	= 'Total Bill Amt:';
		$bill_amount 		= $total_due;
		$bill_last_text 	= 'Plz pay the bill to keep your connecation running.';
		
		$Support_send_text 	= 'Support:';
		$Support 			= '01854238062';
		$Thank_you 			= 'Thank you.';
		$join 				= 'Join:';
		$link 				= 'www.fb.com/groups/dewan.net';
		
		$space 	= ' ';
		$comma 	= ',';
		$Tk 	= 'Tk';
		
		$message	= $header_text.$cus_send_text.$customer_id.$comma.$space.$bill_send_text.$bill_amount.$Tk.$comma.$space.$bill_last_text.$space.$Thank_you.$space.$footer_text.$comma.$Support_send_text.$Support;

		$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$mobile_no);
		// use key 'http' even if you send the request to https://...
		$options = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	}
	
	public function remarks($custo_id)
	{
		$data['custo_id'] = $custo_id;
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['remarks_List'] = $this->M_cloud->minimamaqty('remarks_table', array('customer_id'=> $custo_id), 'remarks_id  desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/remarksPage', $data);
	}
	
	public function zoneshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		
		$zone 	= $this->input->post('zone');
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone), 'custo_id  desc');
		$this->load->view('user/bill_zone_wise_coustomer_show', $data);
	}
	
	public function pay_now()
	{
		date_default_timezone_set('Asia/Dhaka');
		$current_date 			= date("Y-m-d");
		$data['customer_id'] 	= $this->input->post('customer_id');
		$data['payment_date'] 	= date("Y-m-d");
		$data['amount'] 		= $this->input->post('total_bill');
		$data['type'] 			= 'Monthly';
		$data['cdate_time'] 	= date('d/m/Y h:i:s a', time());
		
		$value 					= date("Y-m-d");
		$value 					= explode('-', $value); 
		$year 					= $value[0];
		$month  				= $value[1];
		$day  					= $value[2];
		$monthNum  				= $month;
		$dateObj   				= DateTime::createFromFormat('!m', $monthNum);
		$monthName 				= $dateObj->format('F');
		$data['month_name'] 	= $monthName;
		
		$data['monthly_name'] 	= $month;
		$data['yearly_name'] 	= $year;
		
		
		//con monthly value in/up start //
		$running_day_check_con = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		if(empty($running_day_check_con)){
		$monthly_con['dat_total_bill_collection'] 	= $data['amount'];
		$monthly_con['month_running_date'] 			= date("Y-m-d");
		$monthly_con['month_name'] 			= $month;
		$monthly_con['yearly_name'] 		= $year;
		$this->db->insert('monthly_report_table', $monthly_con);
		} else {
		$running_day_check_info_con = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		$monthly_con['dat_total_bill_collection'] 	= $running_day_check_info_con->dat_total_bill_collection + $data['amount'];;
		$this->db->update('monthly_report_table', $monthly_con, array('month_running_date' => $running_day_check_info_con->month_running_date));
		}
		//con monthly value in/up end //
		
		
		
		$bill_check = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $data['customer_id']));
		$data2['running_bill'] 				= 0;
		$this->db->update('customer_table', $data2, array('custo_id' => $bill_check->custo_id));
		$this->db->insert('payment_table', $data);
		$last_id_oic = $this->db->insert_id();
		
		// accpont  statement start //
		
		
		$monthNum  = $month;
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F');
		
		$text 									=$monthName .' Months Bill collection of of ';
		$as_data['payment_id'] 					= $last_id_oic;
		$as_data['client'] 						= $data['customer_id'];
		$as_data['credit'] 						= $data['amount'];
		$as_data['debit'] 						= 0;
		$as_data['particular'] 					= $text .$bill_check->name;
		$as_data['c_date'] 						= date("Y-m-d");
		$as_data['month_name'] 					= $month;
		$this->db->insert('account_statement_table', $as_data);
		// accpont  statement end //
		
		
		
		$customer_id 		= $this->input->post('customer_id');
		$cus_info = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $customer_id));
		
		$mobile 			= $cus_info->mobile;
		$total_due 			= $cus_info->taka;
		
		$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
		$sender_id='483';
		$header_text 		= 'Dear, Customer';
		$footer_text 		= 'Meghnalink.com.';
		$mobile_no			= $mobile;
		$cus_send_text 		= 'Your ID: CUS';
		$customer_id 		= $cus_info->customer_id_create;
		$bill_send_text 	= 'Your Bill:';
		$bill_amount 		= $total_due;
		$bill_last_text 	= 'has been paid Successfully.';
		
		$Support_send_text 	= 'Support:';
		$Support 			= '01854238062';
		$Thank_you 			= 'Thank you.';
		
		
		$space 	= ' ';
		$comma 	= ',';
		$Tk 	= 'Tk';
		
		$message	= $header_text.$space.$cus_send_text.$customer_id.$comma.$space.$bill_send_text.$bill_amount.$Tk.$comma.$space.$bill_last_text.$space.$Thank_you.$space.$footer_text.$comma.$Support_send_text.$Support;

		$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$mobile_no);
		// use key 'http' even if you send the request to https://...
		$options = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		
		
		
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
	}
	
	
	public function payment($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['find_customer_paymentinfo'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$data['results_paymentinfo'] = $this->M_cloud->minimamaqty('payment_table', array('customer_id'=> $custo_id), 'payment_id  asc');
		$data['results_paymentconninfo'] = $this->M_cloud->minimamaqty('connecting_charge_report_table', array('customer_id'=> $custo_id), 'connecting_report_id  asc');
		$this->load->view('user/paymentPage', $data);
	}
	
	
	public function payment_history($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['find_customer_paymentinfo'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$data['results_paymentinfo'] = $this->M_cloud->minimamaqty('payment_table', array('customer_id'=> $custo_id), 'payment_id  asc');
		$data['results_paymentconninfo'] = $this->M_cloud->minimamaqty('connecting_charge_report_table', array('customer_id'=> $custo_id), 'connecting_report_id  asc');
		$this->load->view('user/payment_historyPage', $data);
	}
	
	
	
	public function payment_action()
	{
		date_default_timezone_set('Asia/Dhaka');
		$current_date 						= date("Y-m-d");
		
		$value 					= date("Y-m-d");
		$value 					= explode('-', $value); 
		$year 					= $value[0];
		$month  				= $value[1];
		$day  					= $value[2];
		
		
		
		$data['customer_id'] 			= $this->input->post('customer_id');
		$data['month_name'] 			= $this->input->post('month_name');
		$data['discount'] 				= $this->input->post('discount');
		$data['amount'] 				= $this->input->post('amount');
		$data['details'] 				= $this->input->post('details');
		$data['payment_date'] 			= date("Y-m-d");
		$data['cdate_time'] 			= date('d/m/Y h:i:s a', time());
		$data['type'] 					= 'Pre_due';
		
		$data['monthly_name'] 	= $month;
		$data['yearly_name'] 	= $year;
		
		//con monthly value in/up start //
		$running_day_check_con = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		if(empty($running_day_check_con)){
		$monthly_con['dat_total_bill_collection'] 	= $data['amount'];
		$monthly_con['day_total_discount'] 			= $data['discount'];
		$monthly_con['month_running_date'] 			= date("Y-m-d");
		$monthly_con['month_name'] 			= $month;
		$monthly_con['yearly_name'] 		= $year;
		
		
		$this->db->insert('monthly_report_table', $monthly_con);
		} else {
		$running_day_check_info_con = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		$monthly_con['dat_total_bill_collection'] 	= $running_day_check_info_con->dat_total_bill_collection + $data['amount'];
		$monthly_con['day_total_discount'] 	= $running_day_check_info_con->day_total_discount + $data['discount'];
		$this->db->update('monthly_report_table', $monthly_con, array('month_running_date' => $running_day_check_info_con->month_running_date));
		}
		//con monthly value in/up end //
		
		$due_update = $data['amount']+$data['discount'];
		$bill_check = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $data['customer_id']));
		$data2['previus_months_due'] 				= $bill_check->previus_months_due - $due_update;
		$this->db->update('customer_table', $data2, array('custo_id' => $bill_check->custo_id));
		$this->db->insert('payment_table', $data);
		
		
		// accpont  statement start //
		$last_id_oic = $this->db->insert_id();
		
		$monthNum  = $month;
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F');
		$text 									=$monthName .' Months Bill collection of of ';
		$as_data['payment_id'] 					= $last_id_oic;
		$as_data['client'] 						= $data['customer_id'];
		$as_data['credit'] 						= $data['amount'];
		$as_data['debit'] 						= 0;
		$as_data['particular'] 					= $text .$bill_check->name;
		$as_data['c_date'] 						= date("Y-m-d");
		$as_data['month_name'] 					= $month;
		$this->db->insert('account_statement_table', $as_data);
		// accpont  statement end //
		
		
		
		
		$customer_id 		= $this->input->post('customer_id');
		$cus_info = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $customer_id));
		
		$mobile 			= $cus_info->mobile;
		$total_due 			= $data['amount'];
		
		$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
		$sender_id='483';
		$header_text 		= 'Dear, Customer';
		$footer_text 		= 'Meghnalink.com.';
		$mobile_no			= $mobile;
		$cus_send_text 		= 'Your ID: CUS';
		$customer_id 		= $cus_info->customer_id_create;
		
		$bill_send_text 	= 'Your Bill:';
		$bill_amount 		= $total_due;
		
		if($data['discount'] > 0){
		$dis_send_text 		= 'Your discount:';
		$dis_amount 		= $data['discount'];
		}else{
		$dis_send_text 		= 'Your discount:';
		$dis_amount 		= 0;
		}
		
		$bill_last_text 	= 'has been paid Successfully.';
		
		$Support_send_text 	= 'Support:';
		$Support 			= '01854238062';
		$Thank_you 			= 'Thank you.';
		
		
		$space 	= ' ';
		$comma 	= ',';
		$Tk 	= 'Tk';
		
		$message	= $header_text.$space.$cus_send_text.$customer_id.$comma.$space.$bill_send_text.$bill_amount.$Tk.$comma.$dis_send_text.$dis_amount .$Tk.$comma. $space.$bill_last_text.$space.$Thank_you.$space.$footer_text.$comma.$Support_send_text.$Support;

		$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$mobile_no);
		// use key 'http' even if you send the request to https://...
		$options = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		
		redirect('user/Bill_Collection/payment/' .$cus_info->custo_id);
	}
	
	
	
	
	public function remarks_update_now()
	{
		$remarks_id 	   	= $this->input->post('remarks_id');
		$customer_id = $this->M_cloud->findbyidstock('remarks_table', array('remarks_id'=> $remarks_id));
		
		$data['comments'] 		= $this->input->post('comments');
		$this->db->update('remarks_table', $data, array('remarks_id' => $remarks_id));
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Customer_info/remarks/' .$customer_id->customer_id);
	}
	
	
	public function remarks_delete($remarks_id)
	{
		$customer_id = $this->M_cloud->findbyidstock('remarks_table', array('remarks_id'=> $remarks_id));
		$where = array('remarks_id' => $remarks_id);
		$result 	= $this->M_cloud->tbWhRow('remarks_table', $where);
		$this->M_cloud->destroyAll('remarks_table', $where);
		redirect('user/Customer_info/remarks/' .$customer_id->customer_id);
	}
	
	
	public function delete($custo_id)
	{
		$where = array('custo_id' => $custo_id);
		$result 	= $this->M_cloud->tbWhRow('customer_table', $where);
		$this->M_cloud->destroyAll('customer_table', $where);
		redirect('user/Customer_info');
	}
	
	
	
	public function details($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_customer_info'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$this->load->view('user/Customer_details_infoPage', $data);
	}
	
	public function edit($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['find_customer_info'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$this->load->view('user/Customer_details_editPage', $data);
	}
	
	
	
	
	
	
	public function update_now()
	{
		$custo_id 	   	= $this->input->post('custo_id');
		
		$orgDate 				= $this->input->post('con_date');  
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
		$data['bill_date'] 		= $this->input->post('bill_date');
		$data['status'] 		= $this->input->post('status');
		
		/*$logo_image 			= $this->input->post('logo_image');
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
		}*/
		
		
		$this->db->update('customer_table', $data, array('custo_id' => $custo_id));
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Customer_info');
	}
	
	
}
