<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans_and_benefits extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Metadata
		$data['title']          = "Plans and Benefits";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/plans-and-benefits/index";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('Plans and Benefits', 'plans-and-benefits');
		// Main
		$this->load->view('layout/main', $data);
	
	}

	public function Terms_and_conditions()
	{
		// Metadata
		$data['title']          = "Membership Terms and Conditions";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/plans-and-benefits/terms-and-conditions";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('Plans and Benefits', 'plans-and-benefits');
		$this->breadcrumbs->push('Terms and Conditions', 'plans-and-benefits/terms-and-conditions');
		// Main
		$this->load->view('layout/main', $data);
		
	}

	public function Member_guide()
	{
		// Metadata
		$data['title']          = "I’m a Medical Tourist Guide";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/plans-and-benefits/member-guide";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('Plans and Benefits', 'plans-and-benefits');
		$this->breadcrumbs->push('Member Guide', 'plans-and-benefits/member-guide');
		// Main
		$this->load->view('layout/main', $data);
		
	}

	public function Send_guide()
	{
		$this->load->library('email');
		$this->load->library('form_validation');

		// Validation Rules
		$this->form_validation->set_rules('user_id', 'Number ID', 'required|trim|numeric|callback_validate_credentials');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if ($this->form_validation->run()) {

			$this->email->initialize($config);
			$this->email->from('user@imedicaltourist.com', 'imedicaltourist');
    	$this->email->to($this->input->post('email'));
    	$this->email->subject('im medical tourist');

    	$message = "<p>Thank you!</p>";
    	$message .= "<p><a href=' ".base_url()."uploads/medical-tourist-guide.pdf'>Click here</a> to download Medical Tourist Guide</p>";

    	$this->email->message($message);

    	if ($this->email->send()) {
    		// Metadata
				$data['msg_send']        = "The email has been sent!";
				$data['title']           = "The email has been sent!";
				$data['description']     = "Here is the description pleeeeeeeese!";
				$data['content']         = "pages/plans-and-benefits/member-guide";

				$this->load->view('layout/main', $data); 
    	} else {
    		// Metadata
				$data['msg_send_error']  = "Could not sent";
				$data['title']           = "Could not sent";
				$data['description']     = "Here is the description pleeeeeeeese!";
				$data['content']         = "pages/plans-and-benefits/member-guide";

				$this->load->view('layout/main', $data); 
    	}

		} 
		else{
			// Metadata
			$data['title']          = "Errors :(";
			$data['description']    = "Here is the description pleeeeeeeese!";
			$data['content']        = "pages/plans-and-benefits/member-guide";

			$this->load->view('layout/main', $data); 
		}

	}

	public function Validate_credentials()
	{
		
		$this->load->model('confirm_user_model');

		if ($this->confirm_user_model->can_confirm()) {
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials', 'Incorrect Number ID/Email');
			return false;
		}
		
	}

}