<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Others_Income_Report extends CI_Controller {

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
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['expense_table_List'] = $this->M_cloud->findAllamount22333('other_income_table', array('month_name'=> $month), 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/Others_Income_ReportPage', $data);
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
		$this->load->view('user/Expense_ReportdayPage', $data);
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
		$this->load->view('user/Expence_date_wiseReportPage', $data);
	}
	
	public function dayshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		
		$datesass 	= $this->input->post('date');
    	
		$data['expense_table_Lis2t'] = $this->M_cloud->findAllamount22('expense_table', array('cdate'=> $datesass), 'id desc');
		$this->load->view('user/Expence_date_wiseReportPage', $data);
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
		$this->load->view('user/Expense_detailsPage', $data);
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
