<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{
		// Metadata
		$data['title']          = "Homepage | I'm a Medical Tourist";
		$data['description']    = "Here is the description pleeeeeeeese!";
		$data['content']        = "pages/homepage";

		$this->load->view('layout/main', $data);
	}


	// Ejemplo esto se borrara
	public function sendmail()
	{
    $this->load->library('email'); // load email library
    $this->email->from('user@gmail.com', 'John Doe');
    $this->email->to('juliocesar@sanimedicaltourism.com');
    $this->email->subject('hola');
    $this->email->message('este fue un correo de prueba');
    if ($this->email->send())
        echo "Mail Sent!";
    else
        echo $this->email->print_debugger();
	}
	//////////////////////////// aqui acaba el ejemplo

}