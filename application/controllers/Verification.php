<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

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
		$this->load->library('upload');
		$this->load->library('cart');
		//isAuthenticate();
	
	 }
	
	public function index($card_no)
	{
		$data['usermgs'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ''));
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		$data['card_no'] = $card_no;
		
		
		$this->load->view('Verificationpage', $data);
	}
	
	public function forgot_password()
	{
		$data['usermgs'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ''));
		
		$data['superdetails'] = $this->M_cloud->findbyidstock('superadmin', array('id'=> '1'));
		
		$this->load->view('forgotten_passwordPage', $data);
	}
	
	
	
	public function checkemail()
	{
		$com_email = $this->input->post('email');
		
		$result = $this->M_cloud->findemail('superadmin', array('com_email' => $com_email));
		if($result){
			echo true;
		} else {
			echo false;
		}
	}
	
	public function forgottenPasswordAction()
	{
		$email   = $this->input->post('email');
		$result   = $this->M_cloud->tbWhRow('superadmin', array('com_email' => $email));
		$name_com = $result->companyname;
		
		if($result){
			$password  = time()+1;
			$data['password']  = md5($password);
			$this->db->update('superadmin', $data, array('com_email' => $email));
			
				$senderEmail 	 = $email;
				$senderName 	 = $name_com;
				$subject 		 = $name_com;;
				
				
				
				$messagjje   	 = $password;
				
				$message  = "".$name_com."\r\n";
				$message  .= "".$web."\r\n";
				$message .= "Your new password is : ".$messagjje;
				
				$this->email->from($senderEmail);
				$this->email->to($email);   
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
				
				
			redirect('Home');
		
		} else {
		
		$this->session->set_userdata(array('fgtpassalt' => 'Your email address is Wrong!'));
		redirect('Home/forgot_password');
		}
	}
	
	
}
?>