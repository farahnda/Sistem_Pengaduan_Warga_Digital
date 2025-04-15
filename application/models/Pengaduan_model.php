<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model {
    public function insert($data) {
        return $this->db->insert('pengaduan', $data);
    }

    public function get_by_user($user_id) {
        $this->db->select('id, judul, isi_laporan, status, respon');
        $this->db->from('pengaduan');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all() {
        return $this->db->get('pengaduan')->result_array();
    }

    public function update($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('pengaduan', $data);
    }

    public function get_pengaduan_by_user($user_id) {
    return $this->db->where('user_id', $user_id) 
                    ->get('pengaduan') 
                    ->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('pengaduan', ['id' => $id]);
    return $query->row_array();
    }
}
