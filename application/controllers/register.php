<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		if(!UID)
		{
			if($this->input->post("username") && $this->input->post("password") && $this->input->post("tennt") )
			{
				if ($this->input->post("password") != $this->input->post("cf-password")){
					$error_message = "Password không khớp<br>"; 
					$viewdata = array('error_message' => $error_message);
				} else if($this->user_m->check_user($this->input->post("username"))){
					$error_message = "Username đã tồn tại<br>"; 
					$viewdata = array('error_message' => $error_message);
				}
				else {
					$username = $this->input->post("username");
					$password = $this->input->post("password");
					$tennt = $this->input->post("tennt");
					$diachi = null;
					$sdt = null;
					$soluongphong = null;
					$vido = "-34.397";
					$kinhdo = "150.644";
					

					$count = $this->user_m->add_user($username, $password, $tennt, $diachi, $sdt, $soluongphong, $vido, $kinhdo);
					//echo $count;
					if($count == 1)
					{
						$error_message = "";
						$success_message = "Bạn đã đăng ký thành công!";
						$viewdata = array('success_message' => $success_message);
					}
					else
					{
						$error_message = "Đăng ký không thành công";
						$viewdata = array('error_message' => $error_message);
					}
					
				}

			}
			$data = array('title' => 'Đăng ký - PHÒNG TRỌ VIỆT', 'page' => 'register');
			$this->load->view('header', $data);;
			$this->load->view('register',$viewdata);
			$this->load->view('footer');
		}
		else
			redirect("welcome");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */