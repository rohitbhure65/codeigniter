<?php
// Prevents direct script access
defined("BASEPATH") or exit("No direct script access allowed");

// Defines the User controller, extending CodeIgniter's base controller
class User extends CI_Controller
{
	// Displays the list of users
	public function index()
	{
		$data["users"] = $this->User_model->get_all_users();
		$this->load->view("users/index", $data);
	}

	// Shows the form to create a new user
	public function register()
	{
		$this->load->helper("form");
		$this->load->view("users/register");
	}

	// Handles form submission for creating a new user
	public function store()
	{
		$this->load->library("form_validation");
		$this->load->helper("form");
		$this->form_validation->set_rules(
			"name",
			"Name",
			"required|min_length[3]"
		);
		$this->form_validation->set_rules(
			"password",
			"Password",
			"required|min_length[8]|trim"
		);
		$this->form_validation->set_rules(
			"email",
			"Email",
			"required|valid_email|is_unique[users.email]"
		);
		$this->form_validation->set_rules(
			"phone",
			"Phone",
			"required|numeric|is_unique[users.phone]|min_length[10]|max_length[10]"
		);
		$this->form_validation->set_rules("address", "Address", "required");
		$this->form_validation->set_rules("gender", "Gender", "required");
		$this->form_validation->set_rules("dob", "DOB", "required");

		if ($this->form_validation->run() == false) {
			$this->load->view("users/register");
		} else {
			// $data = $this->input->post(); // insted of this we can also create using associative array
			$data = [
				"name" => $this->input->post("name"),
				"email" => $this->input->post("email"),
				"password" => password_hash($this->input->post("password"), PASSWORD_BCRYPT),
				"phone" => $this->input->post("phone"),
				"address" => $this->input->post("address"),
				"gender" => $this->input->post("gender"),
				"dob" => $this->input->post("dob"),
			];
			$this->User_model->insert_user($data);
			redirect("user");
		}
	}

	// Shows the form to edit an existing user
	public function edit($id)
	{
		$this->load->helper("form");
		$data["user"] = $this->User_model->get_user($id);
		$this->load->view("users/edit", $data);
	}

	// Handles form submission for updating a user
	public function update($id)
	{
		$this->load->library("form_validation");
		$this->load->helper("form");
		$this->form_validation->set_rules(
			"name",
			"Name",
			"required|min_length[3]"
		);
		$this->form_validation->set_rules(
			"email",
			"Email",
			"required|valid_email"
		);
		$this->form_validation->set_rules(
			"phone",
			"Phone",
			"required|numeric|min_length[10]|max_length[10]"
		);
		$this->form_validation->set_rules("address", "Address", "required");
		$this->form_validation->set_rules("gender", "Gender", "required");
		$this->form_validation->set_rules("dob", "DOB", "required");

		if ($this->form_validation->run() == false) {
			$data["user"] = $this->User_model->get_user($id);
			$this->load->view("users/edit", $data);
		} else {
			$data = $this->input->post();
			$this->User_model->update_user($id, $data);
			redirect("user");
		}
	}

	// Deletes a user by ID
	public function delete($id)
	{
		$this->User_model->delete_user($id);
		redirect("user");
	}
}
