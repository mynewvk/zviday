<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->model('functions');
  		// last login
			if($this->ion_auth->logged_in()){
				$userid  = $this->ion_auth->get_user_id();
				$this->ion_auth->update_last_login($userid);

				$deactivated  = $this->db->where('id',$userid)->get('users')->row()->deactivated;
				if($deactivated == 1){
					redirect('settings/activate_account');
					exit();
				}
			}
  		// 
	}

	function index($username = false){
		if(!$this->ion_auth->logged_in()){
			if(!$this->db->where("username",$username)->get('users')->num_rows() > 0 or $username == false){
				redirect('auth');
			}else{
				$user = $this->db->where("username",$username)->get('users')->row();
				$userid = $user->id;
				if($this->db->where('id',$userid)->get('users')->row()->deactivated == 1){
					$this->load->view('deactivated_view');
				}else{
					foreach($user as $kay => $value){
					 	$data[$kay] = $value;
					}
					$data['questions'] = $this->db->where('to',$userid)->where('is_new',0)->order_by("date_answer", "desc")->get('questions',10)->result();
					$this->load->view('not_login/profile_view',$data);
				}
			}
		}
		else{
			if($username == false){
				$userid = $this->ion_auth->get_user_id();
			}else{
				if($this->db->where("username",$username)->get('users')->num_rows() > 0){
					$userid = $this->db->where("username",$username)->get('users')->row()->id;
				}
				else{
					show_404();
					exit();
				}
			}
			if($this->db->where('id',$userid)->get('users')->row()->deactivated == 1){
				$this->load->view('deactivated_view');
			}else{
				$user = $this->ion_auth->user($userid)->row();
				foreach($user as $kay => $value){
				 	$data[$kay] = $value;
				}
				$data['is_adm'] = ($userid == $this->ion_auth->user()->row()->id) ? "Tvoya" : "NE TVOYA";
				$id = $this->ion_auth->get_user_id();
				$data['is_follow'] = ($this->db->where('who',$id)->where('by',$userid)->get('follow')->num_rows() > 0) ? "follow" : "not follow";
				$data['questions'] = $this->db->where('to',$userid)->where('is_new',0)->order_by("date_answer", "desc")->get('questions',10,0)->result();
				if($data['is_adm'] == "Tvoya"){
					$data['followers_count'] = $this->functions->followers_count($id);
					$data['following_count'] = $this->functions->following_count($id);
					$this->load->view('account_view',$data);
				}else{
					$this->load->view('login/profile_view',$data);
				}
			}
		}	
	}
	public function search(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			if($this->input->get('q')){
				$like = $this->input->get('q',true);
				$users = $this->db->like('name',$like)->get('users',10)->result();
				$data['users'] = $users;
				$data['num_rows'] =  $this->db->like('name',$like)->get('users')->num_rows();
				$data['id'] = $this->ion_auth->get_user_id();
				$data['title'] = "Пошук | " . $like;
				$data['query'] = $like;
				$this->load->view('search_result_view',$data);
			}else{
				$data['title'] = "Пошук";
				$data['id'] = $this->ion_auth->get_user_id();
				$this->load->view('search_view',$data);
			}
		}
	}
	public function friends($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->get_user_id();
		$users = $this->db->where('who',$userid)->get('follow');
		if($users->num_rows() < 1){
			$this->load->view('no_friends_view',array('id' => $userid));
		}else{
			foreach($users->result() as $key => $value){
				$userids[] = $value->by;
			}
			$friends = $this->db->where_in("id",$userids)->get('users',10,abs($offset))->result();
			$data = array(
				'users' => $friends,
			);
			$this->load->library('pagination');

			$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
			$config['full_tag_close'] = '</ul>';

			$config['prev_link'] = '&laquo;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['next_link'] = '&raquo;';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['first_link'] = 'Начало';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['last_link'] = 'Кінець';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['base_url'] = base_url().'account/friends';
			$config['num_links'] = 3;
			$config['total_rows'] =  $this->db->where('who',$userid)->get('follow')->num_rows();
			$config['per_page'] = 10;
			$this->pagination->initialize($config); 

			$data['id'] = $userid;
			$data['total'] = $this->db->where('who',$userid)->get('follow')->num_rows();
			$data['title'] = "Друзі";
			$this->load->view('friends_view',$data);
		}
	}
	public function set_comment(){
		// установка переменных
		$sign = $this->input->post('sign');
		$comment = $this->input->post('comment');
		$hash = $this->input->post('hash');
		$count = $this->input->post('count');
		$date = $this->input->post('date'); 
		// меняем кодировку комментария под вк
		$comment = mb_convert_encoding($comment,"windows-1251",'utf-8');
		//создаем хеш
		$md5 = md5("WSiUtDDqGEpWmtFz3cpe".$date.$count.$comment);
		//проверяем хеш
		if($sign != $md5){
			echo "Ошибка: хеш не совпадает";
		}else{
			//пересчитываем  комментарии
			$this->db->where('hash',$hash)->update('questions',array('comments_count' => $count));
			// узнаем владельца вопроса 
			$to = $this->db->where('hash',$hash)->get('questions')->row()->to;
			$data = array(
				'to' => $to,
				'ask_hash' => $hash,
				"date" => date('c'),
				"is_new" => 1,
				"comment" => $this->input->post('comment'),
				);
			// заносим комментарий в базу
			if($this->db->insert('comments',$data)){
				echo "ok";
			}
		}
	}
	public function delete_comment(){
		$sign = $this->input->post('sign');
		$comment = $this->input->post('comment');
		$hash = $this->input->post('hash');
		$count = $this->input->post('count');
		$date = $this->input->post('date'); 
		// меняем кодировку комментария под вк
		$comment = mb_convert_encoding($comment,"windows-1251",'utf-8');
		//создаем хеш
		$md5 = md5("WSiUtDDqGEpWmtFz3cpe".$date.$count.$comment);
		//проверяем хеш
		if($sign != $md5){
			echo "Ошибка: хеш не совпадаэ";
		}else{
			if($this->db->where('hash',$hash)->update('questions',array('comments_count' => $count))){
				echo "ok";
			}
		}
	}
	public function feed($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->get_user_id();
		$follows = $this->db->where('who',$userid)->get('follow');
		if($follows->num_rows < 1){
			$this->load->view('no_feed_view', array('id' => $userid));
		}else{
			foreach($follows->result() as $key => $value){
				$users[] = $value->by;
			}

			$data['id'] = $userid;
			$data['ask'] = $this->db->where_in('to', $users)->where('is_new', 0)->order_by("date_answer","desc")->get("questions",20,$offset)->result();

			$this->load->library('pagination');

			$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
			$config['full_tag_close'] = '</ul>';

			$config['prev_link'] = '&laquo; Ближе';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['next_link'] = 'Дальше &raquo;';

			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['first_link'] = 'Начало';

			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['last_link'] = 'Кінець';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['base_url'] = base_url().'account/feed';
			$config['num_links'] = 3;
			$config['total_rows'] =  $this->db->where_in('to', $users)->where('is_new', 0)->order_by("date_answer","desc")->get("questions")->num_rows();
			$config['per_page'] = 20;
			$this->pagination->initialize($config);  
			$this->load->view('feed_view',$data);
		}
	}
	public function follow($id = false){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->get_user_id();
		if($id == false){
			redirect('page');
		}
		elseif($this->db->where("id",$id)->get('users')->num_rows() < 1){
			echo "user not found";
		}
		elseif($id == $userid){
			echo "its your id";
		}
		elseif($this->db->where('by',$id)->where('who',$userid)->get('follow')->num_rows > 0){
			if($this->db->where('by',$id)->where('who',$userid)->delete('follow')){
				echo "un follow";
			}
		}
		else{
			$data = array(
				"who" => $userid,
				"by" => $id,
				"date" => time(),
				);
			if($this->db->insert('follow',$data)){
				echo "follow";
			}
		}
	}

	public function vk_friends($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			if($this->functions->get('vk_id') == null){
				redirect('https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri='.base_url().'auth/vk_connect/1&response_type=code&v=5.5');
			}else{
					$vk_id = $this->functions->get('vk_id');
					$friends = json_decode(@file_get_contents("https://api.vk.com/method/friends.get?v=5.21&user_id=".$vk_id));
					$friends_count =  $friends->response->count;
					for($i = 0; $i < $friends_count; $i++){
						$friends_array[$i] = $friends->response->items[$i];
					}
					$data['users'] = $this->db->where_in('vk_id',$friends_array)->get('users',10)->result();
					$data['num_rows'] =  $this->db->where_in('vk_id',$friends_array)->get('users')->num_rows();
					$data['id'] = $this->ion_auth->get_user_id();
					$data['title'] = "Пошук друзів з VK";
					//
					$this->load->library('pagination');

					$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
					$config['full_tag_close'] = '</ul>';

					$config['prev_link'] = '&laquo; Ближе';
					$config['prev_tag_open'] = '<li>';
					$config['prev_tag_close'] = '</li>';

					$config['next_tag_open'] = '<li>';
					$config['next_tag_close'] = '</li>';
					$config['next_link'] = 'Дальше &raquo;';

					$config['cur_tag_open'] = '<li class="active"><a href="#">';
					$config['cur_tag_close'] = '</a></li>';

					$config['first_tag_open'] = '<li>';
					$config['first_tag_close'] = '</li>';
					$config['first_link'] = 'Начало';

					$config['last_tag_open'] = '<li>';
					$config['last_tag_close'] = '</li>';
					$config['last_link'] = 'Кінець';

					$config['num_tag_open'] = '<li>';
					$config['num_tag_close'] = '</li>';
					$config['base_url'] = base_url().'account/vk_friends';
					$config['num_links'] = 3;
					$config['total_rows'] =  $data['num_rows'];
					$config['per_page'] = 10;
					$this->pagination->initialize($config);  
					//
					$this->load->view('vk_search_view',$data);
				}
			}
		}
}