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

	// public function index()
	// {
	// 	$departments = $this->departments_m->get_departments();

	// 	$viewdata = array('departments' => $departments);

	// 	$data = array('title' => 'Departments - DB Hotel Management System', 'page' => 'departments');
	// 	$this->load->view('header', $data);
	// 	$this->load->view('departments/list',$viewdata);
	// 	$this->load->view('footer');
	// }
	public function index()
	{
		//$cp = $this->sport_facility_m ->get_phi();

		$viewdata = array();

		$data = array('title' => 'Thông tin nhà trọ - PHÒNG TRỌ VIỆT', 'page' => 'caidat');
		$this->load->view('header', $data);
		$this->load->view('caidat/info',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */