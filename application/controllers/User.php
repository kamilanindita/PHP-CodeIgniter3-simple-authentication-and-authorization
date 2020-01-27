<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
	{   
        if($this->session->userdata('user_id')){
            if($this->session->userdata('level')=="Admin"){ //cek level user admin
                redirect('admin');
            }elseif($this->session->userdata('level')=="Member"){ //cek level user member
                redirect('member');
            }else{ //tidak ada cek level user
                $this->session->set_flashdata('message','Your user level privilege not found!'); 
                redirect('user/login');
            }
        }else{
            $this->session->set_flashdata('message','This user not found!');
            redirect('user/login');
        }
        
    }
	
	public function login()
	{
        $this->load->view('user/login');
    }
    
    public function register(){
        //
    }

    public function simpanRegister(){
       //
    }

    public function authLogin(){

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        
        if($this->form_validation->run()==FALSE){ //validasi gagal
            $this->load->view('user/login');
        }else{ //validasi sukses
            $username=$this->input->post('email');
            $pswd=$this->input->post('password');

            $user=$this->User_model->getUser($username);
        
            if(isset($user[0]->password)){ //ada akun user terdaftar
                if($user[0]->password==$pswd){ //password benar
                    if($user[0]->name_role =="Admin"){ //cek level user admin
                        $data=[
                            'user_id'=>$user[0]->id,
                            'name'=>$user[0]->name,
                            'level'=>$user[0]->name_role,
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin');

                    }elseif($user[0]->name_role =="Member"){ //cek level user member
                        $data=[
                            'user_id'=>$user[0]->id,
                            'name'=>$user[0]->name,
                            'level'=>$user[0]->name_role,
                        ];
                        $this->session->set_userdata($data);
                        redirect('member');

                    }else{ //tidak ada cek level user
                        $this->session->set_flashdata('message','Your level user privilege not found!'); 
                        redirect('user/login');
                    }
                }else{ //password salah
                    $this->session->set_flashdata('message','Wrong Password!'); 
                    redirect('user/login');
                }

            }else{ //akun user tidak terdaftar 
                $this->session->set_flashdata('message','This username not found!');
                redirect('user/login');
            }
        }
    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('level');
        redirect('user/login');
    }
}
