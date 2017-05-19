<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phi extends CI_Controller {

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
		$this->check_login();
		if($this->input->post("tenphi") && $this->input->post("dongia"))
		{
			$new_tenphi = $this->input->post("tenphi");
			$new_dongia = $this->input->post("dongia");
			
			$this->sport_facility_m->addPhi($new_tenphi, $new_dongia, UID);
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
		$this->check_login();
		$this->sport_facility_m->deletePhi($maphi);
		redirect("/phi");
	}

	public function edit($maphi)
	{
		$this->check_login();
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
		$this->check_login();
		$checkdien = $this->sport_facility_m ->checkDien(UID);
		$checknuoc = $this->sport_facility_m ->checkNuoc(UID);
		
		if($checkdien[0]->Count == 0)
			$this->sport_facility_m->addPhi("Điện", 0, UID);
		if($checknuoc[0]->Count == 0)
			$this->sport_facility_m->addPhi("Nước", 0, UID);

		$cp = $this->sport_facility_m ->get_phi(UID);
		$viewdata = array('cp' => $cp);

		$data = array('title' => 'Danh sách phí - PHÒNG TRỌ VIỆT', 'page' => 'phi');
		$this->load->view('header', $data);
		$this->load->view('phi/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */