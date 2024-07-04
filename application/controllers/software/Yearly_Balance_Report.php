<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yearly_Balance_Report extends CI_Controller {

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
		$data['year_ListRe'] = $this->M_cloud->year_group2('monthly_report_table', 'yearly_name asc');
		$date1 	= date("Y-m-d");
		$date1 	= explode('-', $date1); 
		$year 	= $date1[0];
		$month  = $date1[1];
		$day  	= $date1[2];
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['expense_table_List'] = $this->M_cloud->findAllamount22('expense_table', array('month_name'=> $month), 'id desc');
		$pre_monthly_bal_table_List = $this->M_cloud->findAlltablewhereorderbyid('monthly_report_table', array('month_name >'=> $month), 'month_running_date asc');
		$total_Bill_Collection 		= 0;
		$total_Connection_Charge 	= 0;
		$total_Others_Income 		= 0;
		$total_Opening_Amount 		= 0;
		$total_Expense 				= 0;
		$total_Discount 			= 0;
		$total_opannig 				= 0;
		foreach ($pre_monthly_bal_table_List as $mon_value) {
		$total_Bill_Collection 		= $total_Bill_Collection + $mon_value->dat_total_bill_collection;
		$total_Connection_Charge 	= $total_Connection_Charge + $mon_value->day_total_connection_charge;
		$total_Others_Income 		= $total_Others_Income + $mon_value->day_total_others_income;
		$total_Opening_Amount 		= $total_Opening_Amount + $mon_value->total_opaning_amount;
		$total_Expense 				= $total_Expense + $mon_value->day_total_expence;
		$total_Discount 			= $total_Discount + $mon_value->day_total_discount;
		$total_opannig 				= $total_opannig + $mon_value->total_opaning_amount;
		}
		
		$opanning_amount 	= $total_opannig;
		$total_income 		= $total_Bill_Collection + $total_Connection_Charge + $total_Others_Income;
		$total_expence 		= $total_Expense;
		$data['yearly_bal_table_List'] = $this->M_cloud->yearly_m('monthly_report_table', array('yearly_name'=> $year), 'month_running_date asc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Yearly_Balance_ReportPage', $data);
	}
	
	
	public function showreportrrrrr()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_ListRe'] = $this->M_cloud->year_group2('monthly_report_table', 'yearly_name asc');
		$date1 	= date("Y-m-d");
		$date1 	= explode('-', $date1); 
		$year 	= $date1[0];
		$month  = $date1[1];
		$day  	= $date1[2];
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['expense_table_List'] = $this->M_cloud->findAllamount22('expense_table', array('month_name'=> $month), 'id desc');
		$pre_monthly_bal_table_List = $this->M_cloud->findAlltablewhereorderbyid('monthly_report_table', array('month_name >'=> $month), 'month_running_date asc');
		$total_Bill_Collection 		= 0;
		$total_Connection_Charge 	= 0;
		$total_Others_Income 		= 0;
		$total_Opening_Amount 		= 0;
		$total_Expense 				= 0;
		$total_Discount 			= 0;
		$total_opannig 				= 0;
		foreach ($pre_monthly_bal_table_List as $mon_value) {
		$total_Bill_Collection 		= $total_Bill_Collection + $mon_value->dat_total_bill_collection;
		$total_Connection_Charge 	= $total_Connection_Charge + $mon_value->day_total_connection_charge;
		$total_Others_Income 		= $total_Others_Income + $mon_value->day_total_others_income;
		$total_Opening_Amount 		= $total_Opening_Amount + $mon_value->total_opaning_amount;
		$total_Expense 				= $total_Expense + $mon_value->day_total_expence;
		$total_Discount 			= $total_Discount + $mon_value->day_total_discount;
		$total_opannig 				= $total_opannig + $mon_value->total_opaning_amount;
		}
		
		$opanning_amount 	= $total_opannig;
		$total_income 		= $total_Bill_Collection + $total_Connection_Charge + $total_Others_Income;
		$total_expence 		= $total_Expense;
		
		$dateYear 	= $this->input->post('dateYear');
		$data['yearly_bal_table_List'] = $this->M_cloud->yearly_m('monthly_report_table', array('yearly_name'=> $dateYear), 'month_running_date asc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/ShortingYearly_Balance_ReportPage', $data);
	}
	
	
	
	
	public function day_wise()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$date1 	= date("Y-m-d");
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['expense_table_List'] = $this->M_cloud->findAllamount22('expense_table', array('cdate'=> $date1), 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Expense_ReportdayPage', $data);
	}
	
	
	
	public function showreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$dateMonth 	= $this->input->post('dateMonth');
		$dateYear 	= $this->input->post('dateYear');
		if(!empty($dateMonth)){
		$data['expense_table_Lis2t'] = $this->M_cloud->findAllamount22('expense_table', array('month_name'=> $dateMonth, 'year_name'=> $dateYear), 'id desc');
		} else {
		$data['expense_table_Lis2t'] = $this->M_cloud->findAllamount22('expense_table', array('year_name'=> $dateYear), 'id desc');
		}
		$this->load->view('superadmin/Expence_date_wiseReportPage', $data);
	}
	
	public function dayshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		
		$datesass 	= $this->input->post('date');
    	
		$data['expense_table_Lis2t'] = $this->M_cloud->findAllamount22('expense_table', array('cdate'=> $datesass), 'id desc');
		$this->load->view('superadmin/Expence_date_wiseReportPage', $data);
	}
	
	
	
	
	public function Expense_details($header_name)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$date1 	= date("Y-m-d");
		$date1 	= explode('-', $date1); 
		$year 	= $date1[0];
		$month  = $date1[1];
		$day  	= $date1[2];
		$data['account_head_List'] = $this->M_cloud->findAll('account_head_table', 'id desc');
		$data['expense_details_info'] = $this->M_cloud->minimamaqty('expense_table', array('header_name' => $header_name, 'month_name' => $month), 'id desc');
		$this->load->view('superadmin/Expense_detailsPage', $data);
	}
	
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['zoneName'] 	   	= $this->input->post('zoneName');
		
		$this->db->update('zone_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('software/Zone_Info');
		
	}
	
	
	public function delete($id)
	{
		$where = array('id' => $id);
		$result 	= $this->M_cloud->tbWhRow('zone_table', $where);
		$this->M_cloud->destroyAll('zone_table', $where);
		redirect('software/Zone_Info');
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
