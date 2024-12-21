<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class serverSideModels extends CI_Model {

    var $table = 'user';
    var $column_order = array('nim', 'namaLengkap', 'asalSekolah', 'jurusan', 'divisi.namaDivisi');
    var $order = array('nim', 'namaLengkap', 'asalSekolah', 'jurusan', 'divisi.namaDivisi');

    private function _get_data_query(){
        $this->db->select('user.*, divisi.namaDivisi, divisi.idDivisi');
        $this->db->from($this->table);
        $this->db->join('divisi', 'divisi.idDivisi = user.divisi', 'left');

        if(isset($_POST['search']['value'])){
            $this->db->like('nim', $_POST['search']['value']);
            $this->db->or_like('namaLengkap', $_POST['search']['value']);
            $this->db->or_like('asalSekolah', $_POST['search']['value']);
            $this->db->or_like('jurusan', $_POST['search']['value']);
            $this->db->or_like('divisi.namaDivisi', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('nim', 'ASC');
        }

    }

    private function _get_absen_query(){

        $table = 'kehadiran';
        $column_order = array('u.nim', 'u.namaLengkap', 'kehadiran.status', 'kehadiran.alasan');
        $order = array('u.nim', 'u.namaLengkap', 'kehadiran.status', 'kehadiran.alasan');

        $this->db->select('kehadiran.*');
        $this->db->from($this->table);
        
        $this->db->join('user as u', 'u.id = kehadiran.status', 'left');

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

    private function _get_surat_query(){

        $table = 'suratbalasan';
        
        $column_order = array('suratbalasan.nomorSuratBalasan', 'suratbalasan.asalSekolahPemohon', 'suratbalasan.tglDibuat', 'suratbalasan.statusSurat', 'divisi.namaDivisi');
        $order = array('suratbalasan.nomorSuratBalasan', 'suratbalasan.asalSekolahPemohon', 'suratbalasan.tglDibuat', 'suratbalasan.statusSurat', 'divisi.namaDivisi');

        $this->db->select('suratbalasan.*, divisi.namaDivisi');
        $this->db->from($table);
        
        $this->db->join('divisi', 'divisi.idDivisi = suratbalasan.divisi', 'left');

        if(isset($_POST['search']['value'])){
            $this->db->like('nomorSuratBalasan', $_POST['search']['value']);
            $this->db->or_like('asalSekoahPemohon', $_POST['search']['value']);
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

    public function getDataTable(){
        $this->_get_data_query();
        
        $query = $this->db->get();
        

        return $query->result();
    }

    public function getTableAbsen(){
        $this->_get_absen_query();
        
        $query = $this->db->get();
        

        return $query->result();
    }

    public function getDataSurat(){
        $this->_get_surat_query();
        
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

    public function count_all_data_surat(){
        $table = 'suratbalasan';
        $this->db->from($table);
        return $this->db->count_all_results();
    }


}