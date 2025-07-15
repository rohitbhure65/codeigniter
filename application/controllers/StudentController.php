<?php 

defined("BASEPATH") or exit("No direct script access allowed");

class StudentController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'student') redirect('login');
        $this->load->model('StudentModel');
        $this->load->model('MarksModel');
    }

    public function dashboard() {
        $user_email = $this->session->userdata('email');
        $student = $this->StudentModel->get_student_by_email($user_email);
        $marks = $this->MarksModel->get_marks_with_subjects($user_email);
        $this->load->view('student/dashboard', compact('student', 'marks'));
    }
}