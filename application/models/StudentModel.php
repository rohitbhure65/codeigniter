<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    // Insert new Student
    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    public function create_student($user_id) {
        return $this->db->insert('students', ["user_id" => $user_id])->row();
    }
}