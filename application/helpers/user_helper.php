<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('userlogin')) 
{
	function userlogin()
	{
		$_CI = &get_instance();
		
		$userid				= $_CI->input->post('email');
		$UserPass 			= $_CI->input->post('password');
		$pass_md5		 = md5($UserPass);
		

		$UseremailDetails	 = $_CI->M_superadmin->userloginmodel('superadmin', array('com_email' => $userid));	
		
		if(!empty($UseremailDetails) && $UseremailDetails->password == $pass_md5){
			setUserData($UseremailDetails->id);
			
			redirect('software/Dashboard');
			
			
		}else {
			$_CI->session->set_flashdata(array('true' => 'Email and password do not match.'));
			redirect('Home');
		}
	}
}

// TO SET DATA IN UserName SESSION FIELD
if ( ! function_exists('setUserData'))
{
	function setUserData($auid)
	{
		$_CI = &get_instance();
		$userData	= array('id' => $auid);
		$_CI->session->set_userdata($userData);
		
	}
}



if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('id');
	}
}


if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL);
	}
}


if ( ! function_exists('isActiveUser'))
{
	function isActiveUser()
	{
		return getUserName() != NULL;
	}
}



if ( ! function_exists('isAuthenticate'))
{
	function isAuthenticate()
	{
		if(!isActiveUser()) {
			redirect('Home');	
		} else {
			return true;	
		}
	}
}





if ( ! function_exists('userlogout'))
{
	function userlogout()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('Home');
		}
	}
	
	

}