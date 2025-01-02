<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class AnswerController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('AnswerModels');
    }

    public function GetAlAns(){
        $hasil = $this->AnswerModels->getDataQuest();

        $this->output->set_content_type('application/json')->set_output(json_encode($hasil));

    } 
 
    public function getViewQuest(){
        $idQuest = $this->input->post('id');

        $this->db->select("quest, id_quest");
        $this->db->from('quesioner');
        $this->db->where('id_quest', $idQuest);
        $query = $this->db->get()->row_array();

        $response = array(
            'status' => 200,
            'getQuest' => $query,
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getAnswer(){
        $idQuest = $this->input->post('id');

        $this->db->select("*");
        $this->db->from('answer');
        $this->db->where('id_answer', $idQuest);
        $query = $this->db->get()->row_array();



        $response = array(
            'status' => 200,
            'getDataQuest' => $query,
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function GetDataAns(){
        $hasil = $this->AnswerModels->getDataAnswer();
        $data = [];
        $no = 1;
        
        foreach($hasil as $result){
                
            $row = array();
            $row[] = $no++;
            $row[] = $result->name;
            $row[] = $result->tgl_dibuat;
            $row[] = " <div class='d-flex'>
            <button type='button' onclick='getDataAnswer($result->id_answer)' class='btn btn-success m-1'><i class='fa-solid fa-pen-to-square'></i></button>
            ";
            
            $data[] = $row;
        }
        // var_dump($hasil);
        // die();

        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->AnswerModels->getDataAnswer(),
            "recordsFiltered" => $this->AnswerModels->count_filtered_data(),
            "data" => $data,
        );
        // <button type='button' onclick='lihatSertifikat($result->id_penilaian, 1)' class='btn btn-primary m-1'><i class='fa-solid fa-download'></i></button>
        $this->output->set_content_type('application/json')->set_output(json_encode($output));


    }

}
