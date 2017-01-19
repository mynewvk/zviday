<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index($settings_ok = null){
		if(!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		else{
			$gid = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$gid)->get('users')->row()->deactivated;
			if($deactivated == 1){
				redirect('settings/activate_account');
				exit();
			}
			$data['settings_ok'] = ($settings_ok != null) ? $settings_ok : null;
			$data['title'] = "Основні";
			if(!$this->input->post('submit')){
				$user = $this->ion_auth->user()->row();
				foreach($user as $key => $value){
					$data[$key] = $value;
				}
				$this->load->view('edit_view',$data);
			}
			else{
				$this->form_validation->set_rules('name', "Імя та фамілія", 'xss_clean|trim|htmlspecialchars|required|min_length[3]|max_length[20]');
				$this->form_validation->set_rules('city',"Місто","max_length[15]|min_length[3]|xss_clean|trim|htmlspecialchars");
				$this->form_validation->set_rules('ask_about',"Заголовок","max_length[100]|min_length[3]|xss_clean|trim|htmlspecialchars");
				$user = $this->ion_auth->user()->row();
				foreach($user as $key => $value){
					$data[$key] = $value;
				}
				if($this->form_validation->run() == false){
					$this->load->view('edit_view',$data);
				}
				else{
					$id = $this->ion_auth->get_user_id();
					$city = str_replace(" ", "",$this->input->post('city'));
					$ask_about = $this->input->post('ask_about');
					$name = $this->input->post('name');
					$update = array(
						'name' => $this->input->post('name'),
						'city' => $city,
						'ask_about' => $this->input->post('ask_about'),
					 );
					if($this->ion_auth->update($id, $update)){
						$data['settings_ok'] = true;
						$data['city'] = $city;
						$data['ask_about'] = $ask_about;
						$data['name'] = $name;
						$this->load->view('edit_view',$data);
					}
					else{
						$this->load->view('edit_view');
					}
				}
			}
		}
	}

	public function background(){
		if($this->ion_auth->logged_in() == false){
			redirect('page');
		}
		$userid = $this->ion_auth->user()->row()->id;
		$deactivated  = $this->db->where('id',$userid)->get('users')->row()->deactivated;
		if($deactivated == 1){
			redirect('settings/activate_account');
			exit();
		}
		$username = $this->functions->get('username');
		$config['upload_path'] = './img/backgrounds/'.$username;
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1048';
		$config['encrypt_name']	= true;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$error['id'] = $userid;
				$error['title'] = "Оформлення";		
				$this->load->view('upload_background_view',$error);
			}	
			else
			{
				$data = $this->upload->data();
				$filename = "/img/backgrounds/".$username."/".$data['file_name'];
				if(!$this->ion_auth->update($userid, array("background" => $filename))){
					$this->load->view('upload_background_view',$error);
				}
				else{
					redirect('account');
				}
			}
	}
	public function photo_upload(){
		if($this->ion_auth->logged_in() == false){
			redirect('page');
		}
		$userid = $this->ion_auth->get_user_id();
		$deactivated  = $this->db->where('id',$userid)->get('users')->row()->deactivated;
		if($deactivated == 1){
			redirect('settings/activate_account');
			exit();
		}
		$username = $this->functions->get('username');
		$config['upload_path'] = './img/avatars/'.$username ."/";
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$config['max_width']  = '3000';
		$config['max_height']  = '4000';
		$config['encrypt_name']	= true;
		$this->load->library('upload', $config);		
		if (!$this->upload->do_upload())
			{
				$data = array('error' => $this->upload->display_errors());
				$data['id'] = $userid;
				$data['title'] = "Аватар";
				$data['photo'] = $this->db->select('photo')->where('id',$userid)->get('users')->row()->photo;
				$this->load->view('photo_view', $data);
			}	
			else
			{
				$data = $this->upload->data();
				if($data['image_width'] < 300 or $data['image_height'] < 300)
				{
					echo "Ширина або висота файлу не коректна";
					exit();
				}
				if(!$this->ion_auth->update($userid,array('photo_big' => "/img/avatars/".$username."/". $data['file_name']))){
					echo "error";
				}
				$s = 300 /  $data['image_width'];
				$height = $data['image_height'] * $s;
				$height = round($height);
				$config['image_library'] = 'gd2'; // выбираем библиотеку
				$config['source_image']	= './img/avatars/'.$username."/".$data['file_name'];
				$config['new_image']	= "img/avatars/".$username."/300";
				$config['width']	 = 300; // и задаем размеры
				$config['height']	= $height;
				//
				//
				$this->load->library('image_lib', $config); // загружаем библиотеку 
				if(!$this->image_lib->resize()){
					echo $this->image_lib->display_errors() . "resssize";
				}
				$this->image_lib->clear();
				//
				$filename_300 = "/img/avatars/".$username."/300/".$data['file_name'];
				$filename_100 = "/img/avatars/".$username."/100/".$data['file_name'];

				if(!$this->ion_auth->update($userid, array("photo" => $filename_300))){
					$this->load->view('photo_view');
				}
				else{
						$data_img = $this->upload->data();
						if($data_img['image_height'] >= $data_img['image_width']){
							$configz['width']	 = 100; // и задаем размеры
							$configz['height']	= $data_img['image_height'] * 0.3;
						}else{
							$configz['height']	= 100; // и задаем размеры
							$configz['width']	= $data_img['image_width'] * 0.3;
						}
						$configz['image_library'] = 'gd2';
						$configz['new_image'] = "img/avatars/".$username."/100s";
						$configz['source_image']	= "img/avatars/".$username."/300/".$data['file_name'];


						$this->image_lib->initialize($configz); 

						if (!$this->image_lib->resize())
						{
						    echo $this->image_lib->display_errors() . 1;
						}
						else{
							$this->image_lib->clear();

							$crop['image_library'] = 'gd2';
							$crop['source_image']	= "img/avatars/".$username."/100s/".$data['file_name'];
							$crop['maintain_ratio'] = false;
							$crop['width']	 = 100; // и задаем размеры
							$crop['height']	= 100;
							$crop['new_image']	= "img/avatars/".$username."/100";

							$this->image_lib->initialize($crop); 
							if(!$this->image_lib->crop()){
								echo $this->image_lib->display_errors();
							}

							if(!$this->ion_auth->update($userid, array("photo_small" => $filename_100))){
								$this->load->view('photo_view',$data);
							}
							else{
								redirect('account');
							}
						}
					
				}
				
			}
	}
	public function set_status(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}
		$gid = $this->ion_auth->get_user_id();
		$deactivated  = $this->db->where('id',$gid)->get('users')->row()->deactivated;
		if($deactivated == 1){
			redirect('settings/activate_account');
			exit();
		}
		$this->load->helper('question');
		$status = $this->input->post('status');
		$id = $this->ion_auth->user()->row()->id;
		$status = (strlen($status) < 1) ? null : $status;
			if(strlen($status) > 100){
				$status = substr($status, 99);
			}
			$status = trim(htmlspecialchars($status));
			if($this->db->where("id",$id)->update('users',$data = array('status' => $status))){
				echo emoji_replace($status);
			}
			else{
				echo "error";
			}
	}
	public function change_password(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$userid = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$userid)->get('users')->row()->deactivated;
			if($deactivated == 1){
				redirect('settings/activate_account');
				exit();
			}
			$data['id'] = $userid;
			$data['title'] = "Зміна паролю";
			if(!$this->input->post('submit')){
				$this->load->view('change_password_view',$data);
			}else{
				$this->form_validation->set_rules('password', "Пароль", 'required|min_length[5]|max_length[20]|alpha_dash|trim|xss_clean');
				$this->form_validation->set_rules('new_password',"Новий пароль","required|max_length[20]|min_length[5]|xss_clean|alpha_dash|trim|htmlspecialchars");
				$this->form_validation->set_rules('new_password_confirm',"Новий пароль","required|max_length[20]|min_length[5]|matches[new_password]");

				//установка повідомлень
				$this->form_validation->set_message('required', 'Поле "<b>%s</b>" не повинно бути пустим');
				$this->form_validation->set_message('max_length', 'Поле <b>%s</b> не повинно бути більшим ніж %s символів');
				$this->form_validation->set_message('min_length', 'Поле <b>%s</b> не повинно бути меншим ніж %s символів');
				$this->form_validation->set_message('valid_email', 'Укажіть коректну пошту');
				$this->form_validation->set_message('matches', '<b>Паролі</b> не співпадають');
				$this->form_validation->set_message('alpha_dash', 'Поле <b>%s</b> повинно бути лише з букв латинського алфавіту');

				if($this->form_validation->run() == false){
					$this->load->view('change_password_view',$data);
				}else{
					$password = $this->input->post('password');
					$password_new = $this->input->post('new_password');
					$user_password = $this->ion_auth->user()->row()->password_open;
					if($password != $user_password){
						$data['error'] = "Не правильний пароль";
						$this->load->view('change_password_view',$data);
					}else{
						$update['password'] = $password_new;
						if($this->ion_auth->update($userid, $update)){
							$this->db->where('id',$userid)->update('users', array('password_open' => $this->input->post('new_password')));
							$data['settings_ok'] = true;
							$this->load->view('change_password_view',$data);
						}else{
							$data['error'] = "Невідома помилка";
							$this->load->view('change_password_view',$data);
						}
					}
				}
			}
		}
	}

	public function other(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$userid = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$userid)->get('users')->row()->deactivated;
			if($deactivated == 1){
				redirect('settings/activate_account');
				exit();
			}
			if(isset($_POST['submit'])){
				$hash = $this->input->post('hash');
				if($this->db->select('hash')->where('hash',$hash)->where('id',$userid)->get('users')->num_rows() < 1 or !isset($_POST['hash'])){
					$error['id'] = $userid;
					$error['error'] = "Помилка хеша";
					$this->load->view('template/base_error_view',$error);
 				}else{
					$show_vk_link = (bool) $this->input->post('show_vk_link');
					$can_comment = (bool) $this->input->post('can_comment');

					$json['show_vk_link'] = $show_vk_link;
					$json['can_comment'] = $can_comment;

					if($this->functions->user_update_settings($json)){
						redirect('settings/index/1');
					}else{
						echo "error";
					}
				}
			}else{
				redirect('settings');
			}
		}
	}

	public function delete_background(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$gid = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$gid)->get('users')->row()->deactivated;
			if($deactivated == 1){
				redirect('settings/activate_account');
				exit();
			}
			if(!$this->input->post('hash')){
				echo "error hash";
			}else{
				$hash = $this->input->post('hash');
				if($this->db->where('hash',$hash)->get('users')->num_rows() < 1){
					echo "not hash";
				}else{
					$data['background'] = null;
					if($this->db->where('hash',$hash)->update('users',$data)){
						redirect('account');
					}
				}
			}
		}
	}

	public function delete_photo($hash = null){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$id = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$id)->get('users')->row()->deactivated;
			if($deactivated == 1){
				redirect('settings/activate_account');
				exit();
			}
			if(!$this->functions->valid_token($hash,$id)){
				echo "error hash!";
			}else{
				if($this->db->where('id',$id)->update('users',array('photo' => "/media/avatar/300/300x400.png", 'photo_big'=> null, "photo_small" => "/media/avatar/100/100x100.png"))){
					redirect('account');
				}
			}
		}
	}
	public function activate_account(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$userid = $this->ion_auth->get_user_id();
			if($this->db->where('id',$userid)->get('users')->row()->deactivated == 0){
				redirect('account');
			}else{
				$data['link'] = "/settings/activate_account_hash/" . $this->functions->get('hash');
				$this->load->view('activate_account_view',$data);
			}
		}
	}

	public function activate_account_hash($hash = null){
		if(!$this->ion_auth->logged_in() or $hash == null){
			redirect('page');
		}else{
			$id = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$id)->get('users')->row()->deactivated;
			if($deactivated == 0){
				redirect('account');
				exit();
			}else{
				if(!$this->functions->valid_token($hash,$id)){
					redirect('account');
				}else{
					if($this->db->where('id',$id)->update('users',array('deactivated'=> 0))){
						$this->load->view('complate_activate_account_view');
					}
				}
			}
		}
	}

	public function deactivate_account($hash = null){
		if(!$this->ion_auth->logged_in() or $hash == null){
			redirect('page');
		}else{
			$id = $this->ion_auth->get_user_id();
			$deactivated  = $this->db->where('id',$id)->get('users')->row()->deactivated;
			if($deactivated == 1){
				redirect('account');
				exit();
			}else{
				if(!$this->functions->valid_token($hash,$id)){
					redirect('account');
				}else{
					if($this->db->where('id',$id)->update('users',array('deactivated'=> 1))){
						if($this->ion_auth->logout()){
							redirect('page');
						}
					}
				}
			}
		}
	}

	public function deactivate(){
		if(!$this->ion_auth->logged_in()){
			redirect('page');
		}else{
			$data['title'] = 'Деактивація сторінки';
			$data['id'] = $this->ion_auth->get_user_id();
			$data['link'] = "/settings/deactivate_account/" . $this->functions->get('hash');
			$this->load->view('deactivate_view',$data);
		}
	}
}