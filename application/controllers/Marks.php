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

    public function insert(){
        // This method shows the insert form 
        $this->load->view("marks/insert");
    }

    public function store(){
        $data = $this->input->post();
        $this->MarksModel->insert_data($data);
    }

    public function edit($id){
        $this->load->view("marks/edit", ["id" => $id]); 
    }
}