<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    // Insert new Student
    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    public function create_student() {
        return $this->db->insert('students', ["user_id" => $this->session->userdata("user_id")]);
        
    }

    public function get_student_by_user_id($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('students');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return null;
    }
}
