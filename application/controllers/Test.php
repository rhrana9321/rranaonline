<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	static $helper   = array('url','user_helper');
	public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_superadmin', 'M_join'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		$this->load->library('cart');
		//isAuthenticate();
	
	 }
	
	
	public function stockempty()
	{
		$data['current_stock'] = 0;
		$this->db->update('product_manage', $data);
	}
	
	
}
?>