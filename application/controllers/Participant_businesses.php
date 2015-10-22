<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant_businesses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Metadata
		$data['title']          = "Participant Businesses";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/participant-businesses";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('Participant Businesses', 'participant-businesses');
		// Main
		$this->load->view('layout/main', $data);
	
	}

}