<?php 

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
    
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == false){
            $data['title'] = 'Login';

            $this->load->view('templates/header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');           
        }else{
           
            $this->auth_login();
        }

    }
    // $roleId = 'admin'; // Gantilah dengan nilai yang sesuai

    // // Buat token sesi
    // $token = bin2hex(random_bytes(16)); // Ini adalah contoh token acak
    
    private function auth_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        // Kondisi untuk cek sudah terdaftar atau belum
        if($user){
            
            // Aktivasi Akun
            if($user['isActive'] == "1"){
                
                // Cek Password
                if(password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'roleId' => $user['roleId']
                    ];
                    
                    $this->session->set_userdata($data);
                    $this->load->library('session');

                    // Hak Akses
                    // if($user['roleId'] == 1){
                       
                        redirect('Administrator');
                    // }else if($user['roleId'] == 2){
                        
                    // }else if($user['roleId'] == 3){
                        
                        // redirect('user');
                    // }

                }else{
                    $this->session->set_Flashdata('message', 'passwordSalah');
                    redirect('/'); 
                }

            }else{
                $this->session->set_Flashdata('message', 'TidakAktive');
                redirect('/'); 
            }

        }else{
            $this->session->set_Flashdata('message', 'tidakTerdaftar');
            redirect('/');
        }

    }


    public function auth_regist(){

        $this->form_validation->set_rules('nim', 'nim', 'required|trim');
        $this->form_validation->set_rules('namaLengkap', 'namaLengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('noTelp', 'noTelp', 'required|trim');
        

        if($this->form_validation->run() == false){

            $this->session->set_Flashdata('message', 'gagal');
            redirect('/');

        }else{

            $data = [
                'nim' => $this->input->post('nim', 'true'),
                'namaLengkap' => htmlspecialchars($this->input->post('namaLengkap', 'true')),
                'email' => htmlspecialchars($this->input->post('email', 'true')),
                'noTelp' => $this->input->post('noTelp', 'true'),
                'password' => password_hash($this->input->post('password', 'true'), PASSWORD_DEFAULT),
                'alamatRumah' => htmlspecialchars($this->input->post('alamatRumah', 'true')),
                'asalSekolah' => htmlspecialchars($this->input->post('asalSekolah', 'true')),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', 'true')),
                'divisi' => 4,
                'kehadiran' => 0,
                'roleId' => 3,
                'statusUser' => htmlspecialchars($this->input->post('statusUser', 'true')),
                'isActive' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $insert = $this->db->insert('user', $data);

            if($insert){
                $this->session->set_Flashdata('message', 'berhasil');
                redirect('/');
            }else{
                $this->session->set_Flashdata('message', 'gagal');
                redirect('/');
            }

        }
    }

    // Logout
    public function logout(){
        // var_dump($this->session->userdata('roleId'));
        // die();
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('roleId');

        $this->session->sess_destroy();

        $this->session->set_flashdata('message', 'keluar');
        redirect('/');

    }

    // Quesioner
    public function quesioner(){
            
            $this->load->view('quesioner/quest');

    }

}