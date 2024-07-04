<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_Manage extends CI_Controller {

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
		$data['zone_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Item_ManagePage', $data);
	}
	
	public function store()
	{
		$data['name'] 			= $this->input->post('name');
		$data['Brand'] 			= $this->input->post('Brand');
		$data['type'] 			= $this->input->post('type');
		$this->db->insert('item_manage_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Item_Manage');
	}
	
	public function edit($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_zone_info'] = $this->M_cloud->findbyidstock('item_manage_table', array('id' => $id));
		$this->load->view('superadmin/Item_Info_editPage', $data);
	}
	
	
	
	
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['name'] 	   	= $this->input->post('name');
		$data['Brand'] 			= $this->input->post('Brand');
		$data['type'] 			= $this->input->post('type');
		$this->db->update('item_manage_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('software/Item_Manage');
		
	}
	
	public function Item_Add()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_add_table', 'id desc');
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Item_AddPage', $data);
	}
	
	
	public function Item_Manage_update($id)
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['item_add_table_List'] = $this->M_cloud->findbyidstock('item_add_table', array('id'=> $id));
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Item_Manage_updatePage', $data);
	}
	
	
	public function Item_out_edit($id)
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['item_add_table_List'] = $this->M_cloud->findbyidstock('item_out_table', array('id'=> $id));
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Item_out_editPage', $data);
	}
	
	
	
	public function item_add_print()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		
		$dateform 			= $this->input->post('dateform');
		$dateto 			= $this->input->post('dateto');
		$from_newDate 			= date("Y-m-d", strtotime($dateform));
    	$to_newDate 			= date("Y-m-d", strtotime($dateto));
		if((empty($dateform)) && (empty($dateto))){
		$data['zone_List'] = $this->M_cloud->findAll('item_add_table', 'id desc');
		} else {
		$data['zone_List'] = $this->M_cloud->minimamaqty('item_add_table', array('cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		}
		$this->load->view('superadmin/item_add_printPage', $data);
	}
	
	
	public function item_out_print()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		
		$dateform 			= $this->input->post('dateform');
		$dateto 			= $this->input->post('dateto');
		$from_newDate 			= date("Y-m-d", strtotime($dateform));
    	$to_newDate 			= date("Y-m-d", strtotime($dateto));
		if((empty($dateform)) && (empty($dateto))){
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		} else {
		$data['zone_List'] = $this->M_cloud->minimamaqty('item_out_table', array('cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		}
		$this->load->view('superadmin/item_out_printPage', $data);
	}
	
	
	
	
	public function add_store()
	{
		$data['name'] 			= $this->input->post('name');
		$data['store'] 			= $this->input->post('store');
		$data['price'] 			= $this->input->post('price');
		$data['type'] 			= $this->input->post('type');
		$data['note'] 			= $this->input->post('note');
		$data['cdate'] 			= date("Y-m-d");
		
		$item_info = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $data['name']));
		$data2['store'] 			= $item_info->store+$data['store'];
		$data2['price'] 			= $data['price'];
		$data2['in_qty'] 			= $item_info->in_qty+$data['store'];
		$this->db->update('item_manage_table', $data2, array('id' => $item_info->id));
		
		$this->db->insert('item_add_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Item_Manage/Item_Add');
	}
	
	public function Item_out()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('superadmin/Item_outPage', $data);
	}
	
	
	
	
	public function out_store()
	{
		$data['name'] 			= $this->input->post('name');
		$data['store'] 			= $this->input->post('store');
		$data['price'] 			= $this->input->post('price');
		$data['type'] 			= $this->input->post('type');
		$data['note'] 			= $this->input->post('note');
		$data['cdate'] 			= date("Y-m-d");
		
		$item_info = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $data['name']));
		$data2['store'] 			= $item_info->store-$data['store'];
		$data2['out_qty'] 			= $item_info->out_qty+$data['store'];
		$this->db->update('item_manage_table', $data2, array('id' => $item_info->id));
		
		$this->db->insert('item_out_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Item_Manage/Item_out');
	}
	
	public function Item_Manage_up_action()
	{
		$id 			= $this->input->post('id');
		$data2['note'] 			= $this->input->post('note');
		$this->db->update('item_add_table', $data2, array('id' => $id));
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Item_Manage/Item_Add');
	}
	
	
	public function Item_out_up_action()
	{
		$id 			= $this->input->post('id');
		$data2['note'] 			= $this->input->post('note');
		$this->db->update('item_out_table', $data2, array('id' => $id));
		
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('software/Item_Manage/Item_out');
	}
	
	
	public function Store_Report()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		
		$data['add_List'] = $this->M_cloud->findAll('item_add_table', 'id desc');
		$data['out_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		$this->load->view('superadmin/Store_ReportPage', $data);
	}
	
	
	public function Store_report_wise_print()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		
		$data['add_List'] = $this->M_cloud->findAll('item_add_table', 'id desc');
		$data['out_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		$this->load->view('superadmin/Store_report_wise_printPage', $data);
	}
	
	
	
	public function storeInshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		$id 			= $this->input->post('id');
		$dateform 			= $this->input->post('dateform');
		$dateto 			= $this->input->post('dateto');
		$from_newDate 			= date("Y-m-d", strtotime($dateform));
    	$to_newDate 			= date("Y-m-d", strtotime($dateto));
		$data['item_List'] = $this->M_cloud->minimamaqty('item_add_table', array('name'=> $id,'cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		$this->load->view('superadmin/storeInshowreportPage', $data);
	}
	
	public function storeAddshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		$id 			= $this->input->post('id');
		$dateform 			= $this->input->post('dateform');
		$dateto 			= $this->input->post('dateto');
		$from_newDate 			= date("Y-m-d", strtotime($dateform));
    	$to_newDate 			= date("Y-m-d", strtotime($dateto));
		$data['zone_List'] = $this->M_cloud->minimamaqty('item_add_table', array('cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		$this->load->view('superadmin/storeAddshowreportPage', $data);
	}
	
	
	
	
	public function storeOutshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		$id 			= $this->input->post('id');
		$dateform 			= $this->input->post('dateform');
		$dateto 			= $this->input->post('dateto');
		$from_newDate 			= date("Y-m-d", strtotime($dateform));
    	$to_newDate 			= date("Y-m-d", strtotime($dateto));
		$data['item_List'] = $this->M_cloud->minimamaqty('item_out_table', array('name'=> $id, 'cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		$this->load->view('superadmin/storeOutshowreportPage', $data);
	}
	
	
	public function storeOutOutshowreport()
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		$id 			= $this->input->post('id');
		$dateform 			= $this->input->post('dateform');
		$dateto 			= $this->input->post('dateto');
		$from_newDate 			= date("Y-m-d", strtotime($dateform));
    	$to_newDate 			= date("Y-m-d", strtotime($dateto));
		$data['zone_List'] = $this->M_cloud->minimamaqty('item_out_table', array('cdate >=' => $from_newDate, 'cdate <=' => $to_newDate), 'id asc');
		$this->load->view('superadmin/storeOutOutshowreportPage', $data);
	}
	
	
	
	public function Store_Report_In_his($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->minimamaqty('item_add_table', array('name'=> $id), 'id asc');
		$data['itemnameList'] = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $id));
		$this->load->view('superadmin/Store_Report_In_hisPage', $data);
	}
	
	public function Store_Report_Out_his($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->minimamaqty('item_out_table', array('name'=> $id), 'id asc');
		$data['itemnameList'] = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $id));
		$this->load->view('superadmin/Store_Report_Out_hisPage', $data);
	}
	
	
	
	public function item_nameList()
	{
		$type = $this->input->post('type');
		$subCategoryfdfdList = $this->M_cloud->minimamaqty('item_manage_table', array('type' => $type), 'id asc');
		echo
		"<select class='form-control' name='name' id='name' tabindex='2' required>
		  <option> --- Select Item Name ---</option>";
		
		foreach($subCategoryfdfdList as $v)
		{
		    echo '<option value="' . $v->id . '">' . $v->name .  '('.$v->store.')'.'</option>';
        }
		
		echo
		"</select>";
	}
	
	
	
}
