<?php

class Room_m extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_room_types($mant)
    {
        $query = $this->db->query('select * from loaiphong where MaNT='.$mant);
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
    function get_rooms($manhatro)
    {
        $sql = 'select *, (select TenLoaiPhong from loaiphong where phongtro.MaLoaiPhong = loaiphong.MaLoaiPhong) as TenLoai, (select count(*) from thanhvien where thanhvien.MaPhong = phongtro.MaPhong and thanhvien.TinhTrang=\'Đang ở\') as SoNguoi, (select TenTV from thanhvien where thanhvien.MaPhong = phongtro.MaPhong and ChucVu = \'DD\' and TinhTrang=\'Đang ở\') as NguoiDD from phongtro where MaNT='.$manhatro;  

        $query = $this->db->query($sql);
        $data = array();

        $i=-1;
        foreach (@$query->result() as $row)
        {
                $i++;
                $data[$i]->maphong = $row->MaPhong;
                $data[$i]->ngaythue = $row->NgayThue;
                $data[$i]->nguoithue = $row->NguoiThue;
                $data[$i]->tinhtrang = $row->TinhTrang;
                $data[$i]->dudinhtra = $row->DuDinhTra;
                $data[$i]->songuoi = $row->SoNguoi;
                $data[$i]->loaiphong = $row->MaLoaiPhong;
                $data[$i]->nhatro = $row->MaNT;
                $data[$i]->nguoidd = $row->NguoiDD;
                $data[$i]->tenloai = $row->TenLoai;
        }
        if(count($data))
            return $data;
        return false;
    }

    function getLichsu($maphong)
    {
        $query = $this->db->query('select * from thanhvien where TinhTrang=\'Không ở\' and MaPhong='.$maphong);
        return $query->result();
    }

    function addRoomType($type, $price, $mant)
    {
        $data = array('TenLoaiPhong' => $type, 'GiaPhong' => $price, 'MaNT' => $mant);
        $this->db->insert('loaiphong', $data);
        return $this->db->affected_rows();
    }

    function deleteRoomType($room_type)
    {
        $this->db->delete('loaiphong', array('MaLoaiPhong' => $room_type));
        return $this->db->affected_rows();
    }

    function reseed(){
        $this->db->query('ALTER TABLE loaiphong AUTO_INCREMENT 1');

    }
    function reseedRoom(){
        $this->db->query('ALTER TABLE phongtro AUTO_INCREMENT 1');

    }

    function getRoomTypeName($room_type)
    {
        $query = $this->db->get_where('loaiphong', array('TenLoaiPhong' => $room_type));
        return $query->result();
    }

    function getRoomType($room_type)
    {
        $query = $this->db->get_where('loaiphong', array('MaLoaiPhong' => $room_type));
        return $query->result();
    }

    function editRoomType($type, $price)
    {
        $data = array('TenLoaiPhong' => $type, 'GiaPhong' => $price);

        $this->db->where('TenLoaiPhong', $type);
        $this->db->update('loaiphong', $data); 
    }

    function isAvailRange($room_type, $min_id, $max_id) {
        $query = $this->db->get_where('room', array('room_type !=' => $room_type, 'room_id >=' => $min_id, 'room_id <=' => $max_id));
        return $query->result();
    }
    function isAvailRoom($maphong){
        $query = $this->db->get_where('phong', array('MaPhong' => $maphong));
        return $query->result();
    }
    function getRoomRange($maphong) {
        $query = $this->db->get_where('phongtro', array('MaPhong' => $maphong));
        return $query->result();
    }

    function getRoomDD($maphong)
    {
        $sql = 'select *, (select TenTV from thanhvien where thanhvien.MaPhong = phongtro.MaPhong and ChucVu = \'DD\') as NguoiDD from phongtro where MaPhong ='.$maphong;  
        $query = $this->db->query($sql);
        return $query->result();
    }
    function deleteRoomRange($maphong) {
        $this->db->delete('phongtro', array('MaPhong ' => $maphong));
        return $this->db->affected_rows();
    }

    function editRoom($maphong, $ngaythue, $ngaytra, $ghichu){
        $data = array('NgayThue' => $ngaythue, 'DuDinhTra' => $ngaytra, 'GhiChu' => $ghichu);

        $this->db->where('MaPhong', $maphong);
        $this->db->update('phongtro', $data); 
    }

    function editDaidien($maphong, $tentv, $chucvu)
    {
        $data = array('ChucVu' => $chucvu);

        $this->db->where('MaPhong', $maphong);
        $this->db->where('TenTV', $tentv);
        $this->db->update('thanhvien', $data); 
    }
    function addRoomRange($ngaythue, $tinhtrang, $loaiphong, $dudinhtra, $mant, $ghichu) {
        // $data = array();
        // for($i = $min_id; $i<=$max_id; ++$i) {
        //     $data[] = array('room_type' => $room_type, 'room_id' => $i);
        // }
        // $this->db->insert_batch('room', $data);
        // return $this->db->affected_rows();

        $data = array('NgayThue' => $ngaythue, 'TinhTrang' => $tinhtrang, 'DuDinhTra' => $dudinhtra, 'MaLoaiPhong' => $loaiphong, 'MaNT' => $mant, 'GhiChu' => $ghichu);
        $this->db->insert('phongtro', $data);
        return $this->db->affected_rows();

    }


    function add_room_sale($data) {
        $query = $this->db->join("room_type","room_type.room_type = room.room_type", "left")->get_where("room", array('room_id' => $data['room_id']));
        if(!$query || $query->num_rows() == 0) {
            return false;
        }
        $price = $query->result();
        $data['room_sales_price'] = $price[0]->room_price;
        $data['total_service_price'] = 0;
        $this->db->insert('room_sales', $data);
    }

    function addThanhvien($tentv, $sdt, $cmnd, $gioitinh, $tinhtrang, $maphong, $chucvu, $date)
    {
        $data = array('TenTV' => $tentv, 'Sdt' => $sdt, 'CMND' => $cmnd, 'GioiTinh' => $gioitinh, 'TinhTrang' => $tinhtrang, 'MaPhong' => $maphong, 'ChucVu' => $chucvu, 'NgayThue' => $date);
        $this->db->insert('thanhvien', $data);
        return $this->db->affected_rows();
    } 

    function updatePhong($maphong, $ngaythue, $tinhtrang, $ghichu)
    {
        $data = array('NgayThue' => $ngaythue, 'TinhTrang' => $tinhtrang, 'GhiChu' => $ghichu);

        $this->db->where('MaPhong', $maphong);
        $this->db->update('phongtro', $data); 
    }

    function getThanhvien($maphong)
    {
        $query = $this->db->query('select TenTV from thanhvien where MaPhong = '.$maphong.' and TinhTrang = \'Đang ở\'');
        return $query->result();
    }

    function getDaidien($maphong)
    {
        $query = $this->db->query('select TenTV from thanhvien where MaPhong = '.$maphong.' and TinhTrang = \'Đang ở\' and ChucVu = \'DD\'');
        return $query->result();
    }
}
