<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

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
			}
  		// 
	}
	public function index(){
		$this->load->view('about/about_view');
	}
	public function feedback(){
		$this->load->view('about/feedback_view');
	}
	public function feedback_set(){
		
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('email',"Пошта","required|max_lenght[30]|valid_email|trim|xss_clear");
			$this->form_validation->set_rules('text',"Повідомлення","required|max_lenght[255]|min_lenght[10]|trim|xss_clear");
			
			$this->form_validation->set_message('required',"<b>%s</b> не повинно бути пустим");
			$this->form_validation->set_message('max_lenght',"<b>%s</b> не більше, ніж %s символів");
			$this->form_validation->set_message('mix_lenght',"<b>%s</b> не менше, ніж %s символів");
			$this->form_validation->set_message('valid_email',"Введіть коректну пошту");

			if($this->form_validation->run() == false){
				$this->load->view('about/feedback_view');
			}else{
				$data['email'] = $this->input->post('email');
				$data['message'] = $this->input->post('text');
				$data['ip'] = $_SERVER['SERVER_ADDR'];
				$data['new'] = 1;

				if($this->db->insert('feedback',$data)){
					$feedback['success'] = true;
					$this->load->view('about/feedback_view',$feedback);
				}
			}

		}else{
			redirect('about/feedback');
		}
	}
}