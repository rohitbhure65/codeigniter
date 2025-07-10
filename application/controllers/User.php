<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('users/index', $data);
    }

    public function create() {
        $this->load->view('users/create');
    }

    public function store() {
        $data = $this->input->post();
        $this->User_model->insert_user($data);
        redirect('user');
    }

    public function edit($id) {
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('users/edit', $data);
    }

    public function update($id) {
        $data = $this->input->post();
        $this->User_model->update_user($id, $data);
        redirect('user');
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user');
    }
}
