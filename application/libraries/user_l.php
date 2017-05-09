<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_l{

	public function __construct() {
		
	}
	public function login($user)
	{
		// var_dump($user);
		$data = array(
			'uid' => $user[0]->MaNT,
			'username' => $user[0]->Username,
			'fullname' => $user[0]->TenNT,
			
		);
		$CI = &get_instance();
		$CI->session->set_userdata($data);
		// $_SESSION["uid"] = $user[0]->employee_id

		// if($_SESSION["uid"]) giris yapmistir

		// $this->session->userdata("uid")  
	}
	public function logout()
	{
		$CI = &get_instance();
		$CI->session->sess_destroy();
	}
}
