<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SertifikatModels extends CI_Model {

    // var $table = 'suratBalasan';
    // var $column_order = array('nomorSuratBalasan', 'asalSekolahPemohon', 'jumlahPemohon', 'tglDibuat', 'divisi.namaDivisi', 'statusSurat');
    // var $order = array('nomorSuratBalasan', 'asalSekolahPemohon', 'jumlahPemohon', 'tglDibuat', 'divisi.namaDivisi', 'statusSurat');


    var $table = 'penilaian';
    var $column_order = array('no_surat_penilaian', 'u.nim', 'u.namaLengkap', 'u.jurusan', 'u.asalSekolah', 'tgl_dibuat');
    var $order = array('no_surat_penilaian', 'u.nim', 'u.namaLengkap', 'u.jurusan', 'u.asalSekolah', 'tgl_dibuat');


    private function _get_penilaian_query(){
       
        $this->db->select('penilaian.*, u.namaLengkap, u.nim, u.jurusan, u.asalSekolah');
        $this->db->from($this->table);
        $this->db->join('user as u', 'u.id = penilaian.idUser', 'left');

        if(isset($_POST['search']['value'])){
            $this->db->like('no_surat_penilaian', $_POST['search']['value']);
            $this->db->or_like('u.nim', $_POST['search']['value']);
            $this->db->or_like('u.namaLengkap', $_POST['search']['value']);
            $this->db->or_like('u.jurusan', $_POST['search']['value']);
            $this->db->or_like('u.asalSekolah', $_POST['search']['value']);
            $this->db->or_like('tgl_dibuat', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('tgl_Dibuat', 'DESC');
        }

    }

    
    public function getDataPenilaian(){
        $this->_get_penilaian_query();
        
        $query = $this->db->get();
        

        return $query->result();
    }

    
    public function count_filtered_data(){
        $this->_get_penilaian_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function count_all_data(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function InsertData($table, $data){

        $query = $this->db->insert($table, $data);

        return $query;

    }

}