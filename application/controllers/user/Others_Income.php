<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others_Income extends CI_Controller {

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
		$date1 	= date("Y-m-d");
		$date1 	= explode('-', $date1); 
		$year 	= $date1[0];
		$month  = $date1[1];
		$day  	= $date1[2];
		$data['expense_table_List'] = $this->M_cloud->findAllamount22333('other_income_table', array('monthly_name'=> $month), 'id desc');
		$data['account_head_List'] = $this->M_cloud->findAll('account_head_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/Others_IncomePage', $data);
	}
	
	public function Income_history($header_name)
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$date1 	= date("Y-m-d");
		$date1 	= explode('-', $date1); 
		$year 	= $date1[0];
		$month  = $date1[1];
		$day  	= $date1[2];
		$data['expense_table_List'] = $this->M_cloud->minimamaqty('other_income_table', array('header_name'=> $header_name), 'id desc');
		$data['account_head_List'] = $this->M_cloud->findAll('account_head_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/Income_historyPage', $data);
	}
	
	
	public function date_to_date()
	{
		$from 					= $this->input->post('from_date');
		$to						= $this->input->post('to_date');
    	$from_newDate 			= date("Y-m-d", strtotime($from));
    	$to_newDate 			= date("Y-m-d", strtotime($to));
		$status 				= $this->input->post('status');
		$data['from_date'] 			= $from;
		$data['to_date'] 			= $to;
		$data['expense_table_List'] = $this->M_cloud->findAllamount22333('other_income_table', array('cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		
		
		$this->load->view('user/show_other_income_reportPage', $data);
	}
	
	
	public function store()
	{
		
		date_default_timezone_set('Asia/Dhaka');
		$current_date 				= date("Y-m-d");
		$value 						= date("Y-m-d");
		$value 						= explode('-', $value); 
		$year 						= $value[0];
		$month  					= $value[1];
		$day  						= $value[2];
		
		$amount 			= $this->input->post('amount');
		
		$data['header_name'] 		= $this->input->post('header_name');
		$data['amount'] 			= $this->input->post('amount');
		$data['details'] 			= $this->input->post('details');
		$data['cdate'] 				= date("Y-m-d");
		$data['monthly_name'] 	= $month;
		$data['yearly_name'] 	= $year;
		
		
		
		// monthly value in/up start //
		$running_day_check = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		
		if(empty($running_day_check)){
		$monthly['day_total_others_income'] 	= $data['amount'];
		$monthly['month_running_date'] 			= date("Y-m-d");
		$monthly['month_name'] 			= $month;
		$monthly['yearly_name'] 		= $year;
		$this->db->insert('monthly_report_table', $monthly);
		} else {
		
		$running_day_check_info = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		$monthly2['day_total_others_income'] 	= $running_day_check_info->day_total_others_income + $amount;
		$this->db->update('monthly_report_table', $monthly2, array('month_running_date' => $running_day_check_info->month_running_date));
		}
		// monthly value in/up end //
		$this->db->insert('other_income_table', $data);
		$last_id_oic = $this->db->insert_id();
		
		// accpont  statement start //
		$as_data['others_income'] 				= $last_id_oic;
		$as_data['credit'] 						= $data['amount'];
		$as_data['debit'] 						= 0;
		$as_data['particular'] 					= $data['details'];
		$as_data['c_date'] 						= date("Y-m-d");
		$as_data['month_name'] 					= $month;
		$this->db->insert('account_statement_table', $as_data);
		// accpont  statement end //
		
		
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Others_Income');
	}
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['header_name'] 		= $this->input->post('header_name');
		$data['amount'] 			= $this->input->post('amount');
		$data['details'] 			= $this->input->post('details');
		$data['last_update'] 				= date("Y-m-d");
		
		$this->db->update('other_income_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Others_Income');
		
	}
	
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('other_income_table', $where);
		$this->M_cloud->destroyAll('other_income_table', $where);
		redirect('user/Others_Income');
	}
	
	public function Send_message()
    {
        // SMS send code //
			$scode 		= '123456';
			$mobile1 	= '01917720190';		
			$message 	= urlencode('DB LIVES.'.'Withdraw security code is :'.$scode);
			$urlgenrte = 'http://portal.smsinbd.com/smsapi?api_key=6c41101fe24a8f80c8cb51781f9e9ecf8c7a4d3918d129b1b246ac804cd399e5dad162a7&type=text&contacts='.$mobile1.'&senderid=8801552146120&msg='.$message.'';
			$ch = curl_init($urlgenrte);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
    }
    
	
	
	
}
