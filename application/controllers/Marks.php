<?php

// Prevents direct script access
defined("BASEPATH") or exit("No direct script access allowed");

class Marks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MarksModel');
        $this->load->helper("form");
        $this->load->helper("url");
        // Load your marks model here when you create it
        // $this->load->model('MarksModel');
    }

    public function insert(){
        if (!$this->session->userdata('email')) {
            redirect('login');
        }

        if ($this->session->userdata('role') != 'teacher') {
            redirect("/");
        }

        // This method shows the insert form
        $this->load->view("marks/insert");
    }

    public function store(){
        $data = $this->input->post();
        $this->MarksModel->insert_data($data);
    }
}
