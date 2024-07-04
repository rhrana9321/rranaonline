<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	static $model 	 = array();
	static $helper   = array('form');
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->library('upload');
	}
	
	public function index($type = 0)
	{	
		$output = array();

		 if($type == 'merchantimage') {
		$config = array('upload_path' => './all_image/');
		$fileLocation = "all_image/";
		}else  {
			$config = array('upload_path' => './uploads/', 'max_size' => '200');
			$fileLocation = "uploads/";
		}

		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] 	 = time();

		$this->upload->initialize($config);

		if($this->upload->do_upload('attachment')) {
			$uploadData = $this->upload->data();
			$output['status'] = 'success';
			$output['fileLocation'] = $fileLocation.$uploadData['file_name'];
			$output['fileName'] 	= $uploadData['file_name'];
		} else {
			$output['status'] = 'failed';
			$output['message'] = $this->upload->display_errors('', '');
		}

		echo json_encode($output);
	}


	public function remove($type = 0)
	{	
		$fileName = $this->input->post('attachment');
		
		if($type == 'merchantimage') {
			$fileLink = 'all_image/'.$fileName;
		}
		else if($type == 'comlogo') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
		
		else if($type == 'slideimage') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
		else if($type == 'min_image') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
		else if($type == 'tximage') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
			else if($type == 'image') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
		else if($type == 'conimage') {
			$fileLink = 'uploads/company_logo/'.$fileName;
		}
		
		
		unlink($fileLink);
	}
	
	
	


}