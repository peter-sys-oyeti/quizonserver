<?php

class Main_model  extends CI_Model  {


	function __construct()
    {
        parent::__construct();
		$this->load->database();		
		$this->load->library('grocery_CRUD');
		
    }


	

    function check_login()
    {		
    	$this->db->limit(1);
		$query = $this->db->get_where('tbl_admin', array('username' => $this->input->post('user_name')));
		
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
    }
    function check_user_login()
    {		
    	$this->db->limit(1);
		$query = $this->db->get_where('tbl_user', array('username' => $this->input->post('user_name')));	
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row;
		}else{
			return FALSE;
		}
    }
	function get_firstname_only($username)
    {
		
		$query = $this->db->get_where('tbl_admin', array('username' => $username));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$name = explode(' ',$row->firstname);
			return $name[0];
		}else{
			return 'No Name';
		}
    }
	function get_firstname($username)
    {
		
		$query = $this->db->get_where('tbl_admin', array('username' => $username));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->firstname;
		}else{
			return 'No Name';
		}
    }
	function get_fullname($username)
    {
		
		$query = $this->db->get_where('tbl_admin', array('username' => $username));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->surname.' '.$row->firstname;
		}else{
			return 'No Name';
		}
    }
	function get_pic($username)
    {
		
		$query = $this->db->get_where('tbl_admin', array('username' => $username));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			return $row->picture;
		}else{
			return 'avatar.png';
		}
    }
	function get_user_position($username)
    {		
		$query = $this->db->get_where('tbl_admin', array('username' => $username));		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->position;
		}else{
			return 'N/A';
		}
    }
	function get_user_department($department_id)
    {		
		$query = $this->db->get_where('tbl_department', array('id' => $department_id));		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->name;
		}else{
			return 'N/A';
		}
    }
	public function get_total_users()
	{
		// $this->db->from('tbl_distributor');
		return $this->db->count_all_results('tbl_user');;
	} 
	public function get_total_questions()
	{
		// $this->db->from('tbl_distributor');
		return $this->db->count_all_results('tbl_question');;
	}  
	function get_question()
    {
		$chk = new grocery_CRUD();

		$chk->set_table('tbl_question');
		$chk->set_subject('Question');
		$chk->set_relation('department','tbl_department','name');
		$chk->required_fields('department','question','option_A','option_B','option_C','option_D','answer','answer_description');		
		return $chk->render();
		
    }
    function get_department(){
    	$chk = new grocery_CRUD();
    	$chk->set_table('tbl_department');
    	$chk->set_subject('User department');
    	$chk->required_fields('name');
    	return $chk->render();
    }
	function get_user()
    {
		$chk = new grocery_CRUD();

		$chk->set_table('tbl_user');
		$chk->set_subject('User');
		$chk->unset_fields('score','out_of','percentage_score');
		$chk->set_relation('department','tbl_department','name');
		$chk->required_fields('surname','firstname','username','password','department');
		$chk->set_field_upload('picture','inc/img/user');	
		$chk->callback_column('percentage_score',array($this,'_callback_percentage_score'));
		return $chk->render();
		
    }
    public function _callback_percentage_score($value, $row)
	{
	return "$value%";
	}
	function get_user_by_id($user_id)
    {
		$this->db->where('id_user', $user_id);
		$this->db->limit(1);
		$query = $this->db->get('tbl_user');

		if ($query->num_rows() > 0)
		{			
			$row = $query->row();
			return $row;
		}else{
			return FALSE;
		}
		
    }
	function get_admin()
    {
		$chk = new grocery_CRUD();

		$chk->set_table('tbl_admin');
		$chk->set_subject('Admin');	
		$chk->set_field_upload('picture','inc/img/user');	
		return $chk->render();
		
    }
	function get_question_list()
    {
    	$this->db->where('department',$this->session->department_id);
		$query = $this->db->get('tbl_question');

		if ($query->num_rows() > 0)
		{
			$count = 1;
			foreach ($query->result() as $row)
			{
				$question [$count++] =  $row;
			}
				return $question;
		}else{
			return FALSE;
		}
		
    }
	function get_total_question_by_department()
    {
    	$this->db->where('department',$this->session->department_id);
		$query = $this->db->get('tbl_question');

		if ($query->num_rows() > 0)
		{
			return $query->num_rows;
		}else{
			return FALSE;
		}
		
    }
	function get_user_list()
    {
		$query = $this->db->get('tbl_user');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$user [$row->id_user] =  $row;
			}
				return $user;
		}else{
			return FALSE;
		}
		
    }
	function average_percentage_score()
    {
		$query = $this->db->get('tbl_user');

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				if(!isset($department [$row->department]['count'])){
					$department [$row->department]['count'] = 0;
					$department [$row->department]['name'] = $this->get_user_department($row->department);
				}
				if(!isset($department [$row->department]['score_total'])){
					$department [$row->department]['score_total'] = 0;
					$department [$row->department]['name'] = $this->get_user_department($row->department);
				}
				$department [$row->department]['count']++;
				$department [$row->department]['score_total'] += $row->percentage_score;
			}
				return $department;
		}else{
			return FALSE;
		}
		
    }
	function get_question_by_id($question_id)
    {
		$this->db->where('id', $question_id);
		$this->db->limit(1);
		$query = $this->db->get('tbl_question');

		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row;
		}else{
			return FALSE;
		}
		
    }
	function get_user_answer_list()
    {
    	//get total number of question for the department
		$this->db->where('department', $this->session->department_id);
		$query_dep = $this->db->get('tbl_question');
		$no_of_question = $query_dep->num_rows();

		$this->db->where('user_id', $this->session->user_id);
		$query = $this->db->get('tbl_user_question');

		if ($query->num_rows() > 0)
		{
			$score = 0;
			foreach ($query->result() as $row)
			{
				$question [$row->question_id] =  $row;
				if($row->status == 'Correct')//if anser provide was correct
					$score ++;
			}
			//Percentage score
			$percentage_score = (($score/$no_of_question)*100);
			//post score
			$this->db->where('id_user', $this->session->user_id);
			$query = $this->db->update('tbl_user',array('score' => $score,'out_of' => $no_of_question,'percentage_score' => number_format($percentage_score,1)));
			return $question;
		}else{
			return FALSE;
		}
		
    }
	function get_user_answer_list2()
    {
    	//get total number of question for the department
		$this->db->where('department', $this->session->department_id);
		$query_dep = $this->db->get('tbl_question');
		$no_of_question = $query_dep->num_rows();

		$this->db->where('user_id', $this->session->user_id);
		$query = $this->db->get('tbl_user_question');

		if ($query->num_rows() > 0)
		{
			$score = 0;
			foreach ($query->result() as $row)
			{
				$question [$row->question_id][] =  $row;
				if($row->status == 'Correct')//if anser provide was correct
					$score ++;
			}
			//Percentage score
			$percentage_score = (($score/$no_of_question)*100);
			//post score
			$this->db->where('id_user', $this->session->user_id);
			$query = $this->db->update('tbl_user',array('score' => $score,'out_of' => $no_of_question,'percentage_score' => number_format($percentage_score,1)));
			return $question;
		}else{
			return FALSE;
		}
		
    }
	function submit_answer()
    {
    	$user_id = $this->session->user_id;
    	$question_id = $this->input->post('question_id');
    	$answer = $this->input->post('answer');
    	//get the question details and verify that the answer is correct
    	$question = $this->get_question_by_id($question_id);
    	//ensure that permisable no of answers has not been submitted for this question.
		if ($this->is_max_answer_exceeded($user_id,$question_id))
		{
			$feeback['status'] = false;
			$feeback['msg'] = 'Sorry! You have exceed the maximum possible answers.';
			return $feeback;
		}else{		
			//Ensure that question has not been answered to before
			if ($this->is_question_with_answer($user_id,$question_id,$answer))
			{
				$feeback['status'] = false;
				$feeback['msg'] = 'Duplicate! You have already provided this answer before.';
				return $feeback;
			}else{			
		    	$status = 'Wrong';
		    	if ($question->answer == $answer) 
		    		$status = 'Correct';
				$data = array(
						'user_id' => $user_id,
						'question_id' => $question_id,
						'answer' => $answer,
						'status' => $status
				);
				$this->db->insert('tbl_user_question', $data);
			}
		}		
		return true;
    }    
	function is_max_answer_exceeded($user_id,$question_id)
    {
		$this->db->where('user_id', $user_id);
    	$this->db->where('question_id', $question_id);
		$query = $this->db->get('tbl_user_question');

		if ($query->num_rows() > 1)
		{			
			return TRUE;
		}else{
			return FALSE;
		}
		
    }  
	function is_question_with_answer($user_id,$question_id,$answer)
    {
		$this->db->where('user_id', $user_id);
    	$this->db->where('question_id', $question_id);
    	$this->db->where('answer', $answer);
		$this->db->limit(1);
		$query = $this->db->get('tbl_user_question');

		if ($query->num_rows() > 0)
		{			
			return TRUE;
		}else{
			return FALSE;
		}
		
    }
	function reset()
    {
		//reset user table
		$query = $this->db->update('tbl_user',array('score' => 0,'out_of' => 0,'percentage_score' => 0));

		//truncate participation table
		$this->db->truncate('tbl_user_question');		
		return true;
    }

}
