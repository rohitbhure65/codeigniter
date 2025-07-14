<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_users() {
        $this->db->select('users.*,students.*,students.class, students.section, subjects.name AS subject_name,marks.marks');
        $this->db->from('users');
        $this->db->join('students', 'users.id = students.user_id', 'left');
        $this->db->join('marks', 'users.id = marks.student_id', 'left');
        $this->db->join('subjects', 'marks.subject_id = subjects.id', 'left');
        $this->db->where('users.role', 'student' );
        $query = $this->db->get();
        return $query->result_array();
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
