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
		if($user_type != 'User'){
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
		$this->load->view('user/Item_ManagePage', $data);
	}
	
	public function store()
	{
		$data['name'] 			= $this->input->post('name');
		$data['type'] 			= $this->input->post('type');
		$this->db->insert('item_manage_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Item_Manage');
	}
	
	public function edit($id)
	{
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['find_zone_info'] = $this->M_cloud->findbyidstock('item_manage_table', array('id' => $id));
		$this->load->view('user/Item_Info_editPage', $data);
	}
	
	public function updated()
	{
		$id 	=  $this->input->post('id');
		$data['name'] 	   	= $this->input->post('name');
		$data['type'] 			= $this->input->post('type');
		$this->db->update('item_manage_table', $data, array('id' => $id));
		$this->session->set_flashdata('true', 'Data has been update successfull.');
		redirect('user/Item_Manage');
		
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
		$this->load->view('user/Item_AddPage', $data);
	}
	
	
	public function add_store()
	{
		$data['name'] 			= $this->input->post('name');
		$data['store'] 			= $this->input->post('store');
		$data['price'] 			= $this->input->post('price');
		$data['type'] 			= $this->input->post('type');
		$data['cdate'] 			= date("Y-m-d");
		
		$item_info = $this->M_cloud->findbyidstock('item_manage_table', array('id'=> $data['name']));
		$data2['store'] 			= $item_info->store+$data['store'];
		$data2['price'] 			= $data['price'];
		$this->db->update('item_manage_table', $data2, array('id' => $item_info->id));
		
		$this->db->insert('item_add_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Item_Manage/Item_Add');
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
		$this->load->view('user/Item_outPage', $data);
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
		$this->db->update('item_manage_table', $data2, array('id' => $item_info->id));
		
		$this->db->insert('item_out_table', $data);
		$this->session->set_flashdata('true', 'Data has been inserted successfull.');
		redirect('user/Item_Manage/Item_out');
	}
	
	
	
	
	public function Store_Report()
	{
		$data['title'] = "Customer Manage";
		$this->session->userdata('id');
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['item_List'] = $this->M_cloud->findAll('item_manage_table', 'id desc');
		$data['zone_List'] = $this->M_cloud->findAll('item_out_table', 'id desc');
		
		$data['success'] = $this->session->userdata('success');
		$this->session->set_userdata(array('success' => ''));
		$this->load->view('user/Store_ReportPage', $data);
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
			echo '<option value="' . $v->id . '">' . $v->name . '</option>';
        }
		
		echo
		"</select>";
	}
	
	
	
}
