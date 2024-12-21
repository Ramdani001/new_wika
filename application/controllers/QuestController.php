<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class QuestController extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('QuestModels');
    }

    public function GetDataQuest(){
        $hasil = $this->QuestModels->getDataQuest();

        $data = [];
        $no = 1;

        foreach($hasil as $result){
                
            $row = array();
            $row[] = $no++;
            $row[] = $result->quest;
            $row[] = $result->tgl_dibuat;
            $row[] = " <div class='d-flex'>
                        <button type='button' onclick='lihatSertifikat($result->id_quest, 2)' class='btn btn-secondary m-1'><i class='fa-solid fa-eye'></i></button>
                        <button type='button' onclick='lihatSertifikat($result->id_quest, 3)' class='btn btn-success m-1'><i class='fa-solid fa-pen-to-square'></i></button>
                        <button type='button' onclick='lihatSertifikat($result->id_quest, 3)' class='btn btn-danger m-1'><i class='fa-solid fa-trash-can'></i></button>
                    ";

            $data[] = $row;
        }

        $output = array(
            // "draw" => $_POST['draw'],
            "recordsTotal" => $this->QuestModels->getDataQuest(),
            "recordsFiltered" => $this->QuestModels->count_filtered_data(),
            "data" => $data,
        );
        // <button type='button' onclick='lihatSertifikat($result->id_penilaian, 1)' class='btn btn-primary m-1'><i class='fa-solid fa-download'></i></button>
        $this->output->set_content_type('application/json')->set_output(json_encode($output));


    }

    public function insert(){

            $jenis_jawaban = 0;
            $ganda = "";
            $text_bebas = 0;

            $arr_pl = array();

            if($this->input->post('jenis_jawaban') == 1 ){
                
                for($i = 1; $i <= 6; $i++){
                    array_push($arr_pl, $this->input->post('pl'.$i));
                }
                $jenis_jawaban = 1;
            }else{
                $jenis_jawaban = 2;
            }

            if($jenis_jawaban == 2){
                $text_bebas = 0;
            }

            $formatted_date = date('Y-m-d H:i:s', time()); // Formatkan timestamp ke 'Y-m-d H:i:s'
        
            $data = array(
                'quest' => $this->input->post('quest'),
                'text_bebas' => $text_bebas,
                'ganda' => json_encode($arr_pl),
                'lainnya' => $this->input->post('lainnya_pil'),
                'tgl_dibuat' => $formatted_date
            );
    
            $query = $this->QuestModels->InsertData('quesioner', $data);
    
            if($query){
                $this->session->set_Flashdata('success', 'suratSuccess');
                redirect('Administrator');
            }else{
                $this->session->set_Flashdata('error', 'Gagal Membuat Surat Balasan');
                redirect('Administrator');
            }

            var_dump($data);
            die();
    
    }
}
