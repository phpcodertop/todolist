<?php
/**
*		this model deals with tasks table  
*		which contain following fields
* 	id  ,  task_name  , task_body  , list_id  ,  due_date 
*            create_date  ,  is_complete	
*/
class Task_model extends CI_Model
{
	
	function __construct()
	{
		# constructor method
	}

	public function addTask($data){
		return $this->db->insert('tasks',$data);
		//end add task method
	}

	public function editTask($taskid,$data){
		$this->db->where('id',$taskid);
		$this->db->update('tasks',$data);
		return true;
		//end edit task method
	}


	public function deleteTask($taskid){
		$this->db->where('id',$taskid);
		$this->db->delete('tasks');
		return true;
		//end delete task method
	}

	public function showTasksUncompleted($list_id){
		$this->db->where('list_id',$list_id);
		$this->db->where('is_complete',0);
		$query = $this->db->get('tasks');
		return $query->result();
		//end show tasks method
	}

	public function showTasksUncompletedNum($list_id){
		$this->db->where('list_id',$list_id);
		$this->db->where('is_complete',0);
		$query = $this->db->get('tasks');
		return $query->num_rows();
		//end show tasks method
	}	

	public function showTasksCompleted($list_id){
		$this->db->where('list_id',$list_id);
		$this->db->where('is_complete',1);
		$query = $this->db->get('tasks');
		return $query->result();
		//end show tasks method
	}

	public function showTasksCompletedNum($list_id){
		$this->db->where('list_id',$list_id);
		$this->db->where('is_complete',1);
		$query = $this->db->get('tasks');
		return $query->result();
		//end show tasks method
	}	

	public function getAllTasks($userid){
		$this->db->select('
            tasks.task_name,
            tasks.id,
            tasks.create_date,
            lists.id as list_id,
            lists.list_name,
            ');
        $this->db->from('tasks');
        $this->db->join('lists', 'lists.id = tasks.list_id','LEFT');
        $this->db->where('lists.list_user_id',$userid);
        $query = $this->db->get();
        return $query->result();
		//end get all tasks method
	}

	public function getAllTasksNum($userid){
		$this->db->select('
            tasks.task_name,
            tasks.id,
            tasks.create_date,
            lists.id as list_id,
            lists.list_name,
            ');
        $this->db->from('tasks');
        $this->db->join('lists', 'lists.id = tasks.list_id','LEFT');
        $this->db->where('lists.list_user_id',$userid);
        $query = $this->db->get();
        return $query->num_rows();
		//end get all tasks method
	}

	public function getTaskData($taskid){
		$this->db->where('id',$taskid);
		$query = $this->db->get('tasks');
		return $query->row();
		//end get task data 
	}

	public function checkCompleted($taskid){
		$this->db->where('id',$taskid);
		$query = $this->db->get('tasks');
		return $query->row()->is_complete;
	}
	//end task_model
}
?>