<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
	{   
        if($this->session->userdata('level')=='Admin'){
            $this->load->view('admin/index');
        }else{
            $this->session->set_flashdata('message','This user not found!');
            redirect('user/login');
        }
        
    }
	
	
}
