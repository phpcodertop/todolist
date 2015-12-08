<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	public function index(){
		
	}

	public function add(){
		$this->form_validation->set_rules('task_name','Task Name','trim|required|min_length[4]');
		$this->form_validation->set_rules('task_body','Task Body','trim');
		$this->form_validation->set_rules('due_date','Date','trim|required');
		if($this->form_validation->run() == false){
			$data['main_content'] = 'tasks/addtask';
			$this->load->view('layouts/main',$data);	
		}else{
			$data = array(
					'task_name' => $this->input->post('task_name'),
					'task_body' => $this->input->post('task_body'),
					'due_date'  => $this->input->post('due_date'),
					'list_id'   => $this->uri->segment(3)
				);
			if($this->task_model->addTask($data)){
				$this->session->set_flashdata('task_created', 'Your task has been created');
                //Redirect to index page with error above
                redirect('lists/show/'.$this->uri->segment(3).'');
			}
		}

	}

	public function show(){
		$taskid = $this->uri->segment(3);
		$data['task'] = $this->task_model->getTaskData($taskid);
		$data['is_complete'] = $this->task_model->checkCompleted($taskid);
		$data['main_content'] = 'tasks/showtask';
		$this->load->view('layouts/main',$data);
		//end function show 
	}

	public function edit(){
		$this->form_validation->set_rules('task_name','Task Name','trim|required|min_length[4]');
		$this->form_validation->set_rules('task_body','Task Body','trim');
		$this->form_validation->set_rules('due_date','Date','trim|required');
		if($this->form_validation->run() == false){
			$data['this_task'] = $this->task_model->getTaskData($this->uri->segment(3));
			$data['main_content'] = 'tasks/edittask';
			$this->load->view('layouts/main',$data);	
		}else{
			$data = array(
					'task_name' => $this->input->post('task_name'),
					'task_body' => $this->input->post('task_body'),
					'due_date'  => $this->input->post('due_date')
				);
			if($this->task_model->editTask($this->uri->segment(3),$data)){
				$this->session->set_flashdata('task_updated', 'Your task has been updated');
                //Redirect to index page with error above
                redirect('task/show/'.$this->uri->segment(3).'');
			}
		}

		//end edit task function		
	}

	public function delete(){
		$taskid = $this->uri->segment(3);
		$listid = $this->uri->segment(4);
		$this->task_model->deleteTask($taskid);
		$this->session->set_flashdata('task_deleted', 'Your task has been deleted');        
            //Redirect to list index
            redirect('lists/show/'.$listid.'');
		//end delete function
	}

	public function mark_complete(){
		$taskid = $this->uri->segment(3);
		$data = array('is_complete' => 1);
		$this->task_model->editTask($taskid,$data);
		redirect('task/show/'.$taskid.'');
		//end mark complete
	}

	public function mark_new(){
		$taskid = $this->uri->segment(3);
		$data = array('is_complete' => 0);
		$this->task_model->editTask($taskid,$data);
		redirect('task/show/'.$taskid.'');
		//end mark complete
	}

}

?>