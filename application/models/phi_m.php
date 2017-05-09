<?php

class Phi_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_phi($mant)
    {
        $query = $this->db->query('select * from chiphish where MaNT='.$mant);
        $data = array();

        foreach (@$query->result() as $row)
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

    function addPhi($tenphi, $dongia)
    {
        $data = array('TenCP' => $tenphi, 'DonGia' => $dongia);
        $this->db->insert('chiphish', $data);
        return $this->db->affected_rows();
    } 

    function deletePhi($tenphi)
    {
        $this->db->delete('chiphish', array('TenCP' => $tenphi));
        return $this->db->affected_rows();
    }

    function editPhi($tenphi, $dongia)
    {
        $data = array('DonGia' => $dongia);

        $this->db->where('TenCP', $tenphi);
        $this->db->update('chiphish', $data); 
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
