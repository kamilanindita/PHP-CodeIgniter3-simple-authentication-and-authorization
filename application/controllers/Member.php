<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function index()
	{   
        if($this->session->userdata('level')=='Member'){
            $this->load->view('member/index');
        }else{
            $this->session->set_flashdata('message','This user not found!');
            redirect('user/login');
        }
        
    }
	
	
}
