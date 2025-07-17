<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarksModel extends CI_Model {

    // Get all users with their marks
    public function get_all_users() {
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
        ORDER BY u.id, st.id
        ";

        return $this->db->query($sql)->result_array();
    }

    // Get a single user (student) by roll_no
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


    // Insert new marks
    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    // Update existing marks by marks table ID
    public function update_marks($student_id, $data) {
        return $this->db->where('$student_id', $student_id)->update('marks', $data);
    }


}
