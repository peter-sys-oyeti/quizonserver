<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login_ctrl extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		
		$this->load->helper(array('form','url','cookie'));
		$this->load->library(array('form_validation','session','user_agent'));
		$this->load->model('Main_model');
	}
	public function index()
	{
		//check if user is logged in already
		if($this->session->has_userdata('user_logged_in')){
			redirect('user');
		}
		
		$this->form_validation->set_rules('user_name', 'Username', 'required',
				array('required' => '%s cannot be empty.')
		);
		$this->form_validation->set_rules('user_pass', 'Password', 'required|min_length[4]|callback_pass_check',
				array(
						'required' => 'You must provide a %s.',
						'min_length'     => '%s most not be less than 4 characters long.')
		);
				
		if ($this->form_validation->run() == FALSE)
		{
				$output['user_fullname'] = $this->Main_model->get_fullname(get_cookie('user_username'));
				$output['user_pic'] = $this->Main_model->get_pic(get_cookie('user_username'));
				
				if(!isset($_POST['user_name'])){//initially
					
					$this->load->view('user_login',$output);
					
				}else{
					$output['error_msg'] = '';
					
					$this->load->view('user_login',$output);
				}
				
		}
		else
		{
			redirect('user');
		}
		
	}
	 public function pass_check($password)
    {
    	//search for user details
    	$user = $this->Main_model->check_user_login();	
		
		if (!$user)
		{
				$this->form_validation->set_message('pass_check', 'Incorrect username and password combinations.');
				return FALSE;
		}
		else
		{
			//set correct sessions here
			$session_data = array(
				'user_username'  => $this->input->post('user_name'),
				'user_id'  => $user->id_user,
				'user_firstname'  => $user->firstname,
				'user_fullname'  => $user->firstname.' '.$user->surname,
				'department_id'  => $user->department,
				'department'  => $this->Main_model->get_user_department($user->department),
				'user_pic'  => $user->picture,
				'user_logged_in' => TRUE
			);
			$this->session->set_userdata($session_data);			
			//set cookie
			//set_cookie('user_username',$this->input->post('user_name'),'100000000');
			
			return TRUE;
		}
    }
	public function logout()
	{
		$session_data = array('user_username', 'user_logged_in','user_id','user_firstname','user_fullname','department_id','department','user_pic');

		$this->session->unset_userdata($session_data);// delete session		
		redirect('user/login');
	}
	
}
