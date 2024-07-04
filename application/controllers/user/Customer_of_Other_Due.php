<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_of_Other_Due extends CI_Controller {

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
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		
		$this->load->view('user/Customer_of_Other_DuePage', $data);
	}
	
	
	
	public function pay_now()
	{
		date_default_timezone_set('Asia/Dhaka');
		$current_date 						= date("Y-m-d");
		$customer_id 	= $this->input->post('custo_id');
		$amount			= $this->input->post('running_month_due_payment');
		$valid_check = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $customer_id));
		$connection_charge_due_payment 	= $this->input->post('connection_charge_due_payment');
		
		//if($amount+1 > $valid_check->running_bill){
		
		
		
		$data['customer_id'] 	= $this->input->post('custo_id');
		$data['payment_date'] 	= date("Y-m-d");
		$data['amount'] 		= $this->input->post('running_month_due_payment');
		
		
		
		$data['type'] 			= 'Monthly';
		$data['cdate_time'] 	= date('d/m/Y h:i:s a', time());
		$value 					= date("Y-m-d");
		$value 					= explode('-', $value); 
		$year 					= $value[0];
		$month  				= $value[1];
		$day  					= $value[2];
		$monthNum  				= $month;
		
		$data['monthly_name'] 	= $month;
		$data['yearly_name'] 	= $year;
		
		
		$dateObj   				= DateTime::createFromFormat('!m', $monthNum);
		$monthName 				= $dateObj->format('F');
		$data['month_name'] 	= $monthName;
		$bill_check = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $data['customer_id']));
		$data2['running_month_due_amount'] 				= $bill_check->running_month_due_amount - $data['amount'];
		$data2['connection_charge_due_amount'] 	= ($bill_check->connection_charge_due_amount -  $connection_charge_due_payment);
		$this->db->update('customer_table', $data2, array('custo_id' => $bill_check->custo_id));
		// connecting charge record start //
		$data3['customer_id'] 	= $data['customer_id'];
		$data3['payment_date'] 	= date("Y-m-d");
		$data3['amount'] 		= $this->input->post('connection_charge_due_payment');
		$data3['cdate_time'] 	= date('d/m/Y h:i:s a', time());
		$data3['monthly_name'] 	= $month;
		$data3['yearly_name'] 	= $year;
		
		
		//con monthly value in/up start //
		$running_day_check_con = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		if(empty($running_day_check_con)){
		$monthly_con['dat_total_bill_collection'] 	= $data['amount'];
		$monthly_con['day_total_connection_charge'] 	= $connection_charge_due_payment;
		$monthly_con['month_running_date'] 			= date("Y-m-d");
		$this->db->insert('monthly_report_table', $monthly_con);
		} else {
		$running_day_check_info_con = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		$monthly_con['dat_total_bill_collection'] 	= $running_day_check_info_con->dat_total_bill_collection + $data['amount'];
		$monthly_con['day_total_connection_charge'] 	= $running_day_check_info_con->day_total_connection_charge + $connection_charge_due_payment;
		$this->db->update('monthly_report_table', $monthly_con, array('month_running_date' => $running_day_check_info_con->month_running_date));
		}
		//con monthly value in/up end //
		
		
		$monthNum  = $month;
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F');
		
		// opening_amount accpont  statement start //
		if($amount > 0){
			$text 									=$monthName .' Months Opening amount of ';
			$as_data['credit'] 						= $amount;
			$as_data['debit'] 						= 0;
			$as_data['particular'] 					= $text .$valid_check->name;
			$as_data['c_date'] 						= date("Y-m-d");
			$as_data['month_name'] 					= $month;
			$this->db->insert('account_statement_table', $as_data);
		}
		//opening_amount accpont  statement end //
		
		// connect_charge accpont  statement start //
		if($connection_charge_due_payment > 0){
			$text2 									=$monthName .' Months Connection charge payment of ';
			$asc_data['credit'] 					= $connection_charge_due_payment;
			$asc_data['debit'] 						= 0;
			$asc_data['particular'] 				= $text2 .$valid_check->name;
			$asc_data['c_date'] 					= date("Y-m-d");
			$asc_data['month_name'] 					= $month;
		$this->db->insert('account_statement_table', $asc_data);
		}
		//connect_charge accpont  statement end //
		
		
		$this->db->insert('connecting_charge_report_table', $data3);
		// connecting charge record end //
		$this->db->insert('payment_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Customer_of_Other_Due');
		/*} else {
		$this->session->set_flashdata('true', 'Data has been  Fail.');
		redirect('software/Customer_of_Other_Due');
		}*/
		
	}
	
	
	
	public function store()
	{
		$data['zoneName'] 			= $this->input->post('zoneName');
		$this->db->insert('zone_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Zone_Info');
	}
	
	
	public function edit($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_zone_info'] = $this->M_cloud->findbyidstock('zone_table', array('id' => $id));
		$this->load->view('user/Zone_Info_editPage', $data);
	}
	
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['zoneName'] 	   	= $this->input->post('zoneName');
		
		$this->db->update('zone_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Zone_Info');
		
	}
	
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('zone_table', $where);
		$this->M_cloud->destroyAll('zone_table', $where);
		redirect('user/Zone_Info');
	}
	
	public function checkemail()
    {
        $username = $this->input->post('username');
		
        $result = $this->M_cloud->tbWhRow('create_divisional_admin_table', array('username' => $username));
        if($result){
            echo true;
        } else {
            echo false;
        }
    }
    
	
	
	
}
