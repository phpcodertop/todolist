<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
//home page controller
	public function index(){
		if($this->session->userdata('logged_in')){
			$data['lists'] = $this->list_model->getLists($this->session->userdata('user_id'));			
			$data['listsNum'] = $this->list_model->getListsCount($this->session->userdata('user_id'));			
			$data['tasks'] = $this->task_model->getAllTasks($this->session->userdata('user_id'));			
			$data['tasksNum'] = $this->task_model->getAllTasksNum($this->session->userdata('user_id'));
		}

		$data['main_content'] = 'home';
		$this->load->view('layouts/main',$data);
	}
//end home controller
}

?>