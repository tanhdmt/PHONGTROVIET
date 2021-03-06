<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function check_login()
	{
		if(!UID)
			redirect("login");
	} 

	public function show_info()
	{
		$info = $this->user_m->get_user(UID);
		echo(json_encode($info[0]));
	}

	public function check_username()
	{
		$username = $this->input->post('username');
		$olduser = $this->input->post('deuser');
		$info = $this->user_m->check_user1($username, $olduser);
		if($info)
			$check = 1;
		else
			$check = 0;
		echo(json_encode($check));
	}

	public function check_oldpass()
	{
		$oldpass = $this->input->post('oldpass');
		$username = $this->input->post('name');
		$info = $this->user_m->check_oldpass($username, $oldpass);
		if($info)
			$check = 1;
		else
			$check = 0;
		echo(json_encode($check));
	}

	public function update_info()
	{
		$tennt = $this->input->post('tennt');
		$username = $this->input->post('username');
		$password = $this->input->post('newpass');
		if(!empty($pass)){
			$this->user_m->update_user(UID, $username, $password, $tennt);
		} else
			$this->user_m->update_user2(UID, $username, $tennt);
	}

	public function ds_datphong()
	{
		$danhsach = $this->user_m->get_datphong(UID);
		echo(json_encode($danhsach));
	}

	function delete($madp)
	{
		$this->user_m->deleteDp($madp);
		
	}

	public function get_soluongdp()
	{
		$soluong = $this->user_m->get_soluongdp(UID);
		echo(json_encode($soluong[0]));
	}
	public function index()
	{
		$this->check_login();
		// $today_stats = $this->report_m->today_stats();
		// $customer_pay_list = $this->report_m->get_customer_freq_list();
		// $customer_most_paid = $this->report_m->get_customer_most_paid();
		// $next_week_freq = $this->report_m->get_next_week_freq();
		
		// $data = array('title' => 'PHÒNG TRỌ VIỆT', 'page' => 'room');
		// $this->load->view('header', $data);

		// $viewdata = array(
		// 	'today_stats' => $today_stats,
		// 	'customer_pay_list' => $customer_pay_list,
		// 	'customer_most_paid' => $customer_most_paid,
		// 	'next_week_freq' => $next_week_freq
		// );
		// $this->load->view('welcome_message', $viewdata);
		// $this->load->view('footer', array("next_week_freq"=>$next_week_freq));

		//$rooms = $this->room_m->get_rooms(UID);

		$room_types = $this->room_m->get_room_types(UID);

		$viewdata = array('room_types' => $room_types);

		$data = array('title' => 'Danh sách loại phòng - PHÒNG TRỌ VIỆT', 'page' => 'room-type');
		$this->load->view('header', $data);
		$this->load->view('room-type/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */