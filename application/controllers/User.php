<?php
// Prevents direct script access
defined("BASEPATH") or exit("No direct script access allowed");

// Defines the User controller, extending CodeIgniter's base controller
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
		$this->load->library("session");
	}

	// Displays the list of users
	public function index()
	{
		$data = [];
		$data["users"] = $this->User_model->get_all_users();
		$this->load->view("index", $data);
	}

	// Displays the access denied page
	public function access_denied()
	{
		$this->load->view("access_denied");
	}

	// Shows the form to create a new user
	public function register()
	{
		$this->load->helper("form");
		$this->load->view("register");
	}

	// Handles form submission for creating a new user
	public function store()
	{
		$this->load->library("form_validation");
		$this->load->helper("form");

		// Set validation rules
		$this->form_validation->set_rules(
			"name",
			"Name",
			"required|min_length[3]",
		);
		$this->form_validation->set_rules(
			"password",
			"Password",
			"required|min_length[8]|trim",
		);
		$this->form_validation->set_rules(
			"email",
			"Email",
			"required|valid_email|is_unique[users.email]",
		);
		$this->form_validation->set_rules(
			"phone",
			"Phone",
			"required|numeric|is_unique[users.phone]|min_length[10]|max_length[10]",
		);
		$this->form_validation->set_rules("address", "Address", "required");
		$this->form_validation->set_rules(
			"role",
			"Role",
			"required|in_list[student,teacher]",
		);
		$this->form_validation->set_rules(
			"gender",
			"Gender",
			"required|in_list[MALE,FEMALE]",
		);
		$this->form_validation->set_rules("dob", "DOB", "required");

		if ($this->form_validation->run() == false) {
			$this->load->view("register");
		} else {
			// Get form data
			$name = $this->input->post("name");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$phone = $this->input->post("phone");
			$address = $this->input->post("address");
			$role = $this->input->post("role");
			$gender = $this->input->post("gender");
			$dob = $this->input->post("dob");

			// Save user data
			$data = [
				"name" => $name,
				"email" => $email,
				"password" => password_hash($password, PASSWORD_BCRYPT),
				"phone" => $phone,
				"address" => $address,
				"role" => $role,
				"gender" => $gender,
				"dob" => $dob,
			];

			$result = $this->User_model->insert_user($data);

			if ($result) {
				$newdata = [
					"username" => $name,
					"email" => $email,
					"role" => $role,
				];
				$this->session->set_userdata($newdata);
				redirect("user");
			} else {
				$this->session->set_flashdata(
					"error",
					"Registration failed. Please try again.",
				);
				redirect("register");
			}
		}
	}

	public function login()
	{
		$this->load->helper("form");
		$this->load->view("login");
	}

	public function auth()
	{
		$this->load->library("form_validation");
		$this->load->helper("form");

		$email = $this->input->post("email");
		$password = $this->input->post("password");

		// Check if user exists with this email
		$user = $this->User_model->get_user_by_email($email);

		// Check if user exists and verify password
		if (!$user || !password_verify($password, $user->password)) {
			$data["validation_errors"] = ["password" => "Invalid Credentials"];
			$data["email"] = $email;
			$this->load->view("login", $data);
			return;
		} else {
			// Login successful
			$newdata = [
				"username" => $user->name,
				"email" => $user->email,
				"role" => $user->role,
			];
			$this->session->set_userdata($newdata);
			redirect("index");
		}
	}

	// Shows the form to edit an existing user
	public function edit($id)
	{
		$this->load->helper("form");
		$data = [];
		$data["user"] = $this->User_model->get_user($id);
		$this->load->view("edit", $data);
	}

	// Handles form submission for updating a user
	public function update($id)
	{
		$this->load->library("form_validation");
		$this->load->helper("form");
		$this->form_validation->set_rules(
			"name",
			"Name",
			"required|min_length[3]",
		);
		$this->form_validation->set_rules(
			"email",
			"Email",
			"required|valid_email",
		);
		$this->form_validation->set_rules(
			"phone",
			"Phone",
			"required|numeric|min_length[10]|max_length[10]",
		);
		$this->form_validation->set_rules("address", "Address", "required");
		$this->form_validation->set_rules("gender", "Gender", "required");
		$this->form_validation->set_rules("dob", "DOB", "required");

		if ($this->form_validation->run() == false) {
			$data = [];
			$data["user"] = $this->User_model->get_user($id);
			$this->load->view("edit", $data);
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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("index");
	}
}
