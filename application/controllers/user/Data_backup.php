<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_backup extends CI_Controller {

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
		$this->load->helper('download');
		$this->load->dbutil();
		$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	
	 }

	
	
	
	public function submit_data()
	{
		$prefs = array(     
			'format'      => 'zip',             
			'filename'    => 'dabase_backup.sql'
			);


		$backup =& $this->dbutil->backup($prefs); 
		
		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'DB/'.$db_name;
		
		$this->load->helper('file');
		write_file($save, $backup); 
		
		
		$this->load->helper('download');
		force_download($db_name, $backup);
		
		
	}
	
	
	
}
