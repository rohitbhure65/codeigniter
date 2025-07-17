<?php
defined("BASEPATH") or exit("No direct script access allowed");

class MarksModel extends CI_Model {

    	public function get_all_users()
	{
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
    m.`social science`
FROM
    users u
JOIN students st ON
    u.id = st.user_id
LEFT JOIN marks m ON
    st.id = m.student_id
GROUP BY
    u.id,
    st.id,
    u.name,
    u.email,
    u.phone,
    u.address,
    u.gender,
    u.dob,
    st.roll_no,
    st.section,
    st.class,
    m.science,
    m.mathematics,
    m.hindi,
    m.english,
    m.`social science`
ORDER BY
    u.id,
    st.id;
    ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

public function get_user($id)
{
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
        m.`social science`
    FROM
        users u
    JOIN students st ON
        u.id = st.user_id
    LEFT JOIN marks m ON
        st.id = m.student_id
    WHERE
        st.roll_no = $id
    GROUP BY
        u.id,
        st.id,
        u.name,
        u.email,
        u.phone,
        u.address,
        u.gender,
        u.dob,
        st.roll_no,
        st.section,
        st.class,
        m.science,
        m.mathematics,
        m.hindi,
        m.english,
        m.`social science`
    ORDER BY
        u.id,
        st.id
    ";

    $query = $this->db->query($sql, [$id]);
    return $query->row_array();
}

    public function insert_marks($data) {
        return $this->db->insert('marks', $data);
    }

    public function update_marks($id, $data) {
        return $this->db->where('id', $id)->update('marks', $data);
    }
}
