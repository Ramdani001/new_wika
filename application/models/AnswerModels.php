<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AnswerModels extends CI_Model {

    var $table = 'answer';
    var $column_order = array('answer', 'tgl_dibuat');
    var $order = array('answer', 'tgl_dibuat');


    private function _get_answer_query(){
       
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('id_answer', 'DSC');

        if(isset($_POST['search']['value'])){
            $this->db->like('answer', $_POST['search']['value']);
            $this->db->or_like('tgl_dibuat', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('tgl_Dibuat', 'DESC');
        }
 
    }

    
    public function getDataAnswer(){
        $this->_get_answer_query();
        
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_data(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_filtered_data(){
        $this->_get_answer_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function InsertData($table, $data){

        $query = $this->db->insert($table, $data);

        return $query;

    }

}