<?php

class Restaurant_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getNhatro($mant)
    {
        $query = $this->db->get_where('nhatro', array('MaNT' => $mant));
        return $query->result();
        
    } 

    function getTinh()
    {
        $query = $this->db->from('province')->get();
        $data = array();

        foreach (@$query->result() as $row)
        {
            $data[] = $row;
        }
        if(count($data))
            return $data;
        return false;
    } 

    function getQuan($matinh)
    {
        $query = $this->db->get_where('district', array('provinceid' => $matinh));
        return $query->result();
    }

    function updateNhatro($mant, $diachi, $sdt, $dientich, $soluong, $tinh, $quan, $toado, $mota)
    {
        $data = array('DiaChi' => $diachi, 'SDT' => $sdt, 'DienTich' => $dientich, 'SoLuongPhong' => $soluong, 'TinhThanh' => $tinh, 'QuanHuyen' => $quan, 'MoTa' => $mota, 'ToaDo' =>$toado);

        $this->db->where('MaNT', $mant);
        $this->db->update('nhatro', $data); 
    }

    function addRestaurant($restaurantName, $restaurantOpenTime, $restaurantCloseTime, $restaurantDetails, $tableCount)
    {
        $data = array('restaurant_name' => $restaurantName, 'restaurant_open_time' => $restaurantOpenTime, 'restaurant_close_time' => $restaurantCloseTime, 'restaurant_details' => $restaurantDetails, 'table_count' => $tableCount);
        $this->db->insert('restaurant', $data);
        return $this->db->affected_rows();
    } 

    function deleteRestaurant($restaurant_name)
    {
        $this->db->delete('restaurant', array('restaurant_name' => $restaurant_name));
        return $this->db->affected_rows();
    }

    function editRestaurant($restaurant_name, $restaurant_open_time, $restaurant_close_time, $restaurant_details, $tableCount)
    {
        $data = array('restaurant_name' => $restaurant_name, 'restaurant_open_time' => $restaurant_open_time, 'restaurant_close_time' => $restaurant_close_time, 'restaurant_details' => $restaurant_details, 'table_count' => $tableCount);

        $this->db->where('restaurant_name', $restaurant_name);
        $this->db->update('restaurant', $data); 
    }

    function getRestaurant($restaurant_name)
    {
        $query = $this->db->get_where('restaurant', array('restaurant_name' => $restaurant_name));
        return $query->result();
    }

    function add_service($restaurant, $customer, $date, $table_num, $price)
    {
        $data = array(
            'restaurant_name' => $restaurant,
            'customer_id' => $customer,
            'book_date' => $date,
            'table_number' => $table_num,
            'book_price' => $price
        );
        $this->db->insert('restaurant_booking', $data);
    }
}
