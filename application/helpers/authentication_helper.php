<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('superadmin')) 
{
	function superadmin()
	{
		$_CI = &get_instance();
		
		$email		 	 = $_CI->input->post('username');
		$UserPass		 = $_CI->input->post('password');
		$usertype		 = $_CI->input->post('type');
		$pass_md5		 = md5($UserPass);
		
		if($usertype == 'Superadmin')
		{
			$UserDetails	 = $_CI->M_superadmin->findid('superadmin', array('UserId' => $email, 'password' => $pass_md5));
			if(!empty($UserDetails) && $UserDetails->password == $pass_md5){
				$superid 	  = $UserDetails->id;
				$emailaddress = $UserDetails->type;
				setUserData($superid, $emailaddress);
				redirect('software/Dashboard');
			} else {
				$_CI->session->set_userdata(array('invalidUser' => 'Username or Password is Wrong!'));
				redirect('Home');
			}
		

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
			'userid' => $auid, 'email' => $usertype
		);
		$_CI->session->set_userdata($userData);
	}
}



if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('userid');
	}
}


if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL,NULL, NULL);
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





if ( ! function_exists('logoutUser'))
{

		

	function logoutUser()
	{
		invalidUserData();
		if(!isActiveUser()){
			redirect('Home');
		}
	}
	
	

}


// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */