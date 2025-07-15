<?php
// TEACHER ACCESS ONLY //////////////////
class MarksController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') !== 'teacher') {
            redirect('login');
        }
        $this->load->model('MarksModel');
        $this->load->model('SubjectModel');
        $this->load->model('StudentModel');
    }

    public function create() {
        $subjects = $this->SubjectModel->get_all_subjects();
        $students = $this->StudentModel->get_all_students();
        $this->load->view('marks/create', compact('subjects', 'students'));
    }

    public function store() {
        $data = [
            'student_id' => $this->input->post('student_id'),
            'subject_id' => $this->input->post('subject_id'),
            'marks' => $this->input->post('marks')
        ];
        $this->MarksModel->insert_marks($data);
        redirect('teacher/students');
    }

    public function edit($id) {
        $mark = $this->MarksModel->get_mark_by_id($id);
        $subjects = $this->SubjectModel->get_all_subjects();
        $this->load->view('marks/edit', compact('mark', 'subjects'));
    }

    public function update($id) {
        $data = [
            'marks' => $this->input->post('marks')
        ];
        $this->MarksModel->update_marks($id, $data);
        redirect('teacher/students');
    }

    public function delete($id) {
        $this->MarksModel->delete_mark($id);
        redirect('teacher/students');
    }
}
