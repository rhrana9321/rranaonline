<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In_active_coustomer extends CI_Controller {

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
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '0'), 'custo_id  desc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/In_active_coustomerPage', $data);
	}
	
	public function zone_wise_print()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '1'), 'custo_id  desc');
		$zone 	= $this->input->post('zone');
		$data['zone_List'] = $this->M_cloud->findbyidstock('zone_table', array('id'=> $zone));
		if(empty($zone)){
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('status'=> '0'), 'custo_id  desc');
		}else {
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone, 'status'=> '0'), 'custo_id  asc');
		}
		$this->load->view('superadmin/in_activezone_wise_printPage', $data);
	}
	
	
	public function zoneshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$zone 	= $this->input->post('zone');
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('zone'=> $zone, 'status'=> 0), 'custo_id desc');
		$this->load->view('superadmin/inactive_all_coustomer_show', $data);
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
	
	

	public function pay_now()
	{
		date_default_timezone_set('Asia/Dhaka');
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
		
		$bill_check = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $data['customer_id']));
		$data2['running_bill'] 				= 0;
		$this->db->update('customer_table', $data2, array('custo_id' => $bill_check->custo_id));
		$this->db->insert('payment_table', $data);
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
	}
	
	
	public function payment($custo_id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$data['find_customer_paymentinfo'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$data['results_paymentinfo'] = $this->M_cloud->minimamaqty('payment_table', array('customer_id'=> $custo_id), 'payment_id  asc');
		$data['results_paymentconninfo'] = $this->M_cloud->minimamaqty('connecting_charge_report_table', array('customer_id'=> $custo_id), 'connecting_report_id  asc');
		
		
		$this->load->view('superadmin/paymentPage', $data);
	}
	
	
	public function payment_action()
	{
		date_default_timezone_set('Asia/Dhaka');
		$data['customer_id'] 			= $this->input->post('customer_id');
		$data['month_name'] 			= $this->input->post('month_name');
		$data['discount'] 			= $this->input->post('discount');
		$data['amount'] 				= $this->input->post('amount');
		$data['details'] 				= $this->input->post('details');
		$data['payment_date'] 	= date("Y-m-d");
		$data['cdate_time'] 			= date('d/m/Y h:i:s a', time());
		$data['type'] 					= 'Pre_due';
		
		$due_update = $data['amount']+$data['discount'];
		
		$bill_check = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $data['customer_id']));
		$data2['previus_months_due'] 				= $bill_check->previus_months_due - $due_update;
		$this->db->update('customer_table', $data2, array('custo_id' => $bill_check->custo_id));
		$this->db->insert('payment_table', $data);
		
		redirect('software/Bill_Collection/payment/' .$data['customer_id']);
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
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
		$data['find_customer_info'] = $this->M_cloud->findbyidstock('customer_table', array('custo_id'=> $custo_id));
		$this->load->view('superadmin/Customer_details_editPage', $data);
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
		redirect('software/Customer_info');
	}
	
	
}
