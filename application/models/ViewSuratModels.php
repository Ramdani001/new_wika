<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewSuratModels extends CI_Model {
    var $table = 'suratBalasan';
    var $column_order = array('nomorSuratBalasan', 'asalSekolahPemohon', 'jumlahPemohon', 'tglDibuat', 'divisi.namaDivisi', 'statusSurat');
    var $order = array('nomorSuratBalasan', 'asalSekolahPemohon', 'jumlahPemohon', 'tglDibuat', 'divisi.namaDivisi', 'statusSurat');

    private function _get_surat_query(){
        $this->db->select('suratBalasan.*, divisi.namaDivisi');
        $this->db->from($this->table);
        $this->db->join('divisi', 'divisi.idDivisi = suratBalasan.divisi', 'left');

        if(isset($_POST['search']['value'])){
            $this->db->like('nomorSuratBalasan', $_POST['search']['value']);
            $this->db->or_like('asalSekolahPemohon', $_POST['search']['value']);
            $this->db->or_like('jumlahPemohon', $_POST['search']['value']);
            $this->db->or_like('tglDibuat', $_POST['search']['value']);
            $this->db->or_like('statusSurat', $_POST['search']['value']);
            $this->db->or_like('divisi.namaDivisi', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('tglDibuat', 'DESC');
        }

    }

    
    public function getDataSurat(){
        $this->_get_surat_query();
        
        $query = $this->db->get();
        

        return $query->result();
    }

    
    public function count_filtered_data(){
        $this->_get_surat_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function count_all_data(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}