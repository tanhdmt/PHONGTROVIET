<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function check_username()
	{
		$username = $this->input->post('username');
		$info = $this->user_m->check_user($username);
		if($info)
			$check = 1;
		else
			$check = 0;
		echo(json_encode($check));
	}

	public function index()
	{
		if(!UID)
		{
			if($this->input->post("username") && $this->input->post("password") && $this->input->post("tennt") )
			{
				$username = $this->input->post("username");
				$password = $this->input->post("password");
				$tennt = $this->input->post("tennt");
				$diachi = null;
				$sdt = null;
				$soluongphong = null;
				$vido = "-34.397";
				$kinhdo = "150.644";
				

				$count = $this->user_m->add_user($username, $password, $tennt, $diachi, $sdt, $soluongphong, $vido, $kinhdo);
				redirect("login");
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