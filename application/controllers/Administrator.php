<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "third_party/dompdf/autoload.php";

use Dompdf\Dompdf;

class Administrator extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('userModels');
        $this->load->model('ViewSuratModels');
        $this->load->model('divisiModels');
    }
    public function index(){
        $email = $this->session->userdata('email');
        $data['title'] = 'Intership';
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
       
        if(empty($email)){
            $this->load->model('userModels');
            $this->userModels->security();    
        } 

        if(!empty($email)){
            $this->load->view('templates/header', $data); 
            $this->load->view('administrator/index', $data);
            $this->load->view('templates/footer');
        }else{
            echo '<script> console.log("Session Kosong"); </script>';
            redirect('/');
        }
    }

    public function Kehadiran(){
        
        $id_user = $this->input->post('id_user', 'true');
        $status = $this->input->post('status', 'true');
        $alasan = $this->input->post('alasan', 'true');
        
        $cekData = $this->db->get_where('kehadiran', ['id_user' => $id_user])->row_array();
        // var_dump($cekData);
        // die();
        if(empty($cekData)){
            if($status == "Hadir"){
                $data = [
                    'id_user' => $id_user,
                    'status' => $status,
                    'alasan' => $alasan,
                    'hadir' => 1,
                    'tidakHadir' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'update_at' => date('Y-m-d H:i:s'),
                ];
            }else{
                $data = [
                    'id_user' => $id_user,
                    'status' => $status,
                    'alasan' => $alasan,
                    'hadir' => 0,
                    'tidakHadir' => 1,
                    'created_at' => date('Y-m-d H:i:s'), 
                    'update_at' => date('Y-m-d H:i:s'),
                ];
            }

            $query = $this->db->insert('kehadiran', $data);

            if($query){
                $this->session->set_Flashdata('message', 'Berhasil Update Kehadiran');
                redirect('Administrator');
            }else{
                $this->session->set_Flashdata('message', 'Gagal Update Kehadiran');
                redirect('Administrator');
            }

        }else{
            
            
                if($status == "Tidak Hadir"){
                    $data = [
                        'id_user' => $id_user,
                        'status' => $status,
                        'alasan' => $alasan,
                        'hadir' => $cekData['hadir'] + 0,
                        'tidakHadir' => $cekData['tidakHadir'] + 1,
                        'created_at' => $cekData['created_at'],
                        'update_at' => date('Y-m-d H:i:s'),
                    ];
                }else{
                    $data = [
                        'id_user' => $id_user,
                        'status' => $status,
                        'alasan' => $alasan,
                        'hadir' => $cekData['hadir'] + 1,
                        'tidakHadir' => $cekData['tidakHadir'] + 0,
                        'created_at' => $cekData['created_at'],
                        'update_at' => date('Y-m-d H:i:s'),
                    ];
                }
            

            $this->db->where('id_user', $id_user);
            $query = $this->db->update('kehadiran', $data);

            if($query){
                $this->session->set_Flashdata('message', 'Berhasil Update Kehadiran');
                redirect('Administrator');
            }else{
                $this->session->set_Flashdata('message', 'Gagal Update Kehadiran');
                redirect('Administrator');
            }


        }


    }

    public function getDataAbsen(){
        $this->load->model('userModels');
        $this->load->model('KehadiranModels');
        $this->userModels->security();
 
        $hasil = $this->KehadiranModels->getTableAbsen();
       
        $data = [];
        $no = 1;
        
            foreach($hasil as $result){

                if($result->isActive == 1 ){
                    $row = array();
                    $row[] = $no++;
                    $row[] = $result->nim;
                    $row[] = $result->namaLengkap;
                    $row[] = $result->status;
                    // $row[] = $result->jurusan;
                    $row[] = $result->alasan;
                    $row[] = $result->hadir;
                    $row[] = $result->tidakHadir;
                    $row[] = $result->update_at;
                    
                    $data[] = $row;
                }
                // $row[] = "<button type='button' onclick='modalDetail($result->id_user)' class='btn btn-primary'>Detail</button>";
    
            }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->KehadiranModels->count_all_data(),
            "recordsFiltered" => $this->KehadiranModels->count_filtered_data(),
            "data" => $data,
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function updateJobdesc(){
        $idJob = $this->input->post('idJob');

        $cekData = $this->db->get_where('jobdesc', ['id' => $idJob])->row_array();
        
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'judul_job' => $this->input->post('judulJob'),
            'deskripsi' => $this->input->post('deskripsi1'),
            'status_job' => $this->input->post('statusJob'),
            'progresDeskripsi' => $this->input->post('progresDeskripsi'),
            'created_at' => $cekData['created_at'],
            'update_at' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $idJob);
        $query = $this->db->update('jobdesc', $data);

        if($query){
            $this->session->set_Flashdata('message', 'Berhasil Update Job Description');
            redirect('Administrator');
        }else{
            $this->session->set_Flashdata('message', 'Gagal Update Job Description');
            redirect('Administrator');
        }

    }

    public function detailProgres(){
        // var_dump($this->input->post()); 
        // die(); 
        $id = $this->input->post('iduser');
        $this->db->select('jobdesc.*, user.namaLengkap');
        $this->db->from('jobdesc');
        $this->db->join('user', 'user.id = jobdesc.id_user');
        $this->db->where('jobdesc.id', $id);
        $data = $this->db->get()->result();

        $response = array(
            'status' => 200,
            'data' => $data
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));

    }

    public function EvaluasiUpdate(){
        // var_dump($this->input->post());
        // die();

        $idJob = $this->input->post('idJob');

        $cekData = $this->db->get_where('jobdesc', ['id' => $idJob])->row_array();
        
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'judul_job' => $this->input->post('judulJob'),
            'deskripsi' => $this->input->post('deskripsi1'),
            'status_job' => $this->input->post('statusJob'),
            'deskripsi' => $this->input->post('deskripsi'),
            'progresDeskripsi' => $this->input->post('deskripsiProgres'),
            'evaluasi' => $this->input->post('evaluasi'),
            'created_at' => $cekData['created_at'],
            'update_at' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $idJob);
        $query = $this->db->update('jobdesc', $data);

        if($query){
            $this->session->set_Flashdata('message', 'Berhasil Update Job Description');
            redirect('Administrator');
        }else{
            $this->session->set_Flashdata('message', 'Gagal Update Job Description');
            redirect('Administrator');
        }

        die();
    }

    public function InsertSuratBalasan(){

        $SPemohon = $this->input->post('statusPemohon');
        $asalSekolah = $this->input->post('asalSekolahPemohon');

        // if($SPemohon == "Mahasiswa" || $SPemohon == "Siswa"){
        //     if($SPemohon == "Mahasiswa") {
        //         $kpdYth = "Rektor ".$asalSekolah." " ;
        //     }else{
        //         $kpdYth = "Kepala Sekolah ".$asalSekolah." " ;
        //     }
        // }
        
        // Upload File/Gambar
        $config['upload_path'] = './assets/img/QrCode';
        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']     = '600000';
        $config['max_width'] = '10240';
        $config['max_height'] = '10000';

        // // Memuat library Upload
        $this->load->library('upload', $config);

        // $ttd = $_FILES['ttd_digital']['name'];

        if ($this->upload->do_upload('ttd_digital')) {
            $upload_data = $this->upload->data();
            $ttd = $upload_data['file_name'];
            
        } else {
            $error = $this->upload->display_errors();
            echo "Gagal mengunggah file: " . $error;
        }


        
        $data = array(
            'nomorSuratBalasan' => $this->input->post('nomorSuratBalasan'),
            'asalSekolahPemohon' => $asalSekolah,
            'tglDibuat' => $this->input->post('tglDibuat'),
            'nomorSuratMou' => $this->input->post('nomorSuratMou'),
            'tglSuratMou' => $this->input->post('tglSuratMou'),
            'statusPemohon' => $SPemohon,
            'jumlahPemohon' => $this->input->post('jumlahPemohon'),
            
            'namaPemohon1' => $this->input->post('insertNamaPemohon1'),
            'nim1' => $this->input->post('nim1'),
            'jurusan1' => $this->input->post('jurusan1'),
            
            'namaPemohon2' => $this->input->post('insertNamaPemohon2'),
            'nim2' => $this->input->post('nim2'),
            'jurusan2' => $this->input->post('jurusan2'),
            
            'namaPemohon3' => $this->input->post('insertNamaPemohon3'),
            'nim3' => $this->input->post('nim3'),
            'jurusan3' => $this->input->post('jurusan3'),
            
            'namaPemohon4' => $this->input->post('insertNamaPemohon4'),
            'nim4' => $this->input->post('nim4'),
            'jurusan4' => $this->input->post('jurusan4'),
            
            'namaPemohon5' => $this->input->post('insertNamaPemohon5'),
            'nim5' => $this->input->post('nim5'),
            'jurusan5' => $this->input->post('jurusan5'),

            'statusSurat' => $this->input->post('statusSurat'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglAkhir' => $this->input->post('tglAkhir'),
            'divisi' => $this->input->post('divisi'),
            'namaPembimbing' => $this->input->post('namaPembimbing'),

            'ttd_digital' => $ttd
            
        );
        $query = $this->db->insert('suratbalasan', $data);

        if($query){
            $this->session->set_Flashdata('success', 'suratSuccess');
            redirect('Administrator');
        }else{
            $this->session->set_Flashdata('error', 'Gagal Membuat Surat Balasan');
            redirect('Administrator');
        }

    }

    public function GetDataSurat(){
        $hasil = $this->ViewSuratModels->getDataSurat();
        $email = $this->session->userdata('email');
        $data = [];
        $no = 1;
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

       
        $nimFilter = $user['nim'];

        if($user['roleId'] == 3){
            foreach ($hasil as $result) {
                
                if($nimFilter == $result->nim1 || $nimFilter == $result->nim2 || $nimFilter == $result->nim3 || $nimFilter == $result->nim4 || $nimFilter == $result->nim5){
                    
                     $row = array();
                     $row[] = $no++;
                     $row[] = $result->nomorSuratBalasan;
                     $row[] = $result->asalSekolahPemohon;
                     $row[] = $result->jumlahPemohon;
                     $row[] = $result->statusSurat;
                     $row[] = $result->namaDivisi;
                     $row[] = $result->tglDibuat;
                     $row[] = " <div class='d-flex'>
                         <button type='button' class='btn btn-primary m-1' onclick='lihatSurat($result->idSurat, 1)'><i class='fa-solid fa-download'></i></button>
                         <button type='button' class='btn btn-secondary m-1' onclick='lihatSurat($result->idSurat, 2)'><i class='fa-solid fa-eye'></i></button>
                              
                     </div>";
     
                     $data[] = $row;
                }
             }
        }
        
        if($user['roleId'] == "1"){
            foreach ($hasil as $result) {
                $row = array();
                $row[] = $no++;
                $row[] = $result->nomorSuratBalasan;
                $row[] = $result->asalSekolahPemohon;
                $row[] = $result->jumlahPemohon;
                $row[] = $result->statusSurat;
                $row[] = $result->namaDivisi;
                $row[] = $result->tglDibuat;
                $row[] = " <div class='d-flex'>
                    <button type='button' class='btn btn-primary m-1' onclick='lihatSurat($result->idSurat, 1)'><i class='fa-solid fa-download'></i></button>
                    <button type='button' class='btn btn-secondary  m-1' onclick='lihatSurat($result->idSurat, 2)'><i class='fa-solid fa-eye'></i></button>
                    <button type='button' class='btn btn-success m-1' onclick='lihatSurat($result->idSurat, 3)'><i class='fa-solid fa-pen-to-square'></i></button>
                    </div>";
                    
                $data[] = $row;
             }
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ViewSuratModels->count_all_data(),
            "recordsFiltered" => $this->ViewSuratModels->count_filtered_data(),
            "data" => $data,
        );
      
        $this->output->set_content_type('application/json')->set_output(json_encode($output));

    }

    public function DetailSurat(){

        $this->db->select('suratBalasan.*, divisi.namaDivisi');
        $this->db->from('suratBalasan');
        $this->db->join('divisi', 'divisi.idDivisi = suratBalasan.divisi', 'left');
        $this->db->where('suratBalasan.idSurat', $this->input->post('idSurat'));
        $query = $this->db->get()->result();

        $data = [
            'title'=> "Surat Balasan",
            'data' => $query,
        ];
        $this->load->view('templates/pages/DetailSurat', $data);

        
        $paper_size = "A4";
        $orientation = "potrait";
        $html = $this->output->get_output();

        $pdf = new Dompdf();
        $pdf->set_option('isRemoteEnabled', TRUE);
        $pdf->setPaper($paper_size, $orientation);
        $pdf->loadHtml($html);
        $pdf->render();

        $pdf->stream('Surat_Balasan.pdf', ['Attchment' => 0]);

    }

    public function ViewDataSurat(){

        $idSurat = $this->input->post('idSurat');
        $this->db->select('suratBalasan.*, divisi.namaDivisi');
        $this->db->from('suratBalasan');
        $this->db->join('divisi', 'divisi.idDivisi = suratBalasan.divisi', 'left');
        $this->db->where('suratBalasan.idSurat', $idSurat);
        $query = $this->db->get()->row_array();
        

        $response = array(
            'status' => 200,
            'getSurat' => $query
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function EditDataSurat(){ 

        $idSurat = $this->input->post('idSurat');
        $this->db->select('suratBalasan.*, divisi.namaDivisi, divisi.idDivisi');
        $this->db->from('suratBalasan');
        $this->db->join('divisi', 'divisi.idDivisi = suratBalasan.divisi', 'left');
        $this->db->where('suratBalasan.idSurat', $idSurat);
        $query = $this->db->get()->row_array();
        

        $response = array(
            'status' => 200,
            'getSurat' => $query,
            'getDivisi' => $this->db->get('divisi')->result(),
        );

        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function UpdateSuratBalasan(){
       
        $idSurat = $this->input->post('idSurat');

        if(!empty($_FILES['ttd_digital']['name'])){
            var_dump($_FILES['ttd_digital']);
            die();
           
        }else{

            if($this->input->post('jumlahPemohon') == 1){
                    $data = array(
                        'nomorSuratBalasan' => $this->input->post('nomorSuratBalasan'),
                        'asalSekolahPemohon' => $this->input->post('asalSekolahPemohon'),
                        'tglDibuat' => $this->input->post('tglDibuat'),
                        'nomorSuratMou' => $this->input->post('nomorSuratMou'),
                        'tglSuratMou' => $this->input->post('tglSuratMou'),
                        'statusPemohon' => $this->input->post('statusPemohon'),
                        'jumlahPemohon' => $this->input->post('jumlahPemohon'),
                        
                        'namaPemohon1' => $this->input->post('namaPemohon1'),
                        'nim1' => $this->input->post('nim1'),
                        'jurusan1' => $this->input->post('jurusan1'),

                        'statusSurat' => $this->input->post('statusSurat'),
                        'tglMulai' => $this->input->post('tglMulai'),
                        'tglAkhir' => $this->input->post('tglAkhir'),
                        'divisi' => $this->input->post('divisi'),
                        'namaPembimbing' => $this->input->post('namaPembimbing'),
                        'ttd_digital' => $this->input->post('old_ttd_digital'),
                    );
                    
                    $this->db->set($data);
                    $this->db->where('idSurat', $idSurat);
                    $query = $this->db->update('suratbalasan');
                    if($query){
                        redirect('Administrator');
                    }else{
                        var_dump($query);
                        die();
                    }
            }else if($this->input->post('jumlahPemohon') == 2){
                    $data = array(
                        'nomorSuratBalasan' => $this->input->post('nomorSuratBalasan'),
                        'asalSekolahPemohon' => $this->input->post('asalSekolahPemohon'),
                        'tglDibuat' => $this->input->post('tglDibuat'),
                        'nomorSuratMou' => $this->input->post('nomorSuratMou'),
                        'tglSuratMou' => $this->input->post('tglSuratMou'),
                        'statusPemohon' => $this->input->post('statusPemohon'),
                        'jumlahPemohon' => $this->input->post('jumlahPemohon'),
                        
                        'namaPemohon1' => $this->input->post('namaPemohon1'),
                        'nim1' => $this->input->post('nim1'),
                        'jurusan1' => $this->input->post('jurusan1'),

                        'namaPemohon2' => $this->input->post('namaPemohon2'),
                        'nim2' => $this->input->post('nim2'),
                        'jurusan2' => $this->input->post('jurusan2'),

                        
                        'statusSurat' => $this->input->post('statusSurat'),
                        'tglMulai' => $this->input->post('tglMulai'),
                        'tglAkhir' => $this->input->post('tglAkhir'),
                        'divisi' => $this->input->post('divisi'),
                        'namaPembimbing' => $this->input->post('namaPembimbing'),
                        'ttd_digital' => $this->input->post('old_ttd_digital'),
                    );
                    
                    $this->db->set($data);
                    $this->db->where('idSurat', $idSurat);
                    $this->db->update('suratbalasan');
                    redirect('Administrator');
            }else if($this->input->post('jumlahPemohon') == 3){
                    $data = array(
                        'nomorSuratBalasan' => $this->input->post('nomorSuratBalasan'),
                        'asalSekolahPemohon' => $this->input->post('asalSekolahPemohon'),
                        'tglDibuat' => $this->input->post('tglDibuat'),
                        'nomorSuratMou' => $this->input->post('nomorSuratMou'),
                        'tglSuratMou' => $this->input->post('tglSuratMou'),
                        'statusPemohon' => $this->input->post('statusPemohon'),
                        'jumlahPemohon' => $this->input->post('jumlahPemohon'),
                        
                        'namaPemohon1' => $this->input->post('namaPemohon1'),
                        'nim1' => $this->input->post('nim1'),
                        'jurusan1' => $this->input->post('jurusan1'),

                        'namaPemohon2' => $this->input->post('namaPemohon2'),
                        'nim2' => $this->input->post('nim2'),
                        'jurusan2' => $this->input->post('jurusan2'),

                        'namaPemohon3' => $this->input->post('namaPemohon3'),
                        'nim3' => $this->input->post('nim3'),
                        'jurusan3' => $this->input->post('jurusan3'),

                        'statusSurat' => $this->input->post('statusSurat'),
                        'tglMulai' => $this->input->post('tglMulai'),
                        'tglAkhir' => $this->input->post('tglAkhir'),
                        'divisi' => $this->input->post('divisi'),
                        'namaPembimbing' => $this->input->post('namaPembimbing'),
                        'ttd_digital' => $this->input->post('old_ttd_digital'),
                    );
                    
                    $this->db->set($data);
                    $this->db->where('idSurat', $idSurat);
                    $this->db->update('suratbalasan');
                    redirect('Administrator');
            }else if($this->input->post('jumlahPemohon') == 4){
                    $data = array(
                        'nomorSuratBalasan' => $this->input->post('nomorSuratBalasan'),
                        'asalSekolahPemohon' => $this->input->post('asalSekolahPemohon'),
                        'tglDibuat' => $this->input->post('tglDibuat'),
                        'nomorSuratMou' => $this->input->post('nomorSuratMou'),
                        'tglSuratMou' => $this->input->post('tglSuratMou'),
                        'statusPemohon' => $this->input->post('statusPemohon'),
                        'jumlahPemohon' => $this->input->post('jumlahPemohon'),
                        
                        'namaPemohon1' => $this->input->post('namaPemohon1'),
                        'nim1' => $this->input->post('nim1'),
                        'jurusan1' => $this->input->post('jurusan1'),

                        'namaPemohon2' => $this->input->post('namaPemohon2'),
                        'nim2' => $this->input->post('nim2'),
                        'jurusan2' => $this->input->post('jurusan2'),

                        'namaPemohon3' => $this->input->post('namaPemohon3'),
                        'nim3' => $this->input->post('nim3'),
                        'jurusan3' => $this->input->post('jurusan3'),

                        'namaPemohon4' => $this->input->post('namaPemohon4'),
                        'nim4' => $this->input->post('nim4'),
                        'jurusan4' => $this->input->post('jurusan4'),
                        
                        'statusSurat' => $this->input->post('statusSurat'),
                        'tglMulai' => $this->input->post('tglMulai'),
                        'tglAkhir' => $this->input->post('tglAkhir'),
                        'divisi' => $this->input->post('divisi'),
                        'namaPembimbing' => $this->input->post('namaPembimbing'),
                        'ttd_digital' => $this->input->post('old_ttd_digital'),

                    );
                    
                    $this->db->set($data);
                    $this->db->where('idSurat', $idSurat);
                    $this->db->update('suratbalasan');
                    redirect('Administrator');
            }else if($this->input->post('jumlahPemohon') == 5){
                    $data = array(
                        'nomorSuratBalasan' => $this->input->post('nomorSuratBalasan'),
                        'asalSekolahPemohon' => $this->input->post('asalSekolahPemohon'),
                        'tglDibuat' => $this->input->post('tglDibuat'),
                        'nomorSuratMou' => $this->input->post('nomorSuratMou'),
                        'tglSuratMou' => $this->input->post('tglSuratMou'),
                        'statusPemohon' => $this->input->post('statusPemohon'),
                        'jumlahPemohon' => $this->input->post('jumlahPemohon'),
                        
                        'namaPemohon1' => $this->input->post('namaPemohon1'),
                        'nim1' => $this->input->post('nim1'),
                        'jurusan1' => $this->input->post('jurusan1'),

                        'namaPemohon2' => $this->input->post('namaPemohon2'),
                        'nim2' => $this->input->post('nim2'),
                        'jurusan2' => $this->input->post('jurusan2'),

                        'namaPemohon3' => $this->input->post('namaPemohon3'),
                        'nim3' => $this->input->post('nim3'),
                        'jurusan3' => $this->input->post('jurusan3'),

                        'namaPemohon4' => $this->input->post('namaPemohon4'),
                        'nim4' => $this->input->post('nim4'),
                        'jurusan4' => $this->input->post('jurusan4'),

                        'namaPemohon5' => $this->input->post('namaPemohon5'),
                        'nim5' => $this->input->post('nim5'),
                        'jurusan5' => $this->input->post('jurusan5'),
                        
                        'statusSurat' => $this->input->post('statusSurat'),
                        'tglMulai' => $this->input->post('tglMulai'),
                        'tglAkhir' => $this->input->post('tglAkhir'),
                        'divisi' => $this->input->post('divisi'),
                        'namaPembimbing' => $this->input->post('namaPembimbing'),
                        'ttd_digital' => $this->input->post('old_ttd_digital'),

                    );
                
                $this->db->set($data);
                $this->db->where('idSurat', $idSurat);
                $this->db->update('suratbalasan');

                redirect('Administrator');

            }

        }

        

         // Memuat library Upload
            // $config['upload_path'] = './assets/img/QrCode';
            // $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
            // $config['max_size']     = '600000';
            // $config['max_width'] = '10240';
            // $config['max_height'] = '10000';

            // $this->load->library('upload', $config);

            
            // if ($this->upload->do_upload('ttd_digital')) {
            //     $upload_data = $this->upload->data();
            //     $ttd = $upload_data['file_name'];
                
            // } else {
            //     $error = $this->upload->display_errors();
            //     echo "Gagal mengunggah file: " . $error;
            // }
    }

    public function GetPemohon(){
        
        $id = $this->input->post('id');

        // $response = array(
        //     'userData' => 'Data yang dikirim: ' . $id
        // );

        $response = array(
            'status' => 200,
            'userData' => $this->db->get_where('user', ['id' => $id])->row_array()
        );
        
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function updateProfile(){
        $idUser = $this->input->post('idUser');
        if(empty($_FILES['gambarProfil']['name'])){
            $data = array(
                'nim' => $this->input->post('nim'),
                'namaLengkap' => $this->input->post('namaLengkap'),
                'email' => $this->input->post('email'),
                'noTelp' => $this->input->post('noTelp'),
                'jurusan' => $this->input->post('jurusan'),
            );
                 
            $this->db->set($data);
            $this->db->where('id', $idUser);
            $query = $this->db->update('user');
        }else{
            $config['upload_path'] = './assets/img/user';
            $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
            $config['max_size']     = '600000';
            $config['max_width'] = '10240';
            $config['max_height'] = '10000';

            $this->load->library('upload', $config);

            
            if ($this->upload->do_upload('gambarProfil')) {
                $upload_data = $this->upload->data();
                $profile = $upload_data['file_name'];
             
                $data = array(
                    'nim' => $this->input->post('nim'),
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'email' => $this->input->post('email'),
                    'noTelp' => $this->input->post('noTelp'),
                    'jurusan' => $this->input->post('jurusan'),
                    'profile' => $profile,
                );
                     
                $this->db->set($data);
                $this->db->where('id', $idUser);
                $query = $this->db->update('user');

            } else {
                $error = $this->upload->display_errors();
                echo "Gagal mengunggah file: " . $error;
            }
        }


        
        if($query){
            redirect('Administrator');
        }else{
            var_dump("Gagal Update");
            die();
        }


    }

    public function getDivisi(){

        $this->userModels->security();

        $hasil = $this->divisiModels->getDataTable();
        
        $data = [];
        $no = $_POST['start'] + 1;

        foreach($hasil as $result){
            
            if($result->idDivisi != 4 && $result->idDivisi != 5){
                $row = array();
                $row[] = $no++;
                $row[] = $result->namaDivisi;
                $row[] = $result->lokasiDivisi;
                $row[] = "<div class='row gap-2'>
                            <button type='button' onclick='aksiDivisi($result->idDivisi, 1)' class='btn btn-success col'><i class='fa-solid fa-pencil'></i></button>
                            <button type='button' onclick='aksiDivisi($result->idDivisi, 2)' class='btn btn-danger col'><i class='fa-solid fa-trash-can'></i></i></button>
                          </div>";

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->divisiModels->count_all_data(),
            "recordsFiltered" => $this->divisiModels->count_filtered_data(),
            "data" => $data,
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($output));

    } 

    public function ControlDivisi(){
        // var_dump($this->input->post());
        // die();

        if($this->input->get('Page') == "Insert"){
            
            $data = array(
                'namaDivisi' => $this->input->post('namaDivisi'),
                'lokasiDivisi' => $this->input->post('lokasiDivisi'),
            );

            $query = $this->db->insert('divisi', $data);

            if($query){
                $this->session->set_Flashdata('success', 'suratSuccess');
                redirect('Administrator');
            }else{
                $this->session->set_Flashdata('error', 'gagal');
                redirect('Administrator');
            }
            

        }else if($this->input->get('Page') == "Edit"){

            $idDivisi = $this->input->post('idDivisi');

            $data = array(
                'namaDivisi' => $this->input->post('namaDivisi'),
                'lokasiDivisi' => $this->input->post('lokasiDivisi'),
            );

            $this->db->set($data);
            $this->db->where('idDivisi', $idDivisi);
            $query = $this->db->update('divisi');

            if($query){
                $this->session->set_Flashdata('success', 'suratSuccess');
                redirect('Administrator');
            }else{
                $this->session->set_Flashdata('error', 'gagal');
                redirect('Administrator');
            }
            
        }else if($this->input->get('Page') == "GetUpdate"){

            $idDivisi = $this->input->post('idDivisi');

            $response = array(
                'status' => 200,
                'data' => $this->db->get_where('divisi', ['idDivisi' => $idDivisi])->row_array(),
            );
    
            
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }else if($this->input->get('Page') == "HapusDivisi"){
            
            $this->db->where('idDivisi', $this->input->post('idHapus'));
	        $query = $this->db->delete('divisi');

            if($query){
                $this->session->set_Flashdata('success', 'suratSuccess');
                redirect('Administrator');
            }else{
                $this->session->set_Flashdata('error', 'gagal');
                redirect('Administrator');
            }

        }

    }

    public function DetailPenilaian(){

        $idPenilaian = $this->input->get('idPenilaian');

        $this->db->select('penilaian.*, user.nim, user.namaLengkap, user.jurusan, user.asalSekolah');
        $this->db->from('penilaian');
        $this->db->join('user', 'user.id = penilaian.idUser', 'left');
        $this->db->where('penilaian.id_penilaian', $idPenilaian);

        $query = $this->db->get()->result();

        $data['query'] = $query;
        
        $this->load->view('templates/pages/DetailPenilaian', $data);

        $paper_size = "A4";
        $orientation = "Landscape";
        $html = $this->output->get_output();

        $pdf = new Dompdf();
        $pdf->set_option('isRemoteEnabled', TRUE);
        $pdf->setPaper($paper_size, $orientation);
        $pdf->loadHtml($html);
        $pdf->render();

        $pdf->stream('Penilaian & Sertifikat.pdf', ['Attchment' => 0]);

    }

}