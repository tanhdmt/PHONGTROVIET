<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_type extends CI_Controller {

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
		
		$viewdata = array();

		if($this->input->post("type") && $this->input->post("price") /*&& $this->input->post("quantity")*/)
		{

			$type = $this->input->post("type");
			$price = $this->input->post("price");
			//if(count($this->room_m->getRoomTypeName($type))==0) {
				$this->room_m->addRoomType($type, $price, UID);
				redirect("/room-type");
			//}
			// else {
			// 	$viewdata['error'] = "Loại phòng đã tồn tại";
			// }
		}

		$data = array('title' => 'Thêm loại phòng - PHÒNG TRỌ VIỆT', 'page' => 'room-type');
		$this->load->view('header', $data);
		$this->load->view('room-type/add', $viewdata);
		$this->load->view('footer');
	}

	function delete($room_type)
	{
		//echo "ma: " . $room-type;
		$this->room_m->deleteRoomType($room_type);
		$this->room_m->reseed();
		redirect("/room-type");
	}

	public function edit($ma_phong)
	{
		if($this->input->post("type") && $this->input->post("price") /*&& $this->input->post("quantity")*/)
		{

			$type = $this->input->post("type");
			$price = $this->input->post("price");

			$this->room_m->editRoomType($type, $price);
			redirect("/room-type");
		}
		
		$data = array('title' => 'Sửa loại phòng - PHÒNG TRỌ VIỆT', 'page' => 'room-type');
		$this->load->view('header', $data);
		$room_type = $this->room_m->getRoomType($ma_phong);
		$viewdata = array('room_type'  => $room_type[0]);
		$this->load->view('room-type/edit',$viewdata);

		$this->load->view('footer');
	}

	public function index()
	{
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