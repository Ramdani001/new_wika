<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class QuestModels extends CI_Model {

    var $table = 'quesioner';
    var $column_order = array('quest', 'tgl_dibuat');
    var $order = array('quest', 'tgl_dibuat');


    private function _get_quest_query(){
       
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('id_quest', 'DSC');

        if(isset($_POST['search']['value'])){
            $this->db->like('quest', $_POST['search']['value']);
            $this->db->or_like('tgl_dibuat', $_POST['search']['value']);
        }

        if(isset($_POST['order'])){
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('tgl_Dibuat', 'DESC');
        }

    }

    
    public function getDataQuest(){
        $this->_get_quest_query();
        
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_data(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_filtered_data(){
        $this->_get_quest_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function InsertData($table, $data){

        $query = $this->db->insert($table, $data);

        return $query;

    }

}