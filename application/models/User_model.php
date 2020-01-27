<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{

    public function getUser($username){
        $this->db->select('users.*, roles.*'); 		
        $this->db->from('users'); 
        $this->db->where('email', $username);		
        $this->db->join('roles', 'roles.id_role = users.role_id'); 		
        $query = $this->db->get(); 		
        return $query->result(); 
    }



}