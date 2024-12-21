<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class SertifikatController extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('userModels');
        $this->load->model('SertifikatModels');
    }

    public function Insert(){
        
        $data = array(
            'no_surat_penilaian' => $this->input->post('no_surat_penilaian'),
            'idUser' => $this->input->post('nim_user'),
            'kedisiplinan' => $this->input->post('kedisiplinan'),
            'tanggung_jawab' => $this->input->post('tanggung_jawab'),
            'kerapihan' => $this->input->post('kerapihan'),
            'komunikasi' => $this->input->post('komunikasi'),
            'pemahaman_pekerjaan' => $this->input->post('pemahaman_pekerjaan'),
            'manajemen_waktu' => $this->input->post('manajemen_waktu'),
            'kerjasama_tim' => $this->input->post('kerjasama_tim'),
            'tgl_dibuat' => $this->input->post('tgl_dibuat')
        );

        $query = $this->SertifikatModels->InsertData('penilaian', $data);

        if($query){
            $this->session->set_Flashdata('success', 'suratSuccess');
            redirect('Administrator');
        }else{
            $this->session->set_Flashdata('error', 'Gagal Membuat Surat Balasan');
            redirect('Administrator');
        }



    }

    public function GetDataPenilaian(){
        $hasil = $this->SertifikatModels->getDataPenilaian();

        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $data = [];
        $no = 1;
        
        if($user['roleId'] != 1){
            foreach($hasil as $result){
                if($user['nim'] == $result->nim){
                    
                    $row = array();
                    $row[] = $no++;
                    $row[] = $result->no_surat_penilaian;
                    $row[] = $result->nim;
                    $row[] = $result->namaLengkap;
                    $row[] = $result->jurusan; 
                    $row[] = $result->asalSekolah;
                    $row[] = $result->tgl_dibuat;
                    $row[] = " <div class='d-flex'>
                                <a target='_blank' href='http://localhost/wika_intern/Administrator/DetailPenilaian?idPenilaian=$result->id_penilaian' class='btn btn-primary m-1'>
                                <i class='fa-solid fa-download'></i>
                                </a>
                                <button type='button' onclick='lihatSertifikat($result->id_penilaian, 2)' class='btn btn-secondary m-1'><i class='fa-solid fa-eye'></i></button>
                                <button type='button' onclick='lihatSertifikat($result->id_penilaian, 3)' class='btn btn-success m-1'><i class='fa-solid fa-pen-to-square'></i></button>
                            ";

                    $data[] = $row;
                }
            }
        }else{
            foreach($hasil as $result){
                    
                $row = array();
                $row[] = $no++;
                $row[] = $result->no_surat_penilaian;
                $row[] = $result->nim;
                $row[] = $result->namaLengkap;
                $row[] = $result->jurusan; 
                $row[] = $result->asalSekolah;
                $row[] = $result->tgl_dibuat;
                $row[] = " <div class='d-flex'>
                            <a target='_blank' href='http://localhost/wika_intern/Administrator/DetailPenilaian?idPenilaian=$result->id_penilaian' class='btn btn-primary m-1'>
                            <i class='fa-solid fa-download'></i>
                            </a>
                            <button type='button' onclick='lihatSertifikat($result->id_penilaian, 2)' class='btn btn-secondary m-1'><i class='fa-solid fa-eye'></i></button>
                            <button type='button' onclick='lihatSertifikat($result->id_penilaian, 3)' class='btn btn-success m-1'><i class='fa-solid fa-pen-to-square'></i></button>
                        ";

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->SertifikatModels->count_all_data(),
            "recordsFiltered" => $this->SertifikatModels->count_filtered_data(),
            "data" => $data,
        );
        // <button type='button' onclick='lihatSertifikat($result->id_penilaian, 1)' class='btn btn-primary m-1'><i class='fa-solid fa-download'></i></button>
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function GetEdit(){
        
        $id = $this->input->post('id');

        $this->db->select('penilaian.*, user.nim, user.namaLengkap, user.jurusan, user.asalSekolah');
        $this->db->from('penilaian');
        $this->db->join('user', 'user.id = penilaian.idUser', 'left');
        $this->db->where('penilaian.id_penilaian', $id);
        $query = $this->db->get()->row_array();

        $response = array(
            'status' => 200,
            'getSertifikat' => $query,
            // 'getDivisi' => $this->db->get('divisi')->result(),
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function Update(){

        $data = array(
            'no_surat_penilaian' => $this->input->post('no_surat_penilaian'),
            'kedisiplinan' => $this->input->post('kedisiplinan'),
            'tanggung_jawab' => $this->input->post('tanggung_jawab'),
            'kerapihan' => $this->input->post('kerapihan'),
            'komunikasi' => $this->input->post('komunikasi'),
            'pemahaman_pekerjaan' => $this->input->post('pemahaman_pekerjaan'),
            'manajemen_waktu' => $this->input->post('manajemen_waktu'),
            'kerjasama_tim' => $this->input->post('kerjasama_tim'),
            'tgl_dibuat' => $this->input->post('tgl_dibuat')
        );

        $idPenilaian =$this->input->post('id_penilaian');
        // var_dump($idPenilaian);
        // die();
        $this->db->where('id_penilaian', $idPenilaian);

        $query = $this->db->update('penilaian', $data);      

        
        if($query){
            $this->session->set_Flashdata('success', 'suratSuccess');
            redirect('Administrator');
        }else{
            $this->session->set_Flashdata('error', 'Gagal Membuat Surat Balasan');
            redirect('Administrator');
        }

    }

    public function ViewSertifikat(){

        $idPenilaian = $this->input->post('id');

        $this->db->select('penilaian.*, user.nim, user.namaLengkap, user.jurusan, user.asalSekolah');
        $this->db->from('penilaian');
        $this->db->join('user', 'user.id = penilaian.idUser', 'left');
        $this->db->where('penilaian.id_penilaian', $idPenilaian);

        $query = $this->db->get()->row_array();


        $response = array(
            'status' => 200,
            'getSertifikat' => $query,
            // 'getDivisi' => $this->db->get('divisi')->result(),
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getTanggal(){

        
        $idUser = $this->input->post('idUser');
        // $idUser = 33;

        $queryUser = $this->db->get_where('user', ['id' => $idUser])->row_array();
        
        $nim = $queryUser['nim'];

        $this->db->where('nim1', $nim);
        $this->db->or_where('nim2', $nim);
        $this->db->or_where('nim3', $nim);
        $this->db->or_where('nim4', $nim);
        $this->db->or_where('nim5', $nim);
        $query = $this->db->get('suratbalasan')->row_array();
        // var_dump($query);
        // die();
        $response = array(
            'status' => 200,
            'getTanggal' => $query,
            // 'getDivisi' => $this->db->get('divisi')->result(),
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function GenSerti(){

        $id = $this->input->post('id');

        $this->db->select('user.*, divisi.namaDivisi');
        $this->db->from('user');
        $this->db->join('divisi', 'divisi.idDivisi = user.divisi', 'left');
        $this->db->where('user.id', $id);
        $query = $this->db->get()->row_array();


        $jumlahSurat = $this->db->get('penilaian');
        $jumlahSurat->num_rows();


        $response = array(
            'status' => 200,
            'getSerti' => $query,
            'jumlahSurat' => $jumlahSurat,
            // 'getDivisi' => $this->db->get('divisi')->result(),
        );
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function GenSurat(){
        $jumlahBalasan = $this->db->get('suratbalasan');
        $jumlahBalasan->num_rows();

        $response = array(
            'status' => 200,
            'jumlahBalasan' => $jumlahBalasan
            // 'getDivisi' => $this->db->get('divisi')->result(),
        );
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

}