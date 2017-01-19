<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('pagination');
		$config_pagination['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config_pagination['full_tag_close'] = '</ul>';
		$config_pagination['prev_link'] = '&laquo; Ближе';
		$config_pagination['prev_tag_open'] = '<li>';
		$config_pagination['prev_tag_close'] = '</li>';
		$config_pagination['next_tag_open'] = '<li>';
		$config_pagination['next_tag_close'] = '</li>';
		$config_pagination['next_link'] = 'Дальше &raquo;';
		$config_pagination['cur_tag_open'] = '<li class="active"><a href="#">';
		$config_pagination['cur_tag_close'] = '</a></li>';
		$config_pagination['first_tag_open'] = '<li>';
		$config_pagination['first_tag_close'] = '</li>';
		$config_pagination['first_link'] = 'Начало';
		$config_pagination['last_tag_open'] = '<li>';
		$config_pagination['last_tag_close'] = '</li>';
		$config_pagination['last_link'] = 'Кінець';
		$config_pagination['num_tag_open'] = '<li>';
		$config_pagination['num_tag_close'] = '</li>';

		$this->pagination->initialize($config_pagination);
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

	public function all($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		else{
			$id = $this->ion_auth->get_user_id();
			$ask = $this->db->where('is_new',0)->order_by('date_answer',"desc")->where('to',$id)->get('questions',10,$offset);
			$data = array(
				"ask" => $ask->result(),
				);
			$config['base_url'] = base_url().'questions/all';
			$config['num_links'] = 3;
			$config['total_rows'] =  $this->db->where('is_new',0)->order_by('date_answer',"desc")->where('to',$id)->get('questions')->num_rows();
			$config['per_page'] = 10;
			$this->pagination->initialize($config);
			$this->load->view('my_questions_view',$data);
		}
	}

	public function index($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		else{
			$offset = abs($offset);
			$userid = $this->ion_auth->get_user_id();
			$data['id'] = $userid;
			$ask = $this->db->order_by('date','desc')->where('is_new',1)->where('to',$userid)->get('questions',10, $offset);
			if($ask->num_rows() < 1){
				$data['title'] = "Нових питань нема";
				$this->load->view('no_asks_view',$data);
			}
			else{
				$data = array(
					"ask" => $ask->result(),
					);
				$config['base_url'] = base_url().'questions/index';
				$config['num_links'] = 3;
				$config['total_rows'] =  $this->db->order_by('date','desc')->where('is_new',1)->where('to',$userid)->get('questions')->num_rows();
				$config['per_page'] = 10;
				$this->pagination->initialize($config);  
				$data['user_hash'] = $this->db->where('id',$userid)->select('hash')->get('users')->row()->hash;
				$this->load->view('question_view',$data);
			}
		}
	}

	public function delete($hash = false){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$userid = $this->ion_auth->get_user_id();
		$userhash = $this->input->post('token');
		$error = "ok";
		if($hash == false){
			$error = "Не вказане яке питання видалити";
		}elseif ($this->db->where('hash',$hash)->get('questions')->num_rows() < 1) {
			$error = "Такого питання не існує";
		}elseif(!$this->functions->valid_token($userhash,$userid)){
			$error = "Не правильний токен";
		}elseif($this->db->where('to',$userid)->where('hash',$hash)->get('questions')->num_rows() < 1) {
			$error = "Не можна видаляти чужі питання";
		}
		else{
			if(!$this->db->where('to',$userid)->where("hash",$hash)->delete('questions')){
				$error = "Невідома помилка";
			}else{
				if(!$this->db->where('ask_hash', $hash)->delete('comments')){
					$error = "Невідома помилка";	
				}
			}
		}
		echo $error;
	}
	public function getask(){
		if(!$this->ion_auth->logged_in()){
			if($this->input->post('ask') && $this->input->post('id')){
				$id = $this->input->post('id');
				if($this->db->where('id',$id)->get('users')->num_rows() < 1){
					echo "user not found";
				}else{
					$user = $this->db->where('id',$id)->get('users')->row();
					$ask = htmlspecialchars($this->input->post('ask'));
					$ask = trim($ask);
					if(strlen($ask) > 0){
						$data = array(
							"question" => $ask,
							"is_new" => 1,
							"to" => $user->id,
							"from_whom" => null,
							"ip" => $_SERVER['SERVER_ADDR'],
							"hash" => md5($user->id . time()),
							"date" => date('c'),
							"from_know" => 0,
							"public" => 0,
							);
						if($this->db->insert("questions",$data)){
							echo "ok";
						}
						else{
							echo "error";
						}
					}else{
						echo "error";
					}
				}
			}
		}else{
			if($this->input->post('ask') && $this->input->post('id') && $this->input->post('anonymous') && $this->input->post('token')){
				$id = $this->input->post('id');
				if($this->db->where('id',$id)->get('users')->num_rows() < 1){
					echo "user not found";
				}else{
					$user = $this->db->where('id',$id)->get('users')->row();
					$checked = $this->input->post('anonymous');
					$token = $this->input->post('token');
					if(!$from_whom = $this->db->where('hash',$token)->get('users')->row()->id){
						echo "token error";
						exit();
					}
					$ask = htmlspecialchars($this->input->post('ask'));
					$ask = trim($ask);

					if($checked == "false"){
						$public = 1;
					}else{
						$public = 0;
					}
					if(strlen($ask) > 0){
						$data = array(
							"question" => $ask,
							"is_new" => 1,
							"to" => $user->id,
							"from_whom" => $from_whom,
							"ip" => $_SERVER['SERVER_ADDR'],
							"hash" => md5($user->id . time()),
							"date" => date('c'),
							"from_know" => 0,
							"public" => $public,
							);
						if($this->db->insert("questions",$data)){
							echo "ok";
						}
						else{
							echo "error 2";
						}
					}else{
						echo "error";
					}
				}
			}
			else{
				echo "Error 1";
			}
		}
	}
	public function comments($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$id = $this->ion_auth->get_user_id();
			$comments = $this->db->where(array('to' => $id))->order_by('date',"desc")->get('comments',10, $offset);
			if($comments->num_rows() < 1){
				$this->load->view('no_comments_view');
			}
			else{
				$data = array(
					"comments" => $comments->result(),
					);
				$config['base_url'] = base_url().'questions/comments';
				$config['num_links'] = 3;
				$config['total_rows'] =  $this->db->where(array('to' => $id))->order_by('date',"desc")->get('comments')->num_rows();
				$config['per_page'] = 10;
				$this->pagination->initialize($config);

				$this->db->where("to",$id)->update('comments',array('is_new' => 0));
				$this->load->view("comments_view",$data);
			}
		}
	}
	public function load_ask($offset = null,$id = null){
		if($id == null || $offset == null){
			echo "error! no id";
		}
		else{
			$num_rows = $this->db->get_where('questions',array('to' => $id,'is_new' => 0))->num_rows();
			if($num_rows  <= $offset){
				echo "max offset";
			}else{
				$data['delete'] = true;
				$data['ask'] = $this->db->where('to',$id)->where('is_new',0)->order_by("date_answer", "desc")->get('questions',10,$offset)->result();
				$this->load->view('base_question_answer_view', $data);
			}
		}
	}
	public function one($hash = null){
		if($this->db->where('hash',$hash)->where('is_new',0)->get('questions')->num_rows() < 1){
			echo "string";
		}else{
			$question = $this->db->where('hash',$hash)->where('is_new',0)->get('questions')->row();
			$id = $question->to;
			$data['question'] = $question;
			$user = $this->ion_auth->user()->row();
			foreach($user as $kay => $value){
			 	$data['user'][$kay] = $value;
			}
			$data['background'] = ($this->ion_auth->user($id)->row()->background == null) ? "http://cs607728.vk.me/v607728417/12df/IbJ84gF1b_M.jpg" : $this->ion_auth->user($id)->row()->background;
			$data['id'] = $id;
			if($this->ion_auth->logged_in()){
				$this->load->view('login/one_question_view',$data);
			}
			else{
				$this->load->view('not_login/one_question_view',$data);
			}
		}
	}
	public function setask(){
		if($this->ion_auth->logged_in()){
			if($this->input->post('hash')){
				$hash = $this->input->post('hash');
				$token = $this->input->post('token');
				$userid = $this->ion_auth->get_user_id();
				$username = $this->functions->get('username');

				if(!$this->functions->valid_token($token,$userid)){
					$errors['error'] =  "Помилка токена";
					$errors['title'] =  "Помилка токена";
					$errors['id'] = $userid;
					$this->load->view('template/base_error_view',$errors);
				}else{
					if($this->db->where('hash',$hash)->where('to',$userid)->where('answer',null)->get('questions')->num_rows() < 1){
						$errors['error'] =  "Такого питання не існує";
						$errors['title'] =  "Такого питання не існує";
						$errors['id'] = $userid;
						$this->load->view('template/base_error_view',$errors);
					}
					else{
						$answer = $this->input->post('answer');
						$answer = htmlspecialchars($answer);
						$answer = trim($answer);
						$answer = (sizeof($answer) < 1) ? null : $answer;
						
						$config['upload_path'] = './img/answers/'.$username;
						$config['allowed_types'] = 'jpg|png';
						$config['max_size']	= '1024';
						$config['max_width']  = '3000';
						$config['max_height']  = '4000';
						$config['encrypt_name']	= true;
						$this->load->library('upload', $config);

						if (!$this->upload->do_upload()){
							$photo = null;
							$photo_small = null;
						}else{
							$data = $this->upload->data();
							$height = $data['image_width'] - 200;
							$height = $data['image_height'] - $height;
							$config['image_library'] = 'gd2'; // выбираем библиотеку
							$config['source_image']	= "img/answers/".$username."/".$data['file_name'];
							$config['new_image']	= "img/answers/".$username."/small";
							$config['width']	 = 200; // и задаем размеры
							$config['height']	= abs($height);
							//
							//
							$this->load->library('image_lib', $config); // загружаем библиотеку 
							if(!$this->image_lib->resize()){
								echo $this->image_lib->display_errors() . "cant resize image";
								exit();
							}
							$photo = "/img/answers/".$username."/" . $data['file_name'];
							$photo_small = "/img/answers/".$username."/small/" . $data['file_name'];
						}

						if($answer == null and $photo == null){
							$errors['error']  = "Введіть будь ласка відповідь, або виберить картинку";
							$errors['title']  = "Введіть будь ласка відповідь, або виберить картинку";
							$errors['id'] = $userid;
							$this->load->view('template/base_error_view',$errors);
						}else{
							$data = array(
								"is_new" => 0,
								"answer" => $answer,
								"date_answer" => date('c'),
								"photo" => $photo,
								"photo_small" => $photo_small,
								);
							if($this->db->where('hash',$hash)->update('questions',$data)){
								redirect('questions');			
							}
							else{
								$errors['error']  = "Невідома помилка :(";
								$errors['id'] = $userid;
								$this->load->view('template/base_error_view',$errors);
							}
						}	
					}
				}
					}
					else{
						echo "Error hash";
					}
				}
				else{
					echo "Not login user";
				}
	}
	public function answer($offset = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$count = 10;
			$id = $this->ion_auth->get_user_id();
			$questions = $this->db->where(array('from_whom' => $id,"is_new" => "0"))->order_by('date_answer',"desc")->get('questions',$count,$offset);
			if($questions->num_rows() < 1){
				$data['title'] = "Вам не відповіли на жодне питання | Звідай.нет";
				$data['id'] = $id;
				$this->load->view("no_answers_view",$data);			}
			else{
				$data = array(
					"ask" => $questions->result(),
					);
				$config['base_url'] = base_url().'questions/answer';
				$config['num_links'] = 3;
				$config['total_rows'] =  $this->db->where(array('from_whom' => $id,"is_new" => "0"))->order_by('date_answer',"desc")->get('questions')->num_rows();
				$config['per_page'] = $count;
				$this->pagination->initialize($config);
				$quest = $this->db->where(array('from_whom' => $id, "is_new" => "0","from_know" => "0"))->update('questions',array('from_know' => 1));
				$this->load->view("to_me_view",$data);
			}
		}
	}
}