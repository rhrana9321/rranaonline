<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('adminadmin')) 
{
	function adminadmin()
	{
		$_CI = &get_instance();
		
		 $email		 	 = $_CI->input->post('username');
		$UserPass		 = $_CI->input->post('password');
	
		$UserDetails	 = $_CI->M_superadmin->findid('admin_manage', array('user_name' => $email, 'status' => 'Active'));
		
		if(!empty($UserDetails) && $UserDetails->password == $UserPass){
			
			$userid 	  = $UserDetails->id;
			$emailaddress = $UserDetails->user_name;
			
			//$role = $UserDetails->role;
			setUserData($userid, $emailaddress);
			redirect('admin/Dashboard');
			//echo 1;
			
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Username or password is wrong!'));
			redirect('AdminLogin');
	
			
		}
		
		
		
	}
}

// TO SET DATA IN UserName SESSION FIELD
if ( ! function_exists('setUserData'))
{
	function setUserData($auid, $usertype)
	{
		$_CI = &get_instance();
		$userData	= array(
			'adminid' => $auid, 'username' => $usertype
		);
		$_CI->session->set_userdata($userData);
	}
}



if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('adminid');
	}
}


if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL,NULL);
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
			redirect('AdminLogin');	
		} else {
			return true;	
		}
	}
}





if ( ! function_exists('logoutadmin'))
{

		

	function logoutadmin()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('AdminLogin');
		}
	}
	
	

}


// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */