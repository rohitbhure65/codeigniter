<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Marks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

        if ($this->session->userdata('role') != 'teacher') {
            redirect("access_denied");
        } else {
            $this->load->model('MarksModel');
            $this->load->helper("form");
            $this->load->helper("url");
        }
    }

    public function index() {
        $data = [];
        $data["users"] = $this->MarksModel->get_all_users();
        $this->load->view("teacher/index", $data);
    }

    public function insert($roll_no) {
        $data = [];
        $data["user"] = $this->MarksModel->get_user($roll_no);
        $this->load->view("marks/insert", $data);
    }

    public function store($roll_no) {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('science', 'Science', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
        $this->form_validation->set_rules('mathematics', 'Mathematics', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
        $this->form_validation->set_rules('hindi', 'Hindi', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
        $this->form_validation->set_rules('english', 'English', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');
        $this->form_validation->set_rules('sst', 'SST', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]');

        $student = $this->MarksModel->get_user($roll_no);
        
        if (!$student) {
            show_error('Student not found', 404);
        }

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $student;
            $this->load->view('marks/insert', $data);
        } else {
            $data = [
                'student_id' => $student['student_id'],
                'science' => $this->input->post('science', TRUE),
                'mathematics' => $this->input->post('mathematics', TRUE),
                'hindi' => $this->input->post('hindi', TRUE),
                'english' => $this->input->post('english', TRUE),
                'sst' => $this->input->post('sst', TRUE),
            ];
            $existing = $this->db->get_where('marks', ['student_id' => $student['student_id']])->row();

            if ($existing) {
                $this->MarksModel->update_marks($student['student_id'], $data);
                $this->session->set_flashdata('success', 'Marks updated successfully');
            } else {
                $this->MarksModel->insert_marks($data);
                $this->session->set_flashdata('success', 'Marks added successfully');
            }

            redirect('marks');
        }
    }

    public function edit($id) {
        $this->load->view("marks/edit", ["id" => $id]); 
    }
}