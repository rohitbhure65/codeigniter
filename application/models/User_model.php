<?php
defined("BASEPATH") or exit("No direct script access allowed");

class User_model extends CI_Model
{
	public function get_all_users()
	{
		$sql = "
			SELECT
			u.id as user_id,
			u.name AS student_name,
			u.email,
			u.phone,
			u.address,
			u.gender,
			u.dob,
			st.id as student_id,
			st.roll_no,
			st.section,
			st.class,
			GROUP_CONCAT(
				CONCAT(s.name, ':', m.marks)
				ORDER BY s.name SEPARATOR '|'
			) AS all_marks
		FROM users u
		JOIN students st ON u.id = st.user_id
		LEFT JOIN marks m ON st.id = m.student_id
		LEFT JOIN subjects s ON m.subject_id = s.id
		GROUP BY u.id, st.id
		ORDER BY u.id, st.id
    ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insert_user($data)
	{
		return $this->db->insert("users", $data);
	}

	public function get_user($id)
	{
		return $this->db->get_where("users", ["id" => $id])->row_array();
	}

	public function get_user_by_email($email)
	{
		return $this->db->get_where("users", ["email" => $email])->row();
	}

	public function update_user($id, $data)
	{
		$this->db->where("id", $id);
		return $this->db->update("users", $data);
	}

	// Deletes a user record by ID
	public function delete_user($id)
	{
		return $this->db->delete("users", ["id" => $id]);
	}
}
