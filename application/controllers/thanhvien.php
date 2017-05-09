<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thanhvien extends CI_Controller {

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

	public function add($maphong)
	{
		$this->departments_m->reseed();
		//$viewdata = array();
		if($this->input->post("tentv") && $this->input->post("gioitinh"))
		{
			$new_tentv = $this->input->post("tentv");
			if(!empty($this->input->post("sdt")))
				$new_sdt = $this->input->post("sdt");
			else
				$new_sdt = null;
			if(!empty($this->input->post("cmnd")))
				$new_cmnd = $this->input->post("cmnd");
			else
				$new_cmnd = null;
			$new_gioitinh = $this->input->post("gioitinh");
			$new_tinhtrang = "Đang ở";
			$new_maphong = $maphong;
			$new_chucvu = "TV";

			$this->departments_m->addThanhvien($new_tentv, $new_sdt, $new_cmnd, $new_gioitinh, $new_tinhtrang, $new_maphong, $new_chucvu);
			redirect("/thanhvien/info/".$maphong);	
		}	
		
		$data = array('title' => 'Thêm thành viên - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		$mp = $this->departments_m->getThanhvien($maphong);
		$viewdata = array('mp' => $mp[0]);
		$this->load->view('thanhvien/add',$viewdata);

		$this->load->view('footer');
	}

	function delete($matv, $maphong)
	{
		$this->departments_m->deleteThanhvien($matv);
		$this->departments_m->reseed();
		redirect("/thanhvien/info/".$maphong);	
	}

	public function edit($matv, $maphong)
	{
		//echo "Maphong: " .$maphong;
		//$maphong = 14;
		if($this->input->post("tentv") && $this->input->post("gioitinh"))
		{
			$new_tentv = $this->input->post("tentv");
			if(!empty($this->input->post("sdt")))
				$new_sdt = $this->input->post("sdt");
			else
				$new_sdt = null;
			if(!empty($this->input->post("cmnd")))
				$new_cmnd = $this->input->post("cmnd");
			else
				$new_cmnd = null;
			$new_gioitinh = $this->input->post("gioitinh");
			//$new_chucvu = $this->input->post("chucvu");
			
			$this->departments_m->editThanhvien($matv, $new_tentv, $new_sdt, $new_cmnd, $new_gioitinh);
			redirect("/thanhvien/info/".$maphong);	
		}
		
		$data = array('title' => 'Cập nhật thông tin - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		$tv = $this->departments_m->getThanhvien2($matv);
		
		$viewdata = array('tv'  => $tv[0]);

		$this->load->view('thanhvien/edit',$viewdata);

		$this->load->view('footer');
	}

	public function chothue($maphong)
	{
		if($this->input->post("nguoithue") && $this->input->post("ngaythue"))
		{
			$new_nguoithue = $this->input->post("nguoithue");
			$new_sdt = null;
			$new_cmnd = null;
			$new_gioitinh = "Nam";
			$new_tinhtrang = "Đang ở";
			$new_phong = $maphong;
			$new_chucvu = "DD";

			$this->room_m->addThanhvien($new_nguoithue, $new_sdt, $new_cmnd, $new_gioitinh, $new_tinhtrang, $new_phong, $new_chucvu);

			$new_ngaythue = $this->input->post("ngaythue");
			$new_ghichu = $this->input->post("ghichu");
			$new_tinhtrang = "Đã thuê";
			$this->room_m->updatePhong($maphong, $new_ngaythue, $new_tinhtrang, $new_ghichu);
			
			redirect("/room");	
		}	
		$data = array('title' => 'Cho thuê phòng - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		$thue = $this->room_m->getRoomRange($maphong);

		$viewdata = array('thue'  => $thue[0]);

		$this->load->view('room/chothue',$viewdata);

		$this->load->view('footer');
	}

	// public function danhsach()
	// {
	// 	$thanhvien = $this->departments_m->get_thanhvien($maphong);
	// 	$daidien = $this->departments_m->get_daidien($maphong);
	// 	$ghichu = $this->departments_m->getGhichu($maphong);
	// 	$viewdata = array('thanhvien' => $thanhvien, 'daidien' => $daidien[0], 'ghichu' => $ghichu[0]);

	// 	$data = array('title' => 'Thành viên - PHÒNG TRỌ VIỆT', 'page' => 'room');
	// 	$this->load->view('header', $data);
	// 	$this->load->view('thanhvien/info',$viewdata);
	// 	$this->load->view('footer');
	// }

	public function info($maphong)
	{
		$thanhvien = $this->departments_m->get_thanhvien($maphong);
		$daidien = $this->departments_m->get_daidien($maphong);
		$ghichu = $this->departments_m->getGhichu($maphong);
		$viewdata = array('thanhvien' => $thanhvien, 'daidien' => $daidien[0], 'ghichu' => $ghichu[0]);

		$data = array('title' => 'Thành viên - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);
		$this->load->view('thanhvien/info',$viewdata);
		$this->load->view('footer');
	}
	public function index()
	{
		// //$thanhvien = $this->departments_m->get_thanhvien($maphong);

		// $viewdata = array();

		// $data = array('title' => 'Thành viên - PHÒNG TRỌ VIỆT', 'page' => 'thanhvien');
		// $this->load->view('header', $data);
		// $this->load->view('thanhvien/list',$viewdata);
		// $this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */