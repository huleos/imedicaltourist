<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_tips extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Metadata
		$data['title']          = "Travel Tips";
		$data['description']    = "Here is the description";
		$data['content']        = "pages/travel-tips";
		// Breadcrumbs
		$this->breadcrumbs->push('Homepage', '/');
		$this->breadcrumbs->push('Travel Tips', 'travel-tips');
		// Main
		$this->load->view('layout/main', $data);
	
	}

}