<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
    }

    public function profile($user_id = null){
        $data = [];
        if ($user_id !== null) {
            $this->load->model('StudentModel');
            $student = $this->StudentModel->get_student_by_user_id($user_id);
            if ($student) {
                $data['student'] = $student;
            }
        }
        $this->load->view('student/profile', $data);
    }
    
    public function create() {
        $user_id = $this->session->userdata("user_id");
        if (!$user_id) {
            $this->session->set_flashdata('error', 'User ID not found in session');
            redirect('student/profile');
            return;
        }

        $insert_id = $this->StudentModel->create_student($user_id);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Student created successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to create student');
        }
        redirect('student/profile');
    }
}