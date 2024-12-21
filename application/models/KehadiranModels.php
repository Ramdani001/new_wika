<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KehadiranModels extends CI_Model {


   var $table = 'kehadiran';
   var $column_order = array('u.nim', 'u.namaLengkap', 'kehadiran.status', 'kehadiran.alasan');
   var $order = array('u.nim', 'u.namaLengkap', 'kehadiran.status', 'kehadiran.alasan');

private function _get_absen_query(){

        $this->db->select('kehadiran.*, u.namaLengkap, u.nim, u.isActive');
        $this->db->from($this->table);
        $this->db->join('user as u', 'u.id = kehadiran.id_user', 'left');

        if(isset($_POST['search']['value'])){
            $this->db->like('u.nim', $_POST['search']['value']);
            $this->db->or_like('u.namaLengkap', $_POST['search']['value']);
            $this->db->or_like('kehadiran.status', $_POST['search']['value']);
            $this->db->or_like('kehadiran.alasan', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('u.nim', 'ASC');
        }

    }


    public function getTableAbsen(){
        $this->_get_absen_query();
        
        $query = $this->db->get();
        

        return $query->result();
    }

    public function count_filtered_data(){

        $this->_get_absen_query();
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function count_all_data(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}