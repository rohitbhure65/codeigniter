<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
    }

    public function profile(){
        $this->load->view('student/profile');
    }
    
    public function create() {
        if ($this->StudentModel->create_student($this->session->userdata("user_id"))) {
            $this->session->set_flashdata('success', 'Student created successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to create student');
        }
        redirect('student/profile');
    }
}
