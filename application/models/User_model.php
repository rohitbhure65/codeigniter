<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_user($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Deletes a user record by ID
    public function delete_user($id) {
        return $this->db->delete('users', ['id' => $id]);
    }
}
