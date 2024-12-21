<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class userModels extends CI_Model {

    public function allData(){

        $this->db->from('user');
        $this->db->join('divisi', 'divisi.id  = user.divisi ', 'left');
        
        return $this->db->get()->result();
    }

    public function security(){
        $username = $this->session->userdata('email');
        if(empty($username)){
            $this->session->sess_destroy();
            redirect('/');
        }
    }

}