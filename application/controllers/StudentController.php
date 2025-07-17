<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
    }

    public function index(){
        $this->load->view('student/profile');
    }
    // Insert new Student
    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

}