<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');

	}

	public function index()
	{
		redirect('admin/login');
	}

	public function login()
	{
		// Metadata
		$data['title']          = "Login | I'm a Medical Tourist";
		$data['description']    = "Here is the description pleeeeeeeese!";
		$data['content']        = "pages/admin/login";

		$this->load->view('layout/main', $data);          
	}

	public function login_validation()
	{
		$this->load->library('form_validation');

		// Validation Rules
		$this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

		if ($this->form_validation->run()) {
			$data = array(
				'email'           => $this->input->post('email'),
				'is_logged_in'    => 1
			);

			$this->session->set_userdata($data);
			redirect('admin/users');
		} 
		else{
			// Metadata
			$data['title']          = "Errors :(";
			$data['description']    = "Here is the description pleeeeeeeese!";
			$data['content']        = "pages/admin/login";

			$this->load->view('layout/main', $data); 
		}

	}


	public function Validate_credentials()
	{
		
		$this->load->model('user_model');

		if ($this->user_model->can_login()) {
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect email/password');
			return false;
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	// creo que esto va para otro controlador

	public function signup()
	{
		// Metadata
		$data['title']          = "Sign Up | I'm a Medical Tourist";
		$data['description']    = "Here is the description pleeeeeeeese!";
		$data['content']        = "pages/admin/signup";

		$this->load->view('layout/main', $data); 

	}

	public function signup_validation()
	{
		$this->load->library('form_validation');

		// Validation Rules
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');

		$this->form_validation->set_message('is_unique', "That email address already exists!");

		if ($this->form_validation->run()) {
			
			$key = md5(uniqid());

		$this->load->library('email', $config);
		$this->load->model('user_model');

		$this->email->from('user@imedicaltourist.com', 'imedicaltourist');
    $this->email->to($this->input->post('email'));
    $this->email->subject('Please confirm your account');

    $message = "<p>Thank you for sign up!</p>";
    $message .= "<p><a href=' ".base_url()."admin/register_user/$key'>Click here</a> to confirm your account</p>";

    $this->email->message($message);

    	// Send and email to the user
    	if ($this->user_model->add_temp_user($key)) {
		    if ($this->email->send()) {
		    	// Metadata
					$data['title']          = "The email has been sent!";
					$data['description']    = "Here is the description pleeeeeeeese!";
					$data['content']        = "pages/admin/post";

					$this->load->view('layout/main', $data); 
		    } else{
		    	// Metadata
					$data['msg_signup']      = "Could not sent";
					$data['title']          = "Could not sent";
					$data['description']    = "Here is the description pleeeeeeeese!";
					$data['content']        = "pages/admin/signup";

					$this->load->view('layout/main', $data); 
		    }
    	} else{
    		// Metadata
				$data['msg_signup']      = "Problem adding to database";
				$data['title']          = "Problem adding to database";
				$data['description']    = "Here is the description pleeeeeeeese!";
				$data['content']        = "pages/admin/signup";

				$this->load->view('layout/main', $data); 
    	}

		} 
		else{
			// Metadata
			$data['title']          = "Errors :(";
			$data['description']    = "Here is the description pleeeeeeeese!";
			$data['content']        = "pages/admin/signup";

			$this->load->view('layout/main', $data); 
		}

	}

	public function Register_user($key)
	{
		$this->load->model('user_model');

		if ($this->user_model->is_key_valid($key)) {
				if ($newemail = $this->user_model->add_user($key)) {

					$data = array(
						'email'           => $newemail,
						'is_logged_in'    => 1
					);

					$this->session->set_userdata($data);
					// Metadata
					$data['msg_confirm']    = "Sign Up Confirmed";
					$data['title']          = "Sign Up Confirmed";
					$data['description']    = "Here is the description pleeeeeeeese!";
					$data['content']        = "pages/admin/confirm";

					$this->load->view('layout/main', $data); 
				} else{
					// Metadata
					$data['msg_confirm_error']    = "Failed to add user, please try again";
					$data['title']          = "Failed to add user, please try again";
					$data['description']    = "Here is the description pleeeeeeeese!";
					$data['content']        = "pages/admin/confirm";

					$this->load->view('layout/main', $data); 
				}
		}else{
			// Metadata
			$data['msg_confirm_error_key']    = "Invalid key";
			$data['title']          = "Failed to add user, please try again";
			$data['description']    = "Here is the description pleeeeeeeese!";
			$data['content']        = "pages/admin/confirm";

			$this->load->view('layout/main', $data); 
		}

	}

	// CRUD
	public function users()
	{

		if ($this->session->userdata('is_logged_in')) { // check session login

			$crud = new grocery_CRUD();
			$crud->set_table('user_profiles');
			$crud->set_subject('New User');

			$crud->required_fields('user_id','first_name','last_name','email');
			$crud->set_rules('email','Email','is_unique[user_profiles.email]');
			$crud->set_rules('user_id','User ID','is_unique[user_profiles.user_id]');

			$crud->edit_fields('first_name','last_name','email');

			$output = $crud->render();
			$this->load->view('pages/admin/users.php', $output);
		}
		else{
			redirect('admin/login');
		}

	}

	public function lista()
	{
		// Metadata
			// $query = $this->db->query('SELECT * FROM users');
			// $row = $query->row_array();

			// $data = array(
			// 	'email'           => $this->input->post('email'),
			// 	'name'           => $query->row_array()
			// );
			// $data['query'] = $this->db->query("SELECT * FROM users;");

			$this->load->model('user_model');

			$data['query'] = $this->user_model->get_data();
			$data['title']          = "Errors :(";
			$data['description']    = "Here is the description pleeeeeeeese!";
			$data['content']        = "pages/admin/list_demo";

			$this->load->view('layout/main', $data); 
	}

}