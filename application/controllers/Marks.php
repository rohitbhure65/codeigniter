<?php

// Prevents direct script access
defined("BASEPATH") or exit("No direct script access allowed");

class Marks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

        if ($this->session->userdata('role') != 'teacher') {
            redirect("access_denied");
        }else{
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

    public function insert($id){
        $data = [];
        $data["user"] = $this->MarksModel->get_user($id);
        $this->load->view("marks/insert", $data);
    }


    public function store($id){
        $data = $this->input->post();
        $data['student_id'] = $id;
        $this->MarksModel->insert_marks($data);
        redirect('marks');
    }


    public function edit($id){
        $this->load->view("marks/edit", ["id" => $id]); 
    }
}