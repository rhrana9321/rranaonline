<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monthly_run extends CI_Controller {

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

	
	public function previous_taka()
	{
		$all_customer_List = $this->M_cloud->minimamaqty('customer_table', array('status'=> '1'), 'custo_id  desc');
		
		foreach ($all_customer_List as $v) {
			$data['running_bill'] 	   			= $v->taka;
			$data['previus_months_due'] 	   	= $v->previus_months_due + $v->running_bill;
			$this->db->update('customer_table', $data, array('custo_id' => $v->custo_id));
		}
		
	}
	
}
