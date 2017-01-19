<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->library('ion_auth');
			$this->load->library('form_validation');
			$this->config->load('titles');
	}

	public function index(){
		if($this->ion_auth->logged_in()){
			redirect('account');
		}
		else{
			redirect("auth/login");
		}
	}
    /************
	*	LOGIN	*
	*************/

	public function login(){
		if($this->ion_auth->logged_in()){
			redirect('account');
		}
		else{
			$data['title'] = "Вхід | Звідай.нет";
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', "Логін", 'required|min_length[4]|max_length[15]|trim');
				$this->form_validation->set_rules('password', "Пароль", 'required|min_length[4]|max_length[15]|trim');
				//
				$this->form_validation->set_message('required', '<b>%s</b> не має боти пустим');
				$this->form_validation->set_message('max_length', '<b>%s</b> не має боти більшим чим %s символів');
				$this->form_validation->set_message('min_length', '<b>%s</b> не має боти меншим чим %s символів');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				if($this->form_validation->run() == false){
					$this->load->view('login_view', $data);
				}
				else{
					if($this->ion_auth->login($username,$password,true)){
						redirect('account');
					}
					else{
						$data['error_login'] = true;
						$this->load->view('login_view',$data);
					}
				}
			}
			else{
				$this->load->view('login_view',$data);
			}
		}
	}

	public function login_1(){
		$this->load->view('template/modal_login_view');
	}
		/*************
		* END LOGIN  *
		*************/

	/********REGISTER********/
	public function register(){
		if($this->ion_auth->logged_in()){
			redirect('account');
		}
		else{
			$data['title'] = $this->config->item('signup');

			if($this->input->post('submit')){
				$this->form_validation->set_rules('name',"Імя і фамілія", 'required|xss_clean|max_length[20]|trim|min_length[4]|htmlspecialchars');
				$this->form_validation->set_rules('username',"Логін", 'required|xss_clean|max_length[15]|min_length[5]|is_unique[users.username]|alpha_dash|callback_login_check');
				$this->form_validation->set_rules('email', "Пошта", 'required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('city',"Місто","max_length[15]|min_length[3]|xss_clean|trim|htmlspecialchars");
				$this->form_validation->set_rules('password', "Пароль", 'required|min_length[5]|max_length[20]|alpha_dash|trim');
				$this->form_validation->set_rules('password_confirm', 'Пароль ще раз', 'required|matches[password]');
				//установка повідомлень
				$this->form_validation->set_message('required', 'Поле "<b>%s</b>" не повинно бути пустим');
				$this->form_validation->set_message('max_length', 'Поле <b>%s</b> не повинно бути більшим ніж %s символів');
				$this->form_validation->set_message('min_length', 'Поле <b>%s</b> не повинно бути меншим ніж %s символів');
				$this->form_validation->set_message('valid_email', 'Укажіть коректну пошту');
				$this->form_validation->set_message('is_unique', 'Нажаль такий адрес вже зайнятий. Придумайте новий');
				$this->form_validation->set_message('matches', '<b>Паролі</b> не співпадають');

				$this->form_validation->set_error_delimiters('<span class="text-danger"><b>', '</b></span>');
				if($this->form_validation->run() == false){
					$this->load->view('reg_view',$data);
				}
				else{
					$name = $this->input->post('name');
					$city = $this->input->post('city');
					$username = $this->input->post('username');
					$username = str_replace(" ", "",$username);
					$email = $this->input->post('email');
					$pass = $this->input->post('password');
					$auth_data = array(
						"name" => $name,
						"city" => $city,
						"username" => $username,
						"hash" => md5($email . "kolya"),
						"photo" => "/media/avatar/300/300x400.png",
						"photo_small" => "/media/avatar/100/100x100.png",
						"photo_big" => null,
						);
					if($this->ion_auth->register($username,$pass,$email,$auth_data,array('1'))){
						mkdir('img/avatars/'.$username);
						mkdir('img/avatars/'.$username ."/100");
						mkdir('img/avatars/'.$username. "/300");
						mkdir('img/avatars/'.$username . "/100s");
						mkdir('img/backgrounds/'.$username);
						mkdir('img/answers/'.$username);
						mkdir('img/answers/'.$username . "/small");

						$this->ion_auth->login($username,$pass,true);
						redirect('account');
					}
					else{
						$this->load->view('reg_view',$data);
					}

				}
			}
			else{
				$this->load->view('reg_view',$data);
			}
		}
	}
	/******LOGOUT******/

	public function logout($hash = null){
		if(!$this->ion_auth->logged_in() or $hash == null){
			redirect('page');
		}
		$user_hash = $this->ion_auth->user()->row()->hash;
		if($hash == $user_hash){
			$this->ion_auth->logout();
			redirect('page');
		}else{
			$data['error'] = "Помилка хеша";
			$data['title'] = "Помилка хеша";
			$data['id'] = $this->ion_auth->get_user_id();
			$this->load->view('template/base_error_view',$data);
		}
	}
	public function login_check($str){
		$logins = array('auth','questions','about','page','account','settings','mail','admin','support','create','media','system','application');
		if (in_array($str, $logins))
		{
			$this->form_validation->set_message('login_check', 'Такий логін вже зайнятий');
			return FALSE;
		}
		else
		{
			return TRUE;
		}

	}
	/******VK******/
	public function vk(){
		$code = $this->input->get('code');
		if($code == ''){
			redirect('page');
			exit();
		}
		$base = base_url();
		$link = "https://oauth.vk.com/access_token?client_id=4110203&client_secret=WSiUtDDqGEpWmtFz3cpe&code=" . $code . "&redirect_uri=".$base."auth/vk";
		$response = json_decode(@file_get_contents($link));
		$token =  $response->access_token;
		$vk_id = $response->user_id;
		if($this->db->where("vk_id",$vk_id)->get("users")->num_rows() > 0){
			$user = $this->db->where("vk_id",$vk_id)->get("users")->row();
			if($this->ion_auth->login($user->username,$user->password_open, true)){
				redirect('account');
			}else{
				echo "error";
			}
		}else{
			$data['token'] = $token;
			$this->load->view('complete_reg_view',$data);
		}
	}
	/******VK UPDATE******/
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
				$link = "https://oauth.vk.com/access_token?client_id=4110203&client_secret=WSiUtDDqGEpWmtFz3cpe&code=" . $code . "&redirect_uri=".base_url()."auth/vk_update";
				$response = json_decode(file_get_contents($link));
				$token =  $response->access_token;
				$user = json_decode(file_get_contents("https://api.vk.com/method/users.get?fields=photo_100,photo_max_orig,photo_200,photo_200_orig&access_token=" . $token));
				$photo_200 = $user->response[0]->photo_200_orig;
				$photo_100 = $user->response[0]->photo_100;
				$photo_big = $user->response[0]->photo_max_orig;
				$data = array(
					"photo" => $photo_200,
					"photo_small" => $photo_100,
					"token" => $token,
					"photo_big" => $photo_big,
					);
				$user_id = $this->ion_auth->get_user_id();
				if($this->ion_auth->update($user_id,$data)){
					redirect('account');
				}
				else{
					$data['error'] = "Невідома помилка. Спробуйте підніше";
					$data['title'] = "Невідома помилка";
					$data['id'] = $user_id;
					$this->load->view('template/base_error_view',$data);
				}
			}
		}
	}

	public function vk_complete(){
		if($this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$token = $this->input->post('token');
			$this->form_validation->set_rules('password',"parol", "required|min_length[5]|max_length[20]|trim|matches[password_confirm]");
			$this->form_validation->set_rules('password_confirm',"parol_confirm", "required");
			$this->form_validation->set_rules('token',"token", "required");
			$this->form_validation->set_rules('email',"email", "valid_email|required|max_length[50]|trim|xss_clean|is_unique[users.email]");

			if($this->form_validation->run() === false){
				$data['token'] = $this->input->post('token');
				$this->load->view('complete_reg_view',$data);
			}else{
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$user = json_decode(@file_get_contents("https://api.vk.com/method/users.get?fields=city,sex,domain,photo_100,photo_200,photo_max_orig,photo_200_orig,status&v=5.5&access_token=" . $token));
				if($user == false){
					redirect('auth/vk');
					exit();
				}
				if(isset($user->error->error_msg)){
					$data['error'] = "Помилка токена. спробуйте ще раз (" . $user->error->error_msg. ")";
					$data['title'] = "Помилка токена";
					$data['id'] = $user_id;
					$this->load->view('template/base_error_view',$data);
					exit();
				}
				$photo_200 = $user->response[0]->photo_200_orig;
				$photo_100 = $user->response[0]->photo_100;
				$photo_big = $user->response[0]->photo_max_orig;
				$domain = $user->response[0]->domain;
				$vk_id = $user->response[0]->id;
				$city = json_decode(file_get_contents("https://api.vk.com/method/database.getCitiesById?city_ids=" . $user->response[0]->city));
				$city = $city->response[0]->name;
				$status = $user->response[0]->status;
				while ($this->db->where('username', $domain)->get('users')->num_rows > 0) {
					$i = 0;
					$domain = $domain . $i;
					$i++;
				}

				$data = array(
					"name" => $user->response[0]->first_name . " " . $user->response[0]->last_name,
					"status" => $status,
					"photo" => $photo_200,
					"photo_big" => $photo_big,
					"city" => $city,
					"photo_small" => $photo_100,
					"vk_id" => $vk_id,
					"token" => $token,
					"password_open" => $password,
					"hash" => md5($email . "kolya"),
					);

				if($this->ion_auth->register($domain,$password,$email,$data,array('1'))){
					$this->ion_auth->login($domain,$password,true);
					redirect('account');
				}else{
					echo "ERROR :(";
					echo $this->ion_auth->errors();
				}
			}
		}
	}

	public function vk_connect($vk_friends = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$code = $this->input->get("code");
			if($code == ''){
				echo "code";
			}else{
				$base = base_url();
				$user_id = $this->ion_auth->get_user_id();
				$s = ($vk_friends == null) ? null : "/1";
				$link = "https://oauth.vk.com/access_token?client_id=4110203&client_secret=WSiUtDDqGEpWmtFz3cpe&code=" . $code . "&redirect_uri=".$base."auth/vk_connect". $s;
				$response = json_decode(@file_get_contents($link));
				if($response == false){
					redirect('account');
					exit();
				}
				if(isset($response->error)){
					$data['error'] = "Помилка токена. Спробуйте ще раз (" . $user->error->error_msg. ")";
					$data['title'] = "Помилка токена";
					$data['id'] = $user_id;
					$this->load->view('template/base_error_view',$data);
					exit();
				}
				$token =  $response->access_token;
				$vk_id = $response->user_id;
				if($this->db->where('vk_id',$vk_id)->get('users')->num_rows() > 0){
					$error['title'] = "Ваша сторінка VK вже привязана до іншого аккаунту Звідай.нет";
					$error['error'] = "Ваша сторінка VK вже привязана до іншого аккаунту Звідай.нет";
					$error['id'] = $user_id;
					$this->load->view('template/base_error_view',$error);
				}else{
					//$user = json_decode(file_get_contents("https://api.vk.com/method/users.get?fields=photo_100&access_token=" . $token));
					$data['vk_id'] = $vk_id;
					if($this->db->where('id',$user_id)->update('users',$data)){
						if($vk_friends != null){
							redirect('account/vk_friends');
						}else{
							$link = "https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri=".base_url()."auth/vk_update&response_type=code&v=5.5";
							redirect($link);
						}
					}
				}
			}
		}
	}
}