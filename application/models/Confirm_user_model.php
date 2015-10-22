<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Confirm_user_model extends CI_Model{
 	
 	public function __construct(){
 		parent::__construct();
 	}

 	public function Can_confirm(){
 		
 		$this->db->where('user_id', $this->input->post('user_id'));
 		$this->db->where('email', $this->input->post('email'));
 		$query = $this->db->get('user_profiles');

 		if ($query->num_rows()==1){
 				return true;
 		} else{
 			return false;
 		}

 	}

}