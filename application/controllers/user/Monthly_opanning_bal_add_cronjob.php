<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monthly_opanning_bal_add_cronjob extends CI_Controller {

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
	 }

       
	public function store()
	{
		$current_date 						= date("Y-m-d");
		$date1 	= date("Y-m-d");
		$date1 	= explode('-', $date1); 
		$year 	= $date1[0];
		$month  = $date1[1];
		$day  	= $date1[2];
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['expense_table_List'] = $this->M_cloud->findAllamount22('expense_table', array('month_name'=> $month), 'id desc');
		
		$pre_month = $month;
		$monthly_bal_table_List = $this->M_cloud->findAlltablewhereorderbyid('monthly_report_table', array('month_name'=> $pre_month), 'month_running_date asc');
		
		$total_Bill_Collection = 0;
			 $total_Connection_Charge = 0;
			 $total_Others_Income = 0;
			 $total_Opening_Amount = 0;
			 $total_Expense = 0;
			 $total_Discount = 0;
			 $total_opannig = 0;
			 foreach ($monthly_bal_table_List as $mon_value) {
			 $total_Bill_Collection 	= $total_Bill_Collection + $mon_value->dat_total_bill_collection;
			 $total_Connection_Charge 	= $total_Connection_Charge + $mon_value->day_total_connection_charge;
			 $total_Others_Income 		= $total_Others_Income + $mon_value->day_total_others_income;
			 $total_Opening_Amount 		= $total_Opening_Amount + $mon_value->total_opaning_amount;
			 $total_Expense 			= $total_Expense + $mon_value->day_total_expence;
			 $total_Discount 			= $total_Discount + $mon_value->day_total_discount;
			 $total_opannig_ble			= $total_opannig + $mon_value->total_opaning_balance;
		}
		
		$opanning_amount 	= $total_opannig;
		$total_income 		= $total_Bill_Collection + $total_Connection_Charge + $total_Others_Income+$total_Opening_Amount+$total_opannig_ble;
		$total_expence 		= $total_Expense;
		
		$cash_and_hand = ($total_income)-($total_expence);
		
		
		
		// monthly value in/up start //
		$running_day_check = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		if(empty($running_day_check)){
		$monthly['total_opaning_balance'] 	= $cash_and_hand;
		$monthly['month_running_date'] 		= date("Y-m-d");
		$monthly['month_name'] 			= $month;
		$monthly['yearly_name'] 		= $year;
		$this->db->insert('monthly_report_table', $monthly);
		} else {
		$running_day_check_info = $this->M_cloud->findbyidstock('monthly_report_table', array('month_running_date'=> $current_date));
		$monthly2['total_opaning_balance'] 	= $running_day_check_info->total_opaning_balance + $cash_and_hand;
		$this->db->update('monthly_report_table', $monthly2, array('month_running_date' => $running_day_check_info->month_running_date));
		}
		// monthly value in/up end //
		
		
		
		
		
		
	}
	
	
	
	
	
}
