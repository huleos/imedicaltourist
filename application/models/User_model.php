<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class User_model extends CI_Model{
 	
 	public function __construct(){
 		parent::__construct();
 	}

 	public function Can_login(){
 		
 		$this->db->where('email', $this->input->post('email'));
 		$this->db->where('password', md5($this->input->post('password')));
 		$query = $this->db->get('users');

 		if ($query->num_rows()==1){
 				return true;
 		} else{
 			return false;
 		}

 	}

 	public function Add_temp_user($key)
 	{

 		$data = array(
 				'first_name'     => $this->input->post('first_name'),
 				'last_name'      => $this->input->post('last_name'),
 				'email'          => $this->input->post('email'),
 				'password'       => md5($this->input->post('password')),
 				'key'            => $key
 		);

 		$query = $this->db->insert('temp_users', $data);
 		if ($query) {
 			return true;
 		} else{
 			return false;
 		}
 		
 	}

 	public function Is_key_valid($key)
 	{
 		$this->db->where('key', $key);
 		$query = $this->db->get('temp_users');

 		if ($query->num_rows() == 1) {
 			return true;
 		} else{
 			return false;
 		}

 	}

 	public function Add_user($key)
 	{
 		$this->db->where('key', $key);
 		$temp_user = $this->db->get('temp_users');

 		if ($temp_user) {
 			$row = $temp_user->row();

 			$data = array(
 				'first_name'     => $row->first_name,
 				'last_name'      => $row->last_name,
 				'email'          => $row->email,
 				'password'       => $row->password
 			);
 			$did_add_user = $this->db->insert('users', $data); // Changed with final table
 		}

 		if ($did_add_user) {
 			$this->db->where('key', $key);
 			$this->db->delete('temp_users');
 			return $data['email'];
 		} return false;

 	}

 	public function Get_data()
 	{
 		$this->db->select('first_name, last_name');
 		return $query = $this->db->get('users');
 		// Produces: SELECT row_1, row_2 FROM mytable
 	}


}