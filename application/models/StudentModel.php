<?php
defined("BASEPATH") or exit("No direct script access allowed");

class StudentModel extends CI_Model {
    public function get_student_by_id($id) {
        return $this->db->get_where('students', ['id' => $id])->row();
    }

    public function get_all_students() {
        return $this->db->get('students')->result();
    }

    public function insert_student($data) {
        return $this->db->insert('students', $data);
    }

    public function update_student($id, $data) {
        return $this->db->where('id', $id)->update('students', $data);
    }

    public function delete_student($id) {
        return $this->db->where('id', $id)->delete('students');
    }
}