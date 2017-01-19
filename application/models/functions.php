<?
class Functions extends CI_Model {
	function __construct()
	{
	    parent::__construct();
	}
	public function followers_count($userid = null){
		if($userid == null){
			$userid = $this->ion_auth->get_user_id();
		}
		$count = $this->db->where('by',$userid)->get('follow')->num_rows();
		return $count;
	}
	public function following_count($userid){
		$count = $this->db->where('who',$userid)->get('follow')->num_rows();
		return $count;
	}
	public function new_comments_count($userid){
		$count = $this->db->where(array('to' => $userid, "is_new" => 1))->get('comments')->num_rows();
		return $count;
	}	
	public function new_answers_count($userid){
		return $this->db->where('from_whom',$userid)->where('is_new',0)->where("from_know", 0)->get('questions')->num_rows();
	}
	public function new_questions_count($userid = null){
		if($userid == null){
			$userid = $this->ion_auth->get_user_id();
		}
		return	$this->db->where('to',$userid)->where('is_new',1)->get('questions')->num_rows();
	}
	public function questions_count($userid = null){
		if($userid == null){
			$userid = $this->ion_auth->get_user_id();
		}
		return	$this->db->where('to',$userid)->where('is_new',0)->get('questions')->num_rows();
	}

	/*
	badge functions
	*/	
	public function new_questions_count_badge($userid){
		$count = $this->db->where('to',$userid)->where('is_new',1)->get('questions')->num_rows();
		if($count < 1){
			return;
		}
		else{
			return '<span class="label label-danger ask-comments-count">+ ' . $count . '</span>';
		}
	}	
	public function new_comments_count_badge($userid){
		$count = $this->db->where(array('to' => $userid, "is_new" => 1))->get('comments')->num_rows();
		if($count < 1){
			return;
		}
		else{
			return '<span class="label label-success ask-comments-count">+ ' . $count . '</span>';
		}
	}	
	public function new_answers_count_badge($userid){
		$count = $this->db->where('from_whom',$userid)->where('is_new',0)->where("from_know", 0)->get('questions')->num_rows();
		if($count < 1){
			return;
		}
		else{
			return '<span class="label label-primary ask-comments-count">+ ' . $count . '</span>';
		}
	}
	/*
	end badge functions
	*/
	public function user_update_settings($b = null){
		$id = $this->ion_auth->get_user_id();
		$settings = $this->db->where('id',$id)->get('users')->row()->settings;
		$settings = json_decode($settings,true);

		foreach($b as $key => $value){
			$settings[$key] = $value;
		}
		$settings = json_encode($settings);
		$data['settings'] = $settings;
		if($this->ion_auth->update($id,$data)){
			return true;
		}else{
			return fasle;
		}
	}
	public function get_user_settings($userid = null){
		if($userid == null){
			$userid = $this->ion_auth->get_user_id();
		}
		return json_decode($this->db->where('id',$userid)->select('settings')->get('users')->row()->settings);
	}
	public function get_user_username($userid = null){
		if($userid == null){
			$userid = $this->ion_auth->get_user_id();
		}
		return $this->db->where('id',$userid)->select('username')->get('users')->row()->username;
	}
	public function get_user_hash($userid = null){
		if($userid == null){
			$userid = $this->ion_auth->get_user_id();
		}
		return $this->db->where('id',$userid)->select('hash')->get('users')->row()->hash;
	}
	public function valid_token($hash, $id){
	    if($this->db->where('hash',$hash)->where('id',$id)->get('users')->num_rows() < 1){
	        return false; 
	    }else{
	        return true;
	    }
	}
	public function get($s,$id = null){
		$id = ($id == null) ? $this->ion_auth->get_user_id() : $id;
		return $this->db->select($s)->where('id',$id)->get('users')->row()->$s;
	}
}