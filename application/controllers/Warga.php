<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('role') != 'warga') {
            redirect('auth/login');
        }
    }
    
    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['pengaduan'] = $this->Pengaduan_model->get_by_user($user_id);
        $this->load->view('warga/dashboard', $data);
    }

    public function buat_laporan() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('judul', 'Judul Pengaduan', 'required');
            $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');
    
            if ($this->form_validation->run()) {
                $data = [
                    'user_id' => $this->session->userdata('user_id'),
                    'judul' => $this->input->post('judul'),
                    'isi_laporan' => $this->input->post('isi_laporan'),
                    'status' => 'baru',
                ];
    
                if ($this->Pengaduan_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Laporan berhasil dikirim');
                    redirect('warga/list_pengaduan'); // Redirect ke daftar pengaduan setelah submit
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengirim laporan');
                }
            }
        }
    
        $this->load->view('warga/form_pengaduan');
    }

    public function get_pengaduan_by_user($user_id) {
        return $this->db->where('user_id', $user_id)
                        ->get('pengaduan')
                        ->result_array();
    }

    public function form_pengaduan() {
        $this->load->view('templates/header');
        $this->load->view('warga/form_pengaduan');
        $this->load->view('templates/footer');
    }
    
    public function list_pengaduan() {
        $user_id = $this->session->userdata('user_id');
        $data['pengaduan'] = $this->Pengaduan_model->get_by_user($user_id);
    
        $this->load->view('templates/header');
        $this->load->view('warga/list_pengaduan', $data);
        $this->load->view('templates/footer');
    }    
}
?>
