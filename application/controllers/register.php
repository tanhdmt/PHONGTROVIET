<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {


	public function index()
	{
		if($this->input->post("username") && $this->input->post("password") && $this->input->post("tennt") )
		{
			if ($this->input->post("password") != $this->input->post("cf-password")){
				$error_message = "Password không khớp<br>"; 
				$viewdata = array('error_message' => $error_message);
			} else {
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$tennt = $this->input->post("tennt");
				$diachi = null;
				$sdt = null;
				$soluongphong = null;
				
				$this->user_m->add_user($username, $password, $tennt, $diachi, $sdt, $soluongphong);
				$error_message = "";
				$success_message = "Bạn đã đăng ký thành công!";
				$viewdata = array('success_message' => $success_message);
			}

		}
		$data = array('title' => 'Đăng ký - PHÒNG TRỌ VIỆT', 'page' => 'register');
		$this->load->view('header', $data);;
		$this->load->view('register',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */