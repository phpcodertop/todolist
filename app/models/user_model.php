<?php 
class User_model extends CI_Model {

	public function login_user($username,$password){
		$this->db->where('username',$this->input->post('username'));
		$this->db->where('password',md5($this->input->post('password')));
		$result = $this->db->get('users');
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
		//end loin_user
	}

	public function create_user(){
		$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
		return $this->db->insert('users',$data);
		//end create_user
	}

	public function check_user($username){
		$this->db->where('username',$username);
		$query = $this->db->get('users');
		return $query->num_rows();
		//end check user
	}

//end user_model 	
}

?>