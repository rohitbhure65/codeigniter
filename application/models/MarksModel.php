<?php
defined("BASEPATH") or exit("No direct script access allowed");

class MarksModel extends CI_Model {
    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    public function update_marks($id, $data) {
        return $this->db->where('id', $id)->update('marks', $data);
    }
}
