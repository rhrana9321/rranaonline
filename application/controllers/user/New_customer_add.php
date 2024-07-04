<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_customer_add extends CI_Controller {

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
		$data['village_List'] = $this->M_cloud->findAll('village_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/New_customer_addPage', $data);
	}
	
	public function zone_store()
	{
		$data['zoneName'] 			= $this->input->post('zoneName');
		$this->db->insert('zone_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/New_customer_add');
	}
	
	public function store()
	{
		
		date_default_timezone_set('Asia/Dhaka');
		$current_date 						= date("Y-m-d");
		$value 						= date("Y-m-d");
		$value 						= explode('-', $value); 
		$year 						= $value[0];
		$month  					= $value[1];
		$day  						= $value[2];
		
		$maxmeberid   = $this->M_cloud->basicall('customer_table', 'customer_id_create desc');
		$str = $maxmeberid->customer_id_create + 1;
		if(!empty($maxmeberid)){
		$data['customer_id_create'] = $str ;
		} else{
		$data['customer_id_create'] = '1001';	
		}
		
		$orgDate 				= $this->input->post('con_date');  
    	$newDate 				= date("Y-m-d", strtotime($orgDate));
		$data['name'] 	   		= $this->input->post('name'); 
		$data['mobile'] 	   	= $this->input->post('mobile');
		$data['village'] 	   		= $this->input->post('village'); 
		$data['previus_months_due'] 	   		= $this->input->post('previus_months_due'); 
		$data['previus_due_note'] 	   	= $this->input->post('previus_due_note');
		$data['regularmobile'] 	= $this->input->post('regularmobile');
		$data['email'] 			= $this->input->post('email');
		$data['national_id'] 	= $this->input->post('national_id');
		$data['details'] 		= $this->input->post('details');
		$data['zone'] 			= $this->input->post('zone'); 
		$data['opening_amount'] = $this->input->post('opening_amount');
		$data['running_month_due_amount'] 	  	= $this->input->post('running_month_due_amount'); 
		$data['connect_charge'] 				= $this->input->post('connect_charge');
		$data['connection_charge_due_amount'] 	= $this->input->post('connection_charge_due_amount');
		$data['con_date']   	= $newDate;
		$data['taka'] 			= $this->input->post('taka');
		$data['running_bill'] 			= $this->input->post('taka');
		$data['bill_date'] 		= $this->input->post('bill_date');
		$data['status'] 		= $this->input->post('status');
		$data['remarks'] 		= $this->input->post('remarks');
		
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
		
		
		$this->db->insert('customer_table', $data);
		$lastid = $this->db->insert_id();
		
		$data_pre['customer_id'] 	= $lastid;
		$data_pre['payment_date'] 	= date("Y-m-d");
		$data_pre['amount'] 		= $data['previus_months_due'];
		$data_pre['details'] 		= $data['previus_due_note'];
		$this->db->insert('pre_customer_report_table', $data_pre);
		
		
		// monthly value in/up start //
		if($data['opening_amount'] > 0){
			$running_day_check = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
			if(empty($running_day_check)){
			$monthly['total_opaning_amount'] 	= $data['opening_amount'];
			$monthly['day_total_connection_charge'] 	= $data['connect_charge'];
			$monthly['month_running_date'] 		= date("Y-m-d");
			$monthly['month_name'] 				= $month;
			$monthly['yearly_name'] 			= $year;
			$this->db->insert('monthly_report_table', $monthly);
			} else {
			$running_day_check_info = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
			$monthly2['total_opaning_amount'] 	= $running_day_check_info->total_opaning_amount + $data['opening_amount'];
			$monthly2['day_total_connection_charge'] 	= $running_day_check_info->day_total_connection_charge + $data['connect_charge'];
			$this->db->update('monthly_report_table', $monthly2, array('month_running_date' => $running_day_check_info->month_running_date));
			}
		}
		// monthly value in/up end //
		
		
		// opening_amount accpont  statement start //
		if($data['opening_amount'] > 0){
			$as_data['client'] 						= $lastid;
			$as_data['credit'] 						= $data['opening_amount'];
			$as_data['debit'] 						= 0;
			$as_data['particular'] 					= 'opening_amount';
			$as_data['c_date'] 						= date("Y-m-d");
			$as_data['month_name'] 					= $month;
			
			$this->db->insert('account_statement_table', $as_data);
		}
		//opening_amount accpont  statement end //
		
		// connect_charge accpont  statement start //
		if($data['connect_charge'] > 0){
			$asc_data['client'] 				= $lastid;
			$asc_data['credit'] 					= $data['connect_charge'];
			$asc_data['debit'] 						= 0;
			$asc_data['particular'] 				= 'connect_charge';
			$asc_data['c_date'] 					= date("Y-m-d");
			$asc_data['month_name'] 					= $month;
			$this->db->insert('account_statement_table', $asc_data);
		}
		//connect_charge accpont  statement end //
		
		
		
		
		
		/*// post mathots //
		$ap_key='16671305250602532020/05/1902:46:03pmRazib hossain rana'; 
		$sender_id='483';
		
		$header_text 		= 'Welcome to Meghnalink.com.';
		$mobile_no			= $data['mobile'];
		$cus_send_text 		= 'Your: CUS';
		$customer_id 		= $data['customer_id_create'];
		$bill_send_text 	= 'Bill Amt:';
		$bill_amount 		= $data['taka'];
		$Running_send_text 	= 'Running Amt:';
		if($data['opening_amount'] > 0){
		$Running_Amt 		= $data['taka'];
		} else {
		$Running_Amt 		= 0;
		}
		$C_charge_send_text = 'C.Charge:';
		if($data['connect_charge'] > 0){
		$C_charge 			= $data['connect_charge'];
		}else{
		$C_charge 			= 0;
		}
		$Support_send_text 	= 'Support:';
		$Support 			= '01853951775';
		$Thank_you 			= 'Thank you.';
		
		$space = ' ';
		$comma = ',';
		$Tk = 'Tk';
		
		$message	= $header_text.$cus_send_text.$customer_id.$comma.$space.$bill_send_text.$bill_amount.$Tk.$comma.$space.$Running_send_text.$Running_Amt.$Tk.$comma.$space. $C_charge_send_text.$C_charge.$Tk.$comma.$space.$Support_send_text.$Support.$space. $Thank_you;

		$url = 'https://71bulksms.com/sms_api/bulk_sms_sender_2.php';
		$data = array('api_key' => $ap_key,'sender_id' => $sender_id,'message' => $message,'mobile_no' =>$mobile_no);
		// use key 'http' even if you send the request to https://...
		$options = array(
		'http' => array('header'  => "Content-type: application/x-www-form-urlencoded\r\n",'method'  => 'POST','content' => http_build_query($data)));
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);*/


		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/New_customer_add');
	}
	
	
	
	public function updated()
	{
		$create_divisional_admin_id 	=  $this->input->post('create_divisional_admin_id');
		$data['name'] 	   	= $this->input->post('name');
		$data['email'] 	   	= $this->input->post('email');
		$data['mobile'] 	= $this->input->post('mobile');
		$data['username'] 	= $this->input->post('username');
		$data['division'] 	= $this->input->post('division');
		$data['address'] 	= $this->input->post('address');
                if(strlen($this->input->post('password'))>0){
                    $data['password'] 	= md5($this->input->post('password'));
                }
		
		$data['type'] 				= 'Create_divisional_admin';
		$data['ministry_id'] 	= $this->input->post('ministry_id');
		$data['create_record'] 		= 'Superadmin';
			
		$this->db->update('create_divisional_admin_table', $data, array('create_divisional_admin_id' => $create_divisional_admin_id));
			$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Create_Divisional_Admin');
		
	}
	
}
