<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caidat extends CI_Controller {

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
		
		if($this->input->post("tenphi") && $this->input->post("dongia"))
		{
			$new_tenphi = $this->input->post("tenphi");
			$new_dongia = $this->input->post("dongia");
			
			$this->sport_facility_m->addPhi($new_tenphi, $new_dongia);
			redirect("/phi");
		}

		$data = array('title' => 'Thêm phí mới - PHÒNG TRỌ VIỆT', 'page' => 'phi');
		$this->load->view('header', $data);
		
		$viewdata = array();
		$this->load->view('phi/add',$viewdata);
		$this->load->view('footer');
	}

	function delete($maphi)
	{
		$this->sport_facility_m->deletePhi($maphi);
		redirect("/phi");
	}

	public function edit($maphi)
	{
		if($this->input->post("dongia"))
		{
			$new_dongia = $this->input->post("dongia");
			
			$this->sport_facility_m->editPhi($maphi, $new_dongia);
			redirect("/phi");
		}
		
		$data = array('title' => 'Cập nhật phí - PHÒNG TRỌ VIỆT', 'page' => 'phi');
		$this->load->view('header', $data);

		$cp = $this->sport_facility_m->getPhi($maphi);

		$viewdata = array('cp'  => $cp[0]);

		$this->load->view('phi/edit',$viewdata);

		$this->load->view('footer');
	}

	public function upload()
	{
		$viewdata = array();
		
		$images_arr = array();
		foreach($_FILES['images']['name'] as $key=>$val){
			$image_name = $_FILES['images']['name'][$key];
			$tmp_name 	= $_FILES['images']['tmp_name'][$key];
			$size 		= $_FILES['images']['size'][$key];
			$type 		= $_FILES['images']['type'][$key];
			$error 		= $_FILES['images']['error'][$key];
			
			############ Remove comments if you want to upload and stored images into the "uploads/" folder #############
			
			// $target_dir = "img/";
			// $target_file = $target_dir.$_FILES['images']['name'][$key];
			// if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_file)){
			// 	$images_arr[] = $target_file;
			// }
			
			//display images without stored
			$extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
	    	$images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
		}
		$viewdata = array('image_arr' => $image_arr);
		$this->load->view('caidat/info',$viewdata);
		//Generate images view
		// if(!empty($images_arr)){ 
		// 	$count=0;
		// 	foreach($images_arr as $image_src){ 
		// 		echo 'ok';
		// 	}
		// }
		
	}

	public function list_quan()
	{
		$matinh = $this->input->post('id');

		$tinh = $this->restaurant_m->getQuan($matinh);
		$tinh_select = '';
		$tinh_select .= '<option value="">Chọn Quận/Huyện</option>';
		foreach ($tinh as $t) {
			$tinh_select .= '<option value="'.$t->districid.'">'.$t->type.' '.$t->name.'</option>';
			//echo $tinh_select;
		}
		
		echo(json_encode($tinh_select));
	}
	// public function index()
	// {
	// 	$departments = $this->departments_m->get_departments();

	// 	$viewdata = array('departments' => $departments);

	// 	$data = array('title' => 'Departments - DB Hotel Management System', 'page' => 'departments');
	// 	$this->load->view('header', $data);
	// 	$this->load->view('departments/list',$viewdata);
	// 	$this->load->view('footer');
	// }
	public function update_toado()
	{
		$vido = $this->input->post('vd');
		$kinhdo = $this->input->post('kd');
		$this->restaurant_m->updateToaDo(UID, $vido, $kinhdo);

	}
	public function index()
	{
		
		if($this->input->post("diachi"))
		{
			$new_diachi = $this->input->post("diachi");
			$new_sdt = $this->input->post("sdt");
			$new_dientich = $this->input->post("dientich");
			$new_soluong = $this->input->post("soluong");
			$new_tinh = $this->input->post("tinhthanh");
			$new_quan = $this->input->post("quanhuyen");
			
			$new_mota = $this->input->post('mota');

			$this->restaurant_m->updateNhatro(UID, $new_diachi, $new_sdt, $new_dientich, $new_soluong, $new_tinh, $new_quan, $new_mota);
			redirect("/room");	
		}
		//$cp = $this->sport_facility_m ->get_phi();
		$tinh = $this->restaurant_m->getTinh();
		$nhatro = $this->restaurant_m->getNhatro(UID);
		$viewdata = array('tinh' =>$tinh, 'nhatro' =>$nhatro[0]);

		$data = array('title' => 'Thông tin nhà trọ - PHÒNG TRỌ VIỆT', 'page' => 'caidat');
		$this->load->view('header', $data);
		$this->load->view('caidat/info',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
