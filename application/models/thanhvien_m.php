<?php

class Thanhvien_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_thanhvien()
    {
        $query = $this->db->get('thanhvien');
        $data = array();

        if($query)
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }
        if(count($data))
            return $data;
        return false;
    } 

    function reseed()
    {
        $this->db->query('ALTER TABLE thanhvien AUTO_INCREMENT 1');
    }
    function addThanhvien($tentv, $sdt, $cmnd, $gioitinh, $tinhtrang, $maphong, $chucvu)
    {
        $data = array('TenTV' => $tentv, 'Sdt' => $sdt, 'CMND' => $cmnd, 'GioiTinh' => $gioitinh, 'TinhTrang' => $tinhtrang, 'MaPhong' => $maphong, 'ChucVu' => $chucvu);
        $this->db->insert('thanhvien', $data);
        return $this->db->affected_rows();
    } 

    function deleteEmployee($employee_id)
    {
        $this->db->delete('employee', array('employee_id' => $employee_id));
        return $this->db->affected_rows();
    }

    function editEmployee($employee_id, $username, $password, $firstname, $lastname, $telephone, $email, $department_id, $employee_type, $employee_salary, $employee_hiring_date)
    {
        $data = array('employee_username' => $username, 'employee_password' => $password, 'employee_firstname' => $firstname, 'employee_lastname' => $lastname, 'employee_telephone' => $telephone, 'employee_email' => $email, 'department_id' => $department_id, 'employee_type' => $employee_type, 'employee_salary' => $employee_salary, 'employee_hiring_date' => $employee_hiring_date);

        $this->db->where('employee_id', $employee_id);
        $this->db->update('employee', $data); 
    }

    function getEmployee($employee_id)
    {
        $query = $this->db->get_where('employee', array('employee_id' => $employee_id));
        return $query->result();
    }

    function getDepartments()
    {
        $query = $this->db->from('department')->get();
        $data = array();

        foreach ($query->result() as $row)
        {
            $data[] = $row;
            // $row->customer_id
            // $row->customer_username
            // $data[0]->customer_id
        }
        if(count($data))
            return $data;
        return false;
    }   
}
