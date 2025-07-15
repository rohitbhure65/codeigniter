<?php
defined("BASEPATH") or exit("No direct script access allowed");

class User_model extends CI_Model
{
	public function get_all_users()
	{
		$sql = "
    SELECT 
    u.name AS student_name,
    u.email,
    u.phone,
    u.address,
    u.gender,
    u.dob,
    st.*,
    MAX(CASE WHEN s.name = 'SCIENCE' THEN m.marks END) AS science_marks,
    MAX(CASE WHEN s.name = 'ENGLISH' THEN m.marks END) AS english_marks
FROM marks m
JOIN students st ON m.student_id 
JOIN users u ON st.user_id 
JOIN subjects s ON m.subject_id 
GROUP BY st.id, u.name, u.email, u.phone, u.address,u.gender, u.dob, st.section;
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
