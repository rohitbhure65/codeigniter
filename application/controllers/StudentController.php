<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->library('form_validation');
    }

public function profile($user_id = null) {
    // Authentication check
    $logged_in_user = $this->session->userdata('user_id');
    if (!$logged_in_user) {
        redirect('login');
    }
    
    $user_id = $logged_in_user; // Use logged-in user's ID

    // Handle form submission
    if ($this->input->post()) {
        $this->form_validation->set_rules('roll_no', 'Roll No', 'required|max_length[20]');
        $this->form_validation->set_rules('section', 'Section', 'required|max_length[10]');
        $this->form_validation->set_rules('class', 'Class', 'required|max_length[20]');

        if ($this->form_validation->run()) {
            // Validation passed - update profile
            $update_data = [
                'roll_no' => $this->input->post('roll_no'),
                'section' => $this->input->post('section'),
                'class' => $this->input->post('class')
            ];

            if ($this->StudentModel->update_profile($user_id, $update_data)) {
                $this->session->set_flashdata('success', 'Profile updated successfully!');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile');
            }
            redirect('student/profile');
        }
        // If validation fails, it will continue to load the view with errors
    }

    // Load student data
    $data['user'] = $this->StudentModel->get_student_by_user_id($user_id);
    $data['validation'] = $this->form_validation; // Pass validation to view
    
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
        redirect('student/profile');
    }
}