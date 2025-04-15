<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') != 'warga') {
            redirect('auth/login');
        }
        $this->load->model('Pengaduan_model');
        $this->load->library('form_validation'); 
    }

    public function index() {
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required', [
            'required' => 'Pengaduan tidak boleh kosong!' 
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['pengaduan'] = $this->Pengaduan_model->get_by_user($this->session->userdata('user_id')); 

            $this->load->view('templates/header');
            $this->load->view('warga/dashboard');
            // $this->load->view('warga/form_pengaduan', $data); 
            // $this->load->view('warga/list_pengaduan', $data); 
            $this->load->view('templates/footer');
        } else {
            $data = [
                'user_id' => $this->session->userdata('user_id'),
                'isi_laporan' => $this->input->post('isi_laporan'),
                'status' => 'baru'
            ];

            $this->Pengaduan_model->insert($data); 
            $this->session->set_flashdata('success', 'Laporan berhasil dikirim!'); 
            redirect('pengaduan'); 
        }
    }
}
