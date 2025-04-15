<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_user($username) {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }
}
