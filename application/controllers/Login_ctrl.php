<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctrl extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		
		$this->load->helper(array('form','url','cookie'));
		$this->load->library(array('form_validation','session','user_agent'));
		$this->load->model('Main_model');
		
		//set referrer page if not set already
		if(!$this->session->has_userdata('go_to')){
			$this->session->set_userdata('go_to', $this->agent->referrer());
		}
	}
	public function index()
	{
		//check if user is logged in already
		if($this->session->has_userdata('am_logged_in')){
			redirect('admin');
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
				$output['user_fullname'] = $this->Main_model->get_fullname(get_cookie('login_username'));
				$output['user_pic'] = $this->Main_model->get_pic(get_cookie('login_username'));
				
				if(!isset($_POST['user_name'])){//initially
					
					$this->load->view('login',$output);
					
				}else{
					$output['error_msg'] = '';
					
					$this->load->view('login',$output);
				}
				
		}
		else
		{
			
				$page = $_SESSION['go_to'];
				unset($_SESSION['go_to']);
				redirect($page);
			
		}
		
	}
	 public function pass_check($password)
    {
		//echo for correct username and password combinations here
		$username = $this->input->post('user_name');
		$password = $this->input->post('user_pass');
		
		// validate via ldap
		 if ($this->check_service($username, $password)) {

		 	if (!$this->Main_model->check_login())
				{
					$this->form_validation->set_message('pass_check', 'Incorrect username and password combinations.');
					return FALSE;
				}
				else
				{
					
					//set correct sessions here
					$session_data = array(
						'login_username'  => $this->input->post('user_name'),
						'am_logged_in' => TRUE
					);

					$this->session->set_userdata($session_data);
			
					
					return TRUE;
				}

		 }
		
		
    }

    //Ldap is used here
	function check_service($username, $password) {
        
        $user = $this->ldap->checkUserAuthentication($username, $password);
         if($user == "")
         {
           return FALSE;
         } else {
             return TRUE;
             
         }
    }
    
	public function logout()
	{
		$session_data = array('login_username', 'am_logged_in');

		$this->session->unset_userdata($session_data);// delete session
		delete_cookie('login_username');//delete cookie
		
		redirect('admin/login');
	}
	
}
