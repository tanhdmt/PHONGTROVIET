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

	public function list_quan()
	{
		$matinh = $this->input->post('id');
 		$tinh = $this->restaurant_m->getQuan($matinh);
 		$tinh_select = '';
 		$tinh_select .= '<option value="">Chọn Quận/Huyện</option>';
 		foreach ($tinh as $t) {
 			$tinh_select .= '<option value="'.$t->districtid.'">'.$t->type.' '.$t->name.'</option>';
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
		if(!empty($_FILES['userFiles']['name'])){
            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'img/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $pathArr[$i]=$uploadPath.$fileData['file_name'];
                } else{
                	echo $this->upload->display_errors();
                }
            }
            $imageArr = $this->restaurant_m->getImage(UID);
			if(!empty($imageArr[0]->HinhAnh)){
				$images = explode(",", $imageArr[0]->HinhAnh);
				foreach ($images as $ima) {
					unlink($ima);
				}
			}
            $path = implode(",", $pathArr);
            //Insert file information into the database
            $insert = $this->restaurant_m->uploadImage($path, UID);
        }
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
		$imageArr = $this->restaurant_m->getImage(UID);
		if(!empty($imageArr[0]->HinhAnh)){
			$images = explode(",", $imageArr[0]->HinhAnh);
			//echo $imageArr[0];
		}
		//$cp = $this->sport_facility_m ->get_phi();
		$tinh = $this->restaurant_m->getTinh();
		$nhatro = $this->restaurant_m->getNhatro(UID);
		$viewdata = array('tinh' =>$tinh, 'nhatro' =>$nhatro[0], 'images' => $images);

		$data = array('title' => 'Thông tin nhà trọ - PHÒNG TRỌ VIỆT', 'page' => 'caidat');
		$this->load->view('header', $data);
		$this->load->view('caidat/info',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
