<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lists extends CI_Controller {

# index show add edit delete
	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            //Set error
            $this->session->set_flashdata('need_login', 'Sorry, you need to be logged in to view that area');
            redirect('home/index');
        }
    }

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$data['lists'] = $this->list_model->getLists($user_id);
		$data['listsNum'] = $this->list_model->getListsCount($user_id);
		$data['main_content'] = 'lists/index';
		$this->load->view('layouts/main',$data);
	}

	public function add(){
		$this->form_validation->set_rules('list_name','List Name','required|min_length[4]|trim');
		$this->form_validation->set_rules('list_body','List Body','trim');
		if($this->form_validation->run() == false){
			#if there is an error
			$data['main_content'] = 'lists/addlist';
			$this->load->view('layouts/main',$data);
		}else{
			$data = array(
					'list_name' => $this->input->post('list_name'),
					'list_body' => $this->input->post('list_body'),
					'list_user_id' => $this->session->userdata('user_id') 
				);
			if($this->list_model->addList($data)){
				$this->session->set_flashdata('list_created', 'Your task list has been created');
				//Redirect to index page 
                redirect('lists/index');
			}
		}
		//end add list page 
	}

	public function edit(){
		$this->form_validation->set_rules('list_name','List Name','required|min_length[4]|trim');
		$this->form_validation->set_rules('list_body','List Body','trim');
		if($this->form_validation->run() == false){
			$listid = $this->uri->segment(3);
			$data['this_list'] = $this->list_model->getListData($listid);
			$data['main_content'] = 'lists/editlist';
			$this->load->view('layouts/main',$data);	
		}else{
			##if edit button is pressed and no errors
			$data = array(
					'list_name' => $this->input->post('list_name'),
					'list_body' => $this->input->post('list_body')
				);
			if($this->list_model->editList($this->uri->segment(3),$data)){
				$this->session->set_flashdata('list_updated', 'Your task list has been updated');
				redirect('lists/index');
			}
		}
		//end edit page
	}

	public function delete(){
		$list_id = $this->uri->segment(3);
		$this->list_model->deleteList($list_id);
		$this->session->set_flashdata('list_deleted', 'Your list has been deleted');
		redirect('lists/index');
	}

	public function show(){
		$list_id = $this->uri->segment(3);
		$data['list'] = $this->list_model->getListData($list_id);
		$data['list_id'] = $list_id;
		$data['uncompletedTasks'] = $this->task_model->showTasksUncompleted($list_id);
		$data['uncompletedTasksNum'] = $this->task_model->showTasksUncompletedNum($list_id);
		$data['completedTasks'] = $this->task_model->showTasksCompleted($list_id);
		$data['completedTasksNum'] = $this->task_model->showTasksCompletedNum($list_id);
		$data['main_content'] = 'lists/showlist';
		$this->load->view('layouts/main',$data);
	}


	//end list controller

}

?>