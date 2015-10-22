<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_it_works extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Metadata
		$data['title']          = "How It Works?";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/how-it-works/index";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('How It Works?', 'how-it-works');
		// Main
		$this->load->view('layout/main', $data);
	
	}

	public function How_do_i_get_it()
	{
		// Metadata
		$data['title']          = "How Do I Get It?";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/how-it-works/how-do-i-get-it";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('How It Works?', 'how-it-works');
		$this->breadcrumbs->push('How Do I Get It?', 'how-it-works/how-do-i-get-it');
		// Main
		$this->load->view('layout/main', $data);
		
	}

	public function Money_savings()
	{
		// Metadata
		$data['title']          = "Money Savings";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/how-it-works/money-savings";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('How It Works?', 'how-it-works');
		$this->breadcrumbs->push('Money Savings', 'how-it-works/money-savings');
		// Main
		$this->load->view('layout/main', $data);
		
	}

}