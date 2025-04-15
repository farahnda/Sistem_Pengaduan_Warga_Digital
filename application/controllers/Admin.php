<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Pengaduan_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');  
    }

    public function index() {
        $this->db->select('pengaduan.*, users.username');
        $this->db->from('pengaduan');
        $this->db->join('users', 'pengaduan.user_id = users.id');
        $data['pengaduan'] = $this->db->get()->result_array(); 
        
        if (!$data['pengaduan']) {
            $this->session->set_flashdata('error', 'Tidak ada pengaduan untuk ditampilkan!');
        }

        $this->load->view('templates/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function ubah_status($id) {
        if (!$id) {
            show_404(); 
        }
        $pengaduan = $this->Pengaduan_model->get_by_id($id);
        
        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan');
            redirect('admin');
        }
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('respon', 'Respon', 'required');
        
            if ($this->form_validation->run()) {
                $data = [
                    'status' => $this->input->post('status'),
                    'respon' => $this->input->post('respon')
                ];
        
                if ($this->Pengaduan_model->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Status dan respon berhasil diperbarui');
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui status dan respon');
                }
            }
        }
        
        $data['pengaduan'] = $pengaduan;
        $this->load->view('admin/ubah_status', $data);
    }
}
