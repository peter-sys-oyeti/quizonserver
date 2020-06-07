<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_ctrl extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		
		$this->load->helper(array('url','cookie'));
		$this->load->library('session');
		
		$this->load->library('grocery_CRUD');
		
		//check if user is logged in alre
		if(!$this->session->has_userdata('user_logged_in')){
			redirect('user/login');
		}
		
		
		$this->load->model('Main_model');
		
		$this->user_firstname = $this->session->user_firstname;
		$this->user_fullname = $this->session->user_fullname;
		$this->department_id = $this->session->department_id;
		$this->department = $this->session->department;
		$this->user_id = $this->session->user_id;
		$this->user_pic = $this->session->user_pic;
	}
	public function _send_output($page='empty',$output = null)
	{
		if(empty($page)) $page = 'empty';
		$output['user_firstname'] = $this->user_firstname;
		$output['user_fullname'] = $this->user_fullname;
		$output['department_id'] = $this->department_id;
		$output['department'] = $this->department;
		$output['user_id'] = $this->user_id;
		$output['user_pic'] = $this->user_pic;
		
		$this->load->view('user_header',$output);
		$this->load->view($page.'.php',$output);
		$this->load->view('footer');
	}
	public function index()
	{
		/*$output['title'] = 'Dashboard';
		$output['sub_title'] = 'Control panel';
		$output['user'] = $this->Main_model->get_user_by_id($this->user_id);
		$output['total_question'] = $this->Main_model->get_total_question_by_department();
		
		$this->_send_output('user_dashboard',$output);*/
		$this->quiz();
	}
	public function error_page()
	{		
		$this->_send_output('404');
	}
	public function quiz($question_no = 1)
	{		
		//print_r($_SESSION);exit();
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
		   $this->_send_output('user_quiz',$output);
		}else {	
			//submit answer
			$feedback = $this->Main_model->submit_answer();
			if(!$feedback){//Answer already submitted.
				$output['error_msg'] = 'Sorry! you have already answered this question.';
			}
			//fetch record
			$output['question_list'] = $this->Main_model->get_question_list();
			$output['user_answer'] = $this->Main_model->get_user_answer_list();
			$this->_send_output('user_quiz',$output);
		}
	}
}
