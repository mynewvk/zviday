<?
class Stats extends CI_Model {
	function __construct()
	{
	    parent::__construct();
	}
	public function get_all_stats(){
		return;
	}
	// USER
	public function new_users_today(){
		$day = time() - 60 *60 * 24;
		return $this->db->where('created_on >=', $day)->get('users')->num_rows();
	}
	public function vk_users(){
		return $this->db->where('vk_id !=', "null")->get('users')->num_rows();
	}
	public function users_online_one_day(){
		$day = time() - 60 *60 * 24;
		return $this->db->where('last_login >=', $day)->get('users')->num_rows();
	}
	public function users_online(){
		$day = time() - 60 * 15;
		return $this->db->where('last_login >=', $day)->get('users')->num_rows();
	}
	public function deactivated_users(){
		return $this->db->where('deactivated',1)->get('users')->num_rows();
	}
	public function all_users(){
		return $this->db->get('users')->num_rows();
	}


	// end USER
	public function all_answers(){
		return $this->db->where('is_new', 0)->get('questions')->num_rows();
	}
	public function with_out_answer(){
		return $this->db->where('is_new', 1)->get('questions')->num_rows();
	}
	public function all_questions(){
		return $this->db->get('questions')->num_rows();
	}
	public function questions_today(){
		$day = time() - 60 *60 * 24;
		$day = date('c',$day);
		return $this->db->where('date >=',$day)->get('questions')->num_rows();
	}
	public function answers_today(){
		$day = time() - 60 *60 * 24;
		$day = date('c',$day);
		return $this->db->where('date >=',$day)->where('is_new',0)->get('questions')->num_rows();
	}
	public function answers_month(){
		$day = time() - 60 *60 * 24 * 30;
		$day = date('c',$day);
		return $this->db->where('date >=',$day)->where('is_new',0)->get('questions')->num_rows();
	}
	public function comments_all(){
		return $this->db->get('comments')->num_rows();
	}
}