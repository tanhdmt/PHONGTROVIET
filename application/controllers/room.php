<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room extends CI_Controller {

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

	public function add()
	{
		$this->room_m->reseedRoom();
		//$viewdata = array();
		if($this->input->post("loaiphong"))
		{
			$new_ngaythue = null;
			$new_tinhtrang = "Trống";
			$new_dudinhtra = null;
			$new_loaiphong = $this->input->post("loaiphong");
			$new_nhatro = UID;
			$new_ghichu = null;

			$this->room_m->addRoomRange($new_ngaythue, $new_tinhtrang, $new_loaiphong, $new_dudinhtra, $new_nhatro, $new_ghichu);
			redirect("/room/".$mant);	
		}	
		
		$data = array('title' => 'Thêm phòng - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		$room_types = $this->room_m->get_room_types(UID);
		$viewdata = array('loaiphong' => $room_types);
		$this->load->view('room/add',$viewdata);

		$this->load->view('footer');
	}

	function delete($maphong)
	{
		$this->room_m->deleteRoomRange($maphong);
		$this->room_m->reseedRoom();
		redirect("/room");
	}

	public function edit($maphong)
	{
		//$maphong = 14;
		if($this->input->post("nguoithue"))
		{
			$new_nguoithue = $this->input->post("nguoithue");
			if(!empty($this->input->post("ngaythue")))
				$new_ngaythue = $this->input->post("ngaythue");
			if(!empty($this->input->post("ngaytra")))
				$new_ngaytra = $this->input->post("ngaytra");
			$new_ghichu = $this->input->post("ghichu");
			$new_chucvu = "DD";
			$old_chucvu = "TV";

			$daidien = $this->room_m->getDaidien($maphong);

			$this->room_m->editRoom($maphong, $new_ngaythue, $new_ngaytra, $new_ghichu);
			$this->room_m->editDaidien($maphong, $daidien[0]->TenTV, $old_chucvu);
			$this->room_m->editDaidien($maphong, $new_nguoithue, $new_chucvu);
			
			redirect("/room");	
		}
		
		$data = array('title' => 'Cập nhật phòng - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		$thanhvien = $this->room_m->getThanhvien($maphong);
		$department = $this->room_m->getRoomDD($maphong);
		
		$viewdata = array('department'  => $department[0], 'thanhvien' =>$thanhvien);

		$this->load->view('room/edit',$viewdata);

		$this->load->view('footer');
	}

	public function edit1($maphong)
	{
		//$maphong = 14;
		if($this->input->post("nguoithue"))
		{
			$new_nguoithue = $this->input->post("nguoithue");
			if(!empty($this->input->post("ngaythue")))
				$new_ngaythue = $this->input->post("ngaythue");
			if(!empty($this->input->post("ngaytra")))
				$new_ngaytra = $this->input->post("ngaytra");
			$new_ghichu = $this->input->post("ghichu");
			$new_chucvu = "DD";
			$old_chucvu = "TV";

			$daidien = $this->room_m->getDaidien($maphong);

			$this->room_m->editRoom($maphong, $new_ngaythue, $new_ngaytra, $new_ghichu);
			$this->room_m->editDaidien($maphong, $daidien[0]->TenTV, $old_chucvu);
			$this->room_m->editDaidien($maphong, $new_nguoithue, $new_chucvu);
			
			redirect("/thanhvien/info/".$maphong);	
		}
		
		$data = array('title' => 'Cập nhật phòng - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);

		$thanhvien = $this->room_m->getThanhvien($maphong);
		$department = $this->room_m->getRoomDD($maphong);
		
		$viewdata = array('department'  => $department[0], 'thanhvien' =>$thanhvien);

		$this->load->view('room/edit1',$viewdata);

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


	public function index($mant)
	{
		$this->check_login();
		
		$rooms = $this->room_m->get_rooms(UID);

		$viewdata = array('rooms' => $rooms);

		$data = array('title' => 'Phòng - PHÒNG TRỌ VIỆT', 'page' => 'room');
		$this->load->view('header', $data);
		$this->load->view('room/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */