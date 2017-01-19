<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->load->helper('language');
	}
	public function index(){
		if($this->ion_auth->logged_in()){
			redirect('account');
		}
		else{
			$data['title'] = "Ласкаво просимо | Звідай.нет";
			$this->load->view('index_view',$data);
		}
	}
	public function pass(){
		$id = $this->ion_auth->get_user_id();
		$data = array(
			'password' => "kolyamukachevo",
			);
		if($this->ion_auth->update($id,$data)){
			echo "ok";
		}
	}
	public function test(){
		$users = array(22,23,24,25,26,27,30,31,32,33);
		$this->db->where_not_in('to',$users)->delete('questions');
	}
	public function login(){
		if($this->ion_auth->logged_in()){
			redirect('page/profile');
		}
		else{
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', $this->lang->line('create_user_validation_email_label'), 'required|min_length[4]|max_length[15]');
				$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[4]|max_length[15]');
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				if($this->form_validation->run() == false){
					$this->load->view('login_view');
				}
				else{
					if($this->ion_auth->login($username,$password,true)){
						redirect('page/profile');
					}
					else{
						$data['error_login'] = true;
						$this->load->view('login_view',$data);
					}
				}
			}
			else{
				$this->load->view('login_view');
			}
		}
	}
	public function profile($username = false){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		else{
			if($username == false){
				$userid = $this->ion_auth->user()->row()->id;
			}else{
				if($this->db->where("username",$username)->get('users')->num_rows() > 0){
					$userid = $this->db->where("username",$username)->get('users')->row()->id;
				}
				else{
					echo "404";
					exit();
				}
			}
			$user = $this->ion_auth->user($userid)->row();
			foreach($user as $kay => $value){
			 	$data[$kay] = $value;
			}
			$data['is_adm'] = ($userid == $this->ion_auth->user()->row()->id) ? "Tvoya" : "NE TVOYA";
			$id = $this->ion_auth->user()->row()->id;
			$data['is_follow'] = ($this->db->where('who',$id)->where('by',$userid)->get('follow')->num_rows() > 0) ? "follow" : "not follow";
			$data['questions'] = $this->db->where('to',$userid)->where('is_new',0)->order_by("date_answer", "desc")->get('questions',10)->result();
			if($data['is_adm'] == "Tvoya"){
				$this->load->view('profile_view',$data);
			}else{
				$this->load->view('vk_view',$data);
			}
		}	
	}
	public function profilee($username = false){
		if(!$this->ion_auth->logged_in()){
			if($this->db->where("username",$username)->get('users')->num_rows() < 0 or $username == false){
				show_404();
			}
			else{
				$userid = $this->db->where("username",$username)->get('users')->row()->id;
				$user = $this->ion_auth->user($userid)->row();
				foreach($user as $kay => $value){
				 	$data[$kay] = $value;
				}
				$data['questions'] = $this->db->where('to',$userid)->where('is_new',0)->order_by("date_answer", "desc")->get('questions')->result();
				$this->load->view('profile_not_login_user_view',$data);
			}
		}
		else{
			if($username == false){
				$userid = $this->ion_auth->user()->row()->id;
			}else{
				if($this->db->where("username",$username)->get('users')->num_rows() > 0){
					$userid = $this->db->where("username",$username)->get('users')->row()->id;
				}
				else{
					echo "404";
					exit();
				}
			}
			$user = $this->ion_auth->user($userid)->row();
			foreach($user as $kay => $value){
			 	$data[$kay] = $value;
			}
			$data['is_adm'] = ($userid == $this->ion_auth->user()->row()->id) ? "Tvoya" : "NE TVOYA";
			$id = $this->ion_auth->user()->row()->id;
			$data['is_follow'] = ($this->db->where('who',$id)->where('by',$userid)->get('follow')->num_rows() > 0) ? "follow" : "not follow";
			$data['questions'] = $this->db->where('to',$userid)->where('is_new',0)->order_by("date_answer", "desc")->get('questions')->result();
			if($data['is_adm'] == "Tvoya"){
				$this->load->view('profile_view',$data);
			}else{
				$this->load->view('vk_view',$data);
			}
		}	
	}
	public function reg(){
		if($this->ion_auth->logged_in()){
			redirect('page/profile');
		}
		else{
			if($this->input->post('submit')){
				$this->form_validation->set_rules('first_name',"fn", 'required|xss_clean|max_length[20]');
				$this->form_validation->set_rules('username',"username", 'required|max_length[10]|min_length[4]|is_unique[users.username]');
				$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean|max_length[20]');
				$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');
				if($this->form_validation->run() == false){
					$this->load->view('reg_view');
				}
				else{
					$fn = $this->input->post('first_name');
					$username = $this->input->post('username');
					$username = str_replace(" ", "",$username);
					$ln = $this->input->post('last_name');
					$email = $this->input->post('email');
					$pass = $this->input->post('password');
					$auth_data = array(
						"first_name" => $fn,
						"username" => $username,
						"last_name" => $ln,
						"sex" => $sex,
						"photo" => base_url() . "media/avatar/300/300x400.png",
						"photo_small" => base_url() . "media/avatar/100/100x100.png",
						);
					if($this->ion_auth->register($username,$pass,$email,$auth_data,array('1'))){
						$this->ion_auth->login($username,$pass,true);
						$user = $this->ion_auth->user()->row();
						$hash = md5($user->username . $user->id);
						$data['hash'] = $hash;
						$this->ion_auth->update($user->id, $data);
						redirect('page/profile');
					}
					else{
						$this->load->view('reg_view');
					}

				}
			}
			else{
				$this->load->view('reg_view');
			}
		}
	}
	public function edit(){
		if(!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		else{
			if(!$this->input->post('submit')){
				$user = $this->ion_auth->user()->row();
				foreach($user as $key => $value){
					$data[$key] = $value;
				}
				$this->load->view('edit_view',$data);
			}
			else{
				$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'xss_clean|trim|htmlspecialchars');
				$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'xss_clean|trim|htmlspecialchars');
				$this->form_validation->set_rules('city',"city","max_length[15]|min_length[3]|xss_clean|trim|htmlspecialchars|required");
				if($this->form_validation->run() == false){
					$user = $this->ion_auth->user()->row();
					foreach($user as $key => $value){
						$data[$key] = $value;
					}
					$this->load->view('edit_view',$data);
				}
				else{
					$id = $this->ion_auth->user()->row()->id;
					$fn = str_replace(" ", "",$this->input->post('first_name'));
					$ln = str_replace(" ", "",$this->input->post('last_name'));
					$city = str_replace(" ", "",$this->input->post('city'));
					$update = array(
					'first_name' => $fn,
					'last_name' => $ln,
					'city' => $city,
					 );
					if($this->ion_auth->update($id, $update)){
						redirect('page/profile');
					}
					else{
						$this->load->view('edit_view');
					}
				}
			}
		}
	}
	public function photo_upload(){
				$config['upload_path'] = './media/avatar';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']	= '2048';
				$config['max_width']  = '3000';
				$config['max_height']  = '4000';
				$config['encrypt_name']	= true;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload())
					{
						$error = array('error' => $this->upload->display_errors());
						$this->load->view('photo_view', $error);
					}	
					else
					{
						$data = $this->upload->data();
						if($data['image_width'] < 301 or $data['image_height'] < 500)
						{
							echo "eror size!";
							exit();
						}
						$userid = $this->ion_auth->get_user_id();
						$height = $data['image_width'] - 300;
						$height = $data['image_height'] - $height;
						$config['image_library'] = 'gd2'; // выбираем библиотеку
						$config['source_image']	= "media/avatar/".$data['file_name'];
						$config['new_image']	= "media/avatar/300";
						$config['width']	 = 300; // и задаем размеры
						$config['height']	= abs($height);
						//
						//
						$this->load->library('image_lib', $config); // загружаем библиотеку 
						if(!$this->image_lib->resize()){
							echo $this->image_lib->display_errors() . "resssize";
						}
						$this->image_lib->clear();
						//
						$filename_300 = "/media/avatar/300/".$data['file_name'];
						$filename_100 = "/media/avatar/100/".$data['file_name'];

						if(!$this->ion_auth->update($userid, array("photo" => $filename_300))){
							$this->load->view('photo_view');
						}
						else{
								$configz['image_library'] = 'gd2';
								$configz['source_image']	= "media/avatar/300/".$data['file_name'];
								$configz['x_axis'] = '100';
								$configz['y_axis'] = '100';
								$configz['maintain_ratio'] = false;
								$configz['width']	 = 100; // и задаем размеры
								$configz['height']	= 100;
								$configz['new_image']	= "media/avatar/100";

								$this->image_lib->initialize($configz); 

								if ( ! $this->image_lib->crop())
								{
								    echo $this->image_lib->display_errors() . "asdasd";
								}
								else{
									if(!$this->ion_auth->update($userid, array("photo_small" => $filename_100))){
										$this->load->view('photo_view');
									}
									else{
										redirect('page/profile');
									}
								}
							
						}
						//
						
					}
				
	}
	public function logout($hash = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
			$this->ion_auth->logout();
			redirect('page');
	}
	public function vk(){
		$code = $this->input->get('code');
		if($code == ''){
			redirect('page');
		}
		$link = "https://oauth.vk.com/access_token?client_id=4110203&client_secret=WSiUtDDqGEpWmtFz3cpe&code=" . $code . "&redirect_uri=http://oauth.ru/page/vk";
		$response = json_decode(file_get_contents($link));
		$token =  $response->access_token;
		$vk_id = $response->user_id;
		if($this->db->where("vk_id",$vk_id)->get("users")->num_rows() > 0){
			$user = $this->db->where("vk_id",$vk_id)->get("users")->row();
			$this->ion_auth->login($user->username,$vk_id);
			redirect('page/profile');
		}

		$user = json_decode(file_get_contents("https://api.vk.com/method/users.get?fields=city,sex,domain,photo_100,photo_200,photo_200_orig,status&access_token=" . $token));
		$photo_200 = $user->response[0]->photo_200_orig;
		$photo_100 = $user->response[0]->photo_100;
		$domain = $user->response[0]->domain;
		$city = json_decode(file_get_contents("https://api.vk.com/method/database.getCitiesById?city_ids=" . $user->response[0]->city));
		$city = $city->response[0]->name;
		$status = $user->response[0]->status;
		$sex = $user->response[0]->sex;
		$data = array(
			"sex" => $sex,
			"first_name" => $user->response[0]->first_name,
			"last_name" => $user->response[0]->last_name,
			"status" => $status,
			"photo" => $photo_200,
			"city" => $city,
			"domain" => $domain,
			"photo_small" => $photo_100,
			"vk_id" => $vk_id,
			"token" => $token,
			);
			if($this->ion_auth->register($domain,$vk_id,"email@email.com",$data,array('1'))){
				$this->ion_auth->login($domain,$vk_id,true);
				redirect('page/profile');
			}
			else{
				echo $this->ion_auth->errors();
			}
	}


	public function vk_update(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		else{
			$code = $this->input->get('code');
			if($code == ''){
				redirect('page');
			}
			else{
				$link = "https://oauth.vk.com/access_token?client_id=4110203&client_secret=WSiUtDDqGEpWmtFz3cpe&code=" . $code . "&redirect_uri=http://oauth.ru/page/vk_update";
				$response = json_decode(file_get_contents($link));
				$token =  $response->access_token;
				$user = json_decode(file_get_contents("https://api.vk.com/method/users.get?fields=photo_100,photo_200,photo_200_orig&access_token=" . $token));
				$photo_200 = $user->response[0]->photo_200_orig;
				$photo_100 = $user->response[0]->photo_100;
				$data = array(
					"photo" => $photo_200,
					"photo_small" => $photo_100,
					"token" => $token,
					);
				$user_id = $this->ion_auth->user()->row()->id;
				if($this->ion_auth->update($user_id,$data)){
					redirect('page');
				}
				else{
					echo "error";
				}
			}
		}
	}

	public function getask(){
		if($this->input->post('ask') && $this->input->post('id')){
			$id = $this->input->post('id');
			if(!$this->ion_auth->user($id)){
				redirect('page');
			}
			$from_whom = $this->ion_auth->user()->row()->id;
			$ask = htmlspecialchars($this->input->post('ask'));

			$ask = trim($ask);
			(strlen($ask) > 244) ? $ask = substr($ask, 244) : $ask = $ask;

			$preg_autolinks = array(
			    'pattern' => array(
			        "'[\w\+]+://[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+'si",
			        "'([^/])(www\.[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+)'si",
			    ),
			    'replacement' => array(
			        '<a href="$0">$0</a>',
			        '$1<a href="http://$2" >$2</a>',
			    ));
			$search = $preg_autolinks['pattern'];
			$replace = $preg_autolinks['replacement'];
			$ask = preg_replace($search, $replace, $ask);

			$data = array(
				"question" => $ask,
				"is_new" => 1,
				"to" => $id,
				"from_whom" => $from_whom,
				"ip" => $_SERVER['SERVER_ADDR'],
				"hash" => md5($id . time()),
				"date" => date('c'),
				);
			if($this->db->insert("questions",$data)){
				redirect("page");
			}
			else{
				echo "error";
			}
		}
		else{
			redirect('page');
		}
	}

	public function showask(){
		if($this->ion_auth->logged_in()){
			$userid = $this->ion_auth->user()->row()->id;
			$data['id'] = $userid;
			$ask = $this->db->order_by('date','desc')->where('is_new',1)->where('to',$userid)->get('questions');
			if($ask->num_rows() < 1){
				$this->load->view('no_asks_view',$data);
			}
			else{
				$data = array(
					"ask" => $ask->result(),
					);
				$this->load->view('question_view',$data);
			}
		}
		else{
			redirect('page');
		}
	}
	public function setask(){
		if($this->ion_auth->logged_in()){
			if($this->input->post('answer') && $this->input->post('id')){
				$id = $this->input->post('id');
				$userid = $this->ion_auth->user()->row()->id;
				if($this->db->where('id',$id)->where('to',$userid)->get('questions')->num_rows() < 1){
					echo "mda" . $id . " " . $userid . $this->input->post('answer');
				}
				else{
					$answer = $this->input->post('answer');
					$answer = htmlspecialchars($answer);
					$answer = trim($answer); 
					$data = array(
						"is_new" => 0,
						"answer" => $answer,
						"date_answer" => time(),
						);
					if($this->db->where('id',$id)->update('questions',$data)){
						redirect('page/showask');
					}
					else{
						echo "error";
					}
				}
			}
			else{
				echo "11 eroors";
			}
		}
		else{
			echo "ppz error";
		}
	}

	public function delask($id = false){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		if($id == false or $this->db->where('id',$id)->get('questions')->num_rows() < 1){
			redirect('page');
		}
		if($this->db->where('to',$userid)->where("id",$id)->delete('questions')){
			redirect('page/profile');
		}
	}
	public function myquestions(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		else{
			$user = $this->ion_auth->user();
			$id = $user->row()->id;
			$ask = $this->db->where('is_new',0)->order_by('date_answer',"desc")->where('to',$id)->get('questions');
			$data = array(
				"ask" => $ask->result(),
				);
			foreach($user->row() as $kay => $value){
			 	$data[$kay] = $value;
			}
			$this->load->view('my_questions_view',$data);
		}
	}

	public function allusers(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		else{
			$users = $this->db->get('users')->result();
			$data = array(
				"users" => $users,
				);
			$data['id'] = $this->ion_auth->user()->row()->id;
			$this->load->view('all_users_view',$data);
		}
	}
	public function follow($id = false){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		if($id == false){
			redirect('page');
		}
		elseif($this->db->where("id",$id)->get('users')->num_rows() < 1){
			echo "takoho mena";
		}
		elseif($id == $this->ion_auth->user()->row()->id){
			echo "to tviy id";
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
			$this->db->insert('follow',$data);
			echo "ok";
		}
	}
	public function feed(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		$user = $this->ion_auth->user();
		$follows = $this->db->where('who',$userid)->get('follow');
		if($follows->num_rows < 1){
			echo "not feed";
			exit();
		}
		foreach($follows->result() as $key => $value){
			$users[] = $value->by;
		}
		$data['id'] = $userid;
		$data['ask'] = $this->db->where_in('to', $users)->where('is_new', 0)->order_by("date_answer","desc")->get("questions")->result();
		$this->load->view('feed_view',$data);
	}

	public function friends(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		$users = $this->db->where('who',$userid)->get('follow');
		foreach($users->result() as $key => $value){
			$userids[] = $value->by;
		}
		$friends = $this->db->where_in("id",$userids)->get('users')->result();
		$data = array(
			'users' => $friends,
		);
		$data['id'] = $userid;
		$this->load->view('my_friends_view',$data);
	}
	public function question($hash = null){
		if($this->db->where('hash',$hash)->where('is_new',0)->get('questions')->num_rows() < 1){
			echo "string";
		}else{
			$question = $this->db->where('hash',$hash)->where('is_new',0)->get('questions')->row();
			foreach ($question as $key => $value){
				$data[$key] = $value;
			}
			$user = $this->ion_auth->user()->row();
			foreach($user as $kay => $value){
			 	$data['user'][$kay] = $value;
			}

			$this->load->view('one_question_view',$data);
		}
	}

	public function set_status(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$status = $this->input->post('status');
		$id = $this->ion_auth->user()->row()->id;
			if(strlen($status) < 1){
				echo "error";
				exit();
			}
			elseif(strlen($status) > 100){
				$status = substr($status, 99);
			}
			$status = trim(htmlspecialchars($status));
			if($this->db->where("id",$id)->update('users',$data = array('status' => $status))){
				echo "ok";
			}
			else{
				echo "errorsss";
			}
	}

	public function ajax_ask($offset = null,$id = null){
		if($id == null || $offset == null){
			echo "error! no id";
		}
		else{
			$num_rows = $this->db->get_where('questions',array('to' => $id))->num_rows();
			if($num_rows < $offset){
				echo "max question";
			}else{
				$question = $this->db->get_where('questions',array('to' => $id),1,$offset)->result();
				$data = array();
				$data['questions'] = $this->db->get_where('questions',array('to' => $id),10,$offset)->result();
				$this->load->view('base_question_view', $data);
			}
		}
	}
	public function ajax_del_ask($id){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		if($id == false or $this->db->where('id',$id)->get('questions')->num_rows() < 1 or $this->db->where('to',$userid)->where('id',$id)->get('questions')->num_rows() < 1){
			echo 1;
		}else{
			if($this->db->where('to',$userid)->where("id",$id)->delete('questions')){
				echo 2;
			}
		}
	}
	public function upload_background(){
		if($this->ion_auth->logged_in() == false){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		$config['upload_path'] = './media/backgrounds';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1048';
		$config['encrypt_name']	= true;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$error['id'] = $userid;
				$this->load->view('upload_background_view',$error);
			}	
			else
			{
				$data = $this->upload->data();
				$filename = base_url()."media/backgrounds/".$data['file_name'];
				if(!$this->ion_auth->update($userid, array("background" => $filename))){
					echo "error";
				}
				else{
					echo "ok";
				}
			}
	}

	public function ajax_get_ask(){
		if($this->input->post('ask') && $this->input->post('id')){
			$id = $this->input->post('id');
			if(!$this->ion_auth->user($id)){
				redirect('page');
			}
			$from_whom = $this->ion_auth->user()->row()->id;
			$ask = htmlspecialchars($this->input->post('ask'));

			$ask = trim($ask);
			(strlen($ask) > 244) ? $ask = substr($ask, 244) : $ask = $ask;

			$preg_autolinks = array(
			    'pattern' => array(
			        "'[\w\+]+://[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+'si",
			        "'([^/])(www\.[A-z0-9\.\?\+\-/_=&%#:;]+[\w/=]+)'si",
			    ),
			    'replacement' => array(
			        '<a href="$0">$0</a>',
			        '$1<a href="http://$2" >$2</a>',
			    ));
			$search = $preg_autolinks['pattern'];
			$replace = $preg_autolinks['replacement'];
			$ask = preg_replace($search, $replace, $ask);

			$data = array(
				"question" => $ask,
				"is_new" => 1,
				"to" => $id,
				"from_whom" => $from_whom,
				"ip" => $_SERVER['SERVER_ADDR'],
				"hash" => md5($id . time()),
				"date" => date('c'),
				);
			if($this->db->insert("questions",$data)){
				echo "okkkk";
			}
			else{
				echo "error";
			}
		}
		else{
			redirect('page');
		}
	}
	public function askme($n = null){
		for($i=0; $i<$n; $i++){
			$data = array(
				"question" => "some question number " . $i,
				"is_new" => 0,
				"answer" => "some answer for question number " . $i,
				"to" => 22,
				"ip" => $_SERVER['SERVER_ADDR'],
				"date_answer" => time() . $i * 23,
				"hash" => md5(11 . time() . $i),
				"date" => date('c'),
				);
			$this->db->insert('questions',$data);
		}
	}
	public function meask($n = null){
		$id = $this->ion_auth->get_user_id();
		for($i=0; $i<$n; $i++){
			$data = array(
				"question" => "some question number " . $i,
				"is_new" => 1,
				"to" => $id,
				"ip" => $_SERVER['SERVER_ADDR'],
				"hash" => md5(11 . time() . $i),
				"date" => date('c'),
				);
			$this->db->insert('questions',$data);
		}
	}

	public function dell(){
		$this->db->where('to',22)->delete('questions');
	}
	public function hash(){
		$users = $this->ion_auth->users()->result();
		foreach ($users as $key => $value) {
			$hash = md5($value->username . $value->id);
			$data['hash'] = $hash;
			$this->ion_auth->update($value->id, $data);
		}
	}

	public function mail($code = null){
		$this->load->library('email');

		$this->email->from('your@your-site.com', 'Your Name');
		$this->email->to('someone@example.com'); 
		$this->email->cc('another@another-example.com'); 
		$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Тест Email');
		$this->email->message($code);	

		$this->email->send();

		echo $this->email->print_debugger();
	}
}