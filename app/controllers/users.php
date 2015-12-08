<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		//end constructor
	}

	//register page
	public function register(){
		//set rules of form validation
		$this->form_validation->set_rules('first_name','First Name','required|trim|min_length[2]|max_length[50]');

		$this->form_validation->set_rules('last_name','Last Name','required|trim|min_length[2]|max_length[50]');

		$this->form_validation->set_rules('email','Email','required|trim|min_length[5]|max_length[100]|valid_email');

		$this->form_validation->set_rules('username','username','required|trim|min_length[4]|max_length[20]');

		$this->form_validation->set_rules('password','password','required|trim|min_length[4]|max_length[20]');

		$this->form_validation->set_rules('password2','password2','required|trim|min_length[4]|max_length[20]|matches[password]');

		if($this->form_validation->run() == false){
			$data['main_content'] = 'users/register';
			$this->load->view('layouts/main',$data);
		}else{
			////no errors in form

			// 1- check if username is already taken
			if($this->user_model->check_user($this->input->post('username')) == 1){
				$data['main_content'] = 'users/register';
				$data['userisin'] = 'This username is already taken';
				$this->load->view('layouts/main',$data);
			}else{
			// username not taken 
			//2- add this user to database
				if($this->user_model->create_user()){
					$this->session->set_flashdata('registered','You are now registered, please log in');
					//redirect to home page
					redirect('home/index');
				}	
			}

		}

		//end register page
	}

	//login form
	public function login(){
		//set rules
		$this->form_validation->set_rules('username','username','required|trim|min_length[4]|max_length[20]');

		$this->form_validation->set_rules('password','password','required|trim|min_length[4]|max_length[20]');

		if($this->form_validation->run() == false){
			//Set error
            $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
            redirect('home/index');
		}else{
			//there is no errors in form
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$user_id = $this->user_model->login_user($username,$password);

			if($user_id){
				//username and password is correct 
				$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);
				$this->session->set_userdata($user_data);
				redirect('home/index');
			}else{
				//userinputs is incorrect
				$this->session->set_flashdata('login_failed','Sorry, the login info that you entered is invalid');
				redirect('home/index');
			}

		}		
		//check_user($username)

		//end login function
	}

	//logout function
	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		$this->clear_cache();
		$this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('home/index');
		//end logout function
	}

	//function to remove cashe
	 public function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        //end clear_cashe()
    }

//end user controller	
}

?>