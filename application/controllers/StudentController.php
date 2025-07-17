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
    
}
