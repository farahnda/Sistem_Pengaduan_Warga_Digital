<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user($username);

            if ($user && $password == $user['password']) {
                $this->session->set_userdata(['user_id' => $user['id'], 'role' => $user['role']]);
                redirect($user['role'] == 'admin' ? 'admin' : 'pengaduan');
            } else {
                $this->session->set_flashdata('error', 'Login gagal!');
                redirect('auth/login');
            }
        }
        $this->load->view('auth/login');
    }

    public function register() {
        if ($this->input->post()) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'role' => 'warga'
            ];
            $this->User_model->register($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil!');
            redirect('auth/login');
        }
        $this->load->view('auth/register');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

?>