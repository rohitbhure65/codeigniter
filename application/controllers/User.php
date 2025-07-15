<?php
// Prevents direct script access
defined("BASEPATH") or exit("No direct script access allowed");

// Defines the User controller, extending CodeIgniter's base controller
class User extends CI_Controller
{
	// Displays the list of users
	public function index()
	{
		$data = [];
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
		$this->load->helper("form");

		// Get form data
		$name = $this->input->post("name");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$phone = $this->input->post("phone");
		$address = $this->input->post("address");
		$role = $this->input->post("role");
		$gender = $this->input->post("gender");
		$dob = $this->input->post("dob");

		// Custom validation
		$validation_errors = [];

		// Name validation
		if (empty($name)) {
			$validation_errors["name"] = "Name is required";
		} elseif (strlen($name) < 3) {
			$validation_errors["name"] =
				"Name must be at least 3 characters long";
		}

		// Email validation
		if (empty($email)) {
			$validation_errors["email"] = "Email is required";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$validation_errors["email"] = "Please enter a valid email address";
		} else {
			// Check if email already exists
			$existing_user = $this->User_model->get_user_by_email($email);
			if ($existing_user) {
				$validation_errors["email"] =
					"This email is already registered";
			}
		}

		// Password validation
		if (empty($password)) {
			$validation_errors["password"] = "Password is required";
		} elseif (strlen($password) < 8) {
			$validation_errors["password"] =
				"Password must be at least 8 characters long";
		} elseif (!preg_match("/[A-Z]/", $password)) {
			$validation_errors["password"] =
				"Password must contain at least one uppercase letter";
		} elseif (!preg_match("/[a-z]/", $password)) {
			$validation_errors["password"] =
				"Password must contain at least one lowercase letter";
		} elseif (!preg_match("/[0-9]/", $password)) {
			$validation_errors["password"] =
				"Password must contain at least one number";
		}

		// Phone validation
		if (empty($phone)) {
			$validation_errors["phone"] = "Phone is required";
		} elseif (!is_numeric($phone)) {
			$validation_errors["phone"] = "Phone must contain only numbers";
		} elseif (strlen($phone) != 10) {
			$validation_errors["phone"] = "Phone must be exactly 10 digits";
		}

		// Address validation
		if (empty($address)) {
			$validation_errors["address"] = "Address is required";
		}

		// Role validation
		if (empty($role)) {
			$validation_errors["role"] = "Role is required";
		}

		// Gender validation
		if (empty($gender)) {
			$validation_errors["gender"] = "Gender is required";
		}

		// DOB validation
		if (empty($dob)) {
			$validation_errors["dob"] = "Date of birth is required";
		}

		// If validation errors exist, show them
		if (!empty($validation_errors)) {
			$data = [
				"validation_errors" => $validation_errors,
				"form_data" => [
					"name" => $name,
					"email" => $email,
					"phone" => $phone,
					"address" => $address,
					"role" => $role,
					"gender" => $gender,
					"dob" => $dob,
				],
			];
			$this->load->view("users/register", $data);
			return;
		}

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

		$newdata = [
			"username" => $name,
			"email" => $email,
			"role" => $role,
		];
		$this->session->set_userdata($newdata);

		$this->User_model->insert_user($data);
		redirect("user");
	}

	public function login()
	{
		$this->load->helper("form");
		$this->load->view("users/login");
	}

	public function auth()
	{
		$this->load->library("form_validation");
		$this->load->helper("form");

		$email = $this->input->post("email");
		$password = $this->input->post("password");

		// Custom validation for email and password
		$validation_errors = [];

		// Email validation
		if (empty($email)) {
			$validation_errors["email"] = "Email is required";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$validation_errors["email"] = "Please enter a valid email address";
		}

		// Password validation
		if (empty($password)) {
			$validation_errors["password"] = "Password is required";
		} elseif (strlen($password) < 8) {
			$validation_errors["password"] =
				"Password must be at least 8 characters long";
		}

		// If validation errors exist, show them
		if (!empty($validation_errors)) {
			$data["validation_errors"] = $validation_errors;
			$data["email"] = $email;
			$this->load->view("users/login", $data);
			return;
		}

		// Check if user exists with this email
		$user = $this->User_model->get_user_by_email($email);

		if (!$user) {
			$data["validation_errors"] = [
				"email" => "No account found with this email address",
			];
			$data["email"] = $email;
			$this->load->view("users/login", $data);
			return;
		}

		// Verify password
		if (!password_verify($password, $user->password)) {
			$data["validation_errors"] = ["password" => "Incorrect password"];
			$data["email"] = $email;
			$this->load->view("users/login", $data);
			return;
		}

		// Login successful
		$newdata = [
			"username" => $user->name,
			"email" => $user->email,
			"role" => $user->role,
		];
		$this->session->set_userdata($newdata);
		redirect("user");
	}

	// Shows the form to edit an existing user
	public function edit($id)
	{
		$this->load->helper("form");
		$data = [];
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
			$data = [];
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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("user/index");
	}
}
