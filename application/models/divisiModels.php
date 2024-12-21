<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class divisiModels extends CI_Model {

    var $table = 'divisi';
    var $column_order = array('namaDivisi', 'lokasiDivisi');
    var $order = array('namaDivisi', 'lokasiDivisi');

    private function _get_data_query(){
        $this->db->select('divisi.*');
        $this->db->from($this->table);

        if(isset($_POST['search']['value'])){
            $this->db->like('namaDivisi', $_POST['search']['value']);
            $this->db->or_like('lokasiDivisi', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('idDivisi', 'DESC');
        }

    }

    
    public function getDataTable(){
        $this->_get_data_query();
        $query = $this->db->get();
        return $query->result();
    }

    
    public function count_filtered_data(){
    
        $this->_get_data_query();
        $query = $this->db->get();
        return $query->num_rows();
    
    }

    public function count_all_data(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


}