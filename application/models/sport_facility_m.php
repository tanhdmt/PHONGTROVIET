<?php

class Sport_facility_m extends CI_Model {

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

    function addPhi($tenphi, $dongia, $mant)
    {
        $data = array('TenCP' => $tenphi, 'DonGia' => $dongia, 'MaNT' => $mant);
        $this->db->insert('chiphish', $data);
        return $this->db->affected_rows();
    } 

    function checkDien($mant)
    {
        $query = $this->db->query('select count(*) as Count from chiphish where TenCP=\'Điện\' and MaNT='.$mant);
        return $query->result();
    }

    function checkNuoc($mant)
    {
        $query = $this->db->query('select count(*) as Count from chiphish where TenCP=\'Nước\' and MaNT='.$mant);
        return $query->result();
    }

    function deletePhi($maphi)
    {
        $this->db->delete('chiphish', array('MaCP' => $maphi));
        return $this->db->affected_rows();
    }

    function editPhi($maphi, $dongia)
    {
        $data = array('DonGia' => $dongia);

        $this->db->where('MaCP', $maphi);
        $this->db->update('chiphish', $data); 
    }

    function getPhi($maphi)
    {
        $query = $this->db->get_where('chiphish', array('MaCP' => $maphi));
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
