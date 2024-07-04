<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_Dues extends CI_Controller {

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
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		$data['village_List'] = $this->M_cloud->findAll('village_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/All_DuesPage', $data);
	}
	
	
	
	public function due_customer()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$village 	= $this->input->post('village');
		if(empty($village)){
		$data['all_customer_List'] = $this->M_cloud->findAll('customer_table', 'custo_id  desc');
		}else {
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('village'=> $village), 'custo_id desc');
		}
		$this->load->view('superadmin/due_customerPage', $data);
	}
	
	public function villageshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['year_List'] = $this->M_cloud->year_group('expense_table', 'year_name asc');
		$data['zone_List'] = $this->M_cloud->findAll('zone_table', 'id desc');
		$village 	= $this->input->post('village');
		
		$data['all_customer_List'] = $this->M_cloud->minimamaqty('customer_table', array('village'=> $village), 'custo_id desc');
		$this->load->view('superadmin/All_due_wise_coustomer_show', $data);
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
		
		$data['customer_id'] 			= $this->input->post('customer_id');
		$data['payment_date'] 			= $this->input->post('payment_date');
		$data['amount	'] 				= $this->input->post('total_bill');
		
		$this->db->insert('payment_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		//redirect('software/Customer_info/remarks/' .$customer_id);
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
