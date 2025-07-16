<?php
defined("BASEPATH") or exit("No direct script access allowed");

class SubjectModel extends CI_Model {
    public function get_subject_by_id($id) {
        return $this->db->get_where('subjects', ['id' => $id])->row();
    }

    public function get_all_subjects() {
        return $this->db->get('subjects')->result();
    }

    public function insert_subject($data) {
        return $this->db->insert('subjects', $data);
    }

    public function update_subject($id, $data) {
        return $this->db->where('id', $id)->update('subjects', $data);
    }

    public function delete_subject($id) {
        return $this->db->where('id', $id)->delete('subjects');
    }
}