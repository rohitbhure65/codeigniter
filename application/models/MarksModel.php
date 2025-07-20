<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarksModel extends CI_Model {

    public function get_all_users($filters = [], $sort = null) {
        $this->db->select("
            u.id AS user_id,
            u.name AS student_name,
            u.email,
            u.phone,
            u.address,
            u.gender,
            u.role,
            u.dob,
            st.id AS student_id,
            st.roll_no,
            st.section,
            st.class,
            m.science,
            m.mathematics,
            m.hindi,
            m.english,
            m.sst,
            (COALESCE(m.science,0) + COALESCE(m.mathematics,0) + COALESCE(m.hindi,0) + COALESCE(m.english,0) + COALESCE(m.sst,0)) AS total_marks
        ");
        $this->db->from('users u');
        $this->db->join('students st', 'u.id = st.user_id');
        $this->db->join('marks m', 'st.id = m.student_id', 'left');
        $this->db->where('u.role', 'student');

        if (!empty($filters['class'])) {
            $this->db->like('st.class', $filters['class']);
        }
        if (!empty($filters['name'])) {
            $this->db->like('u.name', $filters['name']);
        }
        if (!empty($filters['section'])) {
            $this->db->like('st.section', $filters['section']);
        }
        if (!empty($filters['gender'])) {
            $this->db->where('u.gender', $filters['gender']);
        }
        if (!empty($filters['marks'])) {
            $this->db->having('total_marks >=', (int)$filters['marks']);
        }

        if ($sort === 'asc') {
            $this->db->order_by('total_marks', 'ASC');
        } elseif ($sort === 'desc') {
            $this->db->order_by('total_marks', 'DESC');
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user($roll_no) {
        $sql = "
        SELECT
            u.id AS user_id,
            u.name AS student_name,
            u.email,
            u.phone,
            u.address,
            u.gender,
            u.dob,
            st.id AS student_id,
            st.roll_no,
            st.section,
            st.class,
            m.science,
            m.mathematics,
            m.hindi,
            m.english,
            m.sst
        FROM users u
        JOIN students st ON u.id = st.user_id
        LEFT JOIN marks m ON st.id = m.student_id
        WHERE st.roll_no = ?
        LIMIT 1
        ";

        return $this->db->query($sql, [$roll_no])->row_array();
    }


    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }


    public function update_marks($student_id, $data) {
        return $this->db->where('student_id', $student_id)->update('marks', $data);
    }
}