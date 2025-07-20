<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    public function roll_no_exists($roll_no) {
        $this->db->where('roll_no', $roll_no);
        $query = $this->db->get('students');
        return $query->num_rows() > 0;
    }

    public function create_student() {
        $roll_no = $this->input->post('roll_no');
        if ($this->roll_no_exists($roll_no)) {
            return false; // Duplicate roll number
        }
        $data = [
            'user_id' => $this->session->userdata("user_id"),
            'roll_no' => $roll_no,
            'section' => $this->input->post('section'),
            'class' => $this->input->post('class')
        ];
        return $this->db->insert('students', $data);
        
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
