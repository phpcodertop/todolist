<?php 
/**
* 		this model deals with lists table 
*       which contain following fields
*		id  ,  list_name  , list_body  , list_user_id  ,  create_date
*/
class List_model extends CI_Model
{
	
	function __construct()
	{
		# parent constructor
		parent::__construct();
	}

	public function addList($data){
		return $this->db->insert('lists',$data);
		//end add task method
	}

	public function editList($listid,$data){
		$this->db->where('id',$listid);
		$this->db->update('lists',$data);
		return true;
		//end edit task method
	}

	public function deleteList($listid){
		//delete list
		$this->db->where('id',$listid);
		$this->db->delete('lists');
		//delete tasks on it
		#****** here the code to delete tasks
		$this->deleteTasksOfList($listid);
		return true;
		//end delete task method
	}

	public function getLists($userid){
		$this->db->where('list_user_id',$userid);
		$this->db->order_by('create_date', 'asc');
		$query = $this->db->get('lists');
		return $query->result();
		//end show tasks method
	}

	public function getListsCount($userid){
		$this->db->where('list_user_id',$userid);
		$this->db->order_by('create_date', 'asc');
		$query = $this->db->get('lists');
		return $query->num_rows();
		//end show tasks method
	}

	public function getListData($listid){
		$this->db->where('id',$listid);
		$query = $this->db->get('lists');
		if($query->num_rows() != 1){
			return false;
		}
		return $query->row();
		//end get list method
	}

	public function getListTasks($listid){
#xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		//end get list tasks method
	}

	public function deleteTasksOfList($listid){
		$this->db->where('list_id',$listid);
		$this->db->delete('tasks');
		return true;
		//end delete task of list method
	}

	#end list model
}
?>