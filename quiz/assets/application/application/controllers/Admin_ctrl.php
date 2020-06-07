<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_ctrl extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		
		$this->load->helper(array('url','cookie'));
		$this->load->library('session');
		
		$this->load->library('grocery_CRUD');
		
		//check if user is logged in alre
		if(!$this->session->has_userdata('am_logged_in')){
			redirect('admin/login');
		}
		
		
		$this->load->model('Main_model');
		
		$this->user_firstname_only = $this->Main_model->get_firstname_only($this->session->login_username);
		$this->user_firstname = $this->Main_model->get_firstname($this->session->login_username);
		$this->user_fullname = $this->Main_model->get_fullname($this->session->login_username);
		$this->user_position = $this->Main_model->get_user_position($this->session->login_username);
		$this->user_pic = $this->Main_model->get_pic($this->session->login_username);
	}
	public function _send_output($page='empty',$output = null)
	{
		if(empty($page)) $page = 'empty';
		$output['user_firstname_only'] = $this->user_firstname_only;
		$output['user_firstname'] = $this->user_firstname;
		$output['user_fullname'] = $this->user_fullname;
		$output['user_position'] = $this->user_position;
		$output['user_pic'] = $this->user_pic;
		
		$this->load->view('header',$output);
		$this->load->view($page.'.php',$output);
		$this->load->view('footer');
	}
	public function index()
	{
		$output['title'] = 'Dashboard';
		$output['sub_title'] = 'Control panel';
		$output['total_users'] = $this->Main_model->get_total_users();
		$output['total_question'] = $this->Main_model->get_total_questions();
		$output['average_percentage_score'] = $this->Main_model->average_percentage_score();
		
		$this->_send_output('dashboard',$output);
	}
	public function error_page()
	{		
		$this->_send_output('404');
	}
	public function user()
	{
		$output['title'] = 'Manage User';
		$output['sub_title'] = 'Quiz Participants';

		$output['output'] = $this->Main_model->get_user();
				
		$this->_send_output('empty',$output);
	}
	public function question()
	{
		$output['title'] = 'Manage Q&A';
		$output['sub_title'] = 'Questions and Answers';

		$output['output'] = $this->Main_model->get_question();
				
		$this->_send_output('empty',$output);
	}
	public function department()
	{
		$output['title'] = 'Manage Department';
		$output['sub_title'] = 'User department';

		$output['output'] = $this->Main_model->get_department();
				
		$this->_send_output('empty',$output);
	}
	public function quiz($question_no = 1)
	{		
		//check if participant is selected
		if(!$this->session->has_userdata('user_id')){
			redirect(base_url('admin/quiz_user'));
		}
		$output['title'] = 'Quiz';
		$output['sub_title'] = '.:Participate in Quiz:.';
		$output['question_no'] = $question_no;
		$output['question_list'] = $this->Main_model->get_question_list();
		$output['user_answer'] = $this->Main_model->get_user_answer_list();
		$output['user'] = $this->Main_model->get_user_by_id($this->session->user_id);
		$this->form_validation->set_rules('answer', 'Answer', 'required|alpha',
				array(
						'required' => 'No Answer was submitted. Please choose an answer'
					)
		);	
		if ($this->form_validation->run() == FALSE)
		{	
			if(isset($_POST['question_id'])){//initially
				$output['error_msg'] = '';
			}
		   $this->_send_output('quiz',$output);
		}else {	
			//submit answer
			$this->Main_model->submit_answer();
			//fetch record
			$output['question_list'] = $this->Main_model->get_question_list();
			$output['user_answer'] = $this->Main_model->get_user_answer_list();
			$this->_send_output('quiz',$output);
		}
	}
	public function quiz_user()
	{
		$output['title'] = 'Quiz User';
		$output['sub_title'] = '.:Select the Quiz Participate:.';
		$output['user_list'] = $this->Main_model->get_user_list();
		$this->form_validation->set_rules('user_id', 'Participant', 'required|numeric|callback_check_user',
				array(
						'required' => 'Please choose a participant'
					)
		);
		if ($this->form_validation->run() == FALSE)
		{	
			if(isset($_POST['user_id'])){//initially
				$output['error_msg'] = '';
			}
		   $this->_send_output('select_quiz_user',$output);
		}else {
			//REDIRECT ON SUCCESS
			redirect(base_url('admin/quiz'));
		}
	}
	 public function check_user($password)
    {
    	//Check if user record exist
    	$user = $this->Main_model->get_user_by_id($this->input->post('user_id'));		
		if (!$user)
		{
				$this->form_validation->set_message('check_user', 'No record found for this user.');
				return FALSE;
		}
		else
		{
			//set correct sessions here
			$session_data = array(
				'user_id'  => $this->input->post('user_id'),
				'department_id' => $user->department
			);
			$this->session->set_userdata($session_data);
			
			return TRUE;
		}
    }
	public function reset()
	{
		$output['title'] = 'Reset';
		$output['sub_title'] = '.:Reset participation record:.';
		$this->form_validation->set_rules('answer', 'Answer', 'required');	
		if ($this->form_validation->run() == FALSE)
		{	
			if(isset($_POST['answer'])){//initially
				$output['error_msg'] = '';
			}
		   $this->_send_output('reset',$output);
		}else {
			//reset action here
			$this->Main_model->reset();
			$output['success_msg'] = "System reset was successfull.";
		   $this->_send_output('reset',$output);
		}
	}
}
