<?php
defined("BASEPATH") or exit("No direct script access allowed");

class MarksModel extends CI_Model {
    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    public function update_marks($id, $data) {
        return $this->db->where('id', $id)->update('marks', $data);
    }

    public function get_marks_by_student_id($student_id) {
        return $this->db->get_where('marks', ['student_id' => $student_id])->result();
    }

    public function get_marks_with_subjects($student_id) {
        $this->db->select('marks.*, subjects.name AS subject_name');
        $this->db->from('marks');
        $this->db->join('subjects', 'marks.subject_id = subjects.id');
        $this->db->where('marks.student_id', $student_id);
        return $this->db->get()->result();
    }
}
