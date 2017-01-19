<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	 function __construct(){
	 	parent::__construct();
	 	session_start();
	 	$this->load->model('stats');
	}

	public function index(){
		if(!isset($_SESSION['admin'])){
			redirect('admin/login');
		}else{
			redirect('admin/main');
		}
	}

	public function login(){
		if(!isset($_SESSION['admin'])){
			$this->load->view('admin/index_view');
		}else{
			redirect('admin');
		}
	}
	public function set_session(){
		if(isset($_SESSION['admin'])){
			redirect('admin');
		}else{
			if(isset($_POST['submit'])){

				$one  = $this->input->post('one');
				$two = $this->input->post('two');

				if($one == "коля" and $two == "лукін"){
					$_SESSION['admin'] = "login";
					redirect('admin');
				}else{
					$data['error'] = "не вірний логін чи пароль";
					$this->load->view('admin/login_view',$data);
				}
			}else{
				redirect('admin/login');
			}
		}
	}

	public function logout(){
		unset($_SESSION['admin']);
	}

	public function main(){
		if(!isset($_SESSION['admin'])){
			redirect('admin/index');
		}else{
			$this->load->view('admin/main_view');
		}
	}
	public function question_day($success = null){
		if(!isset($_SESSION['admin'])){
			redirect('admin');
		}else{
			$data['success'] = ($success != null) ? "Питання відправлено!" : null;
			$this->load->view('admin/question_day_view',$data);
		}
	}
	public function no_answer_questions($offset = null){
		if(!isset($_SESSION['admin'])){
			redirect('admin');
		}else{
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
			$ask = $this->db->order_by('date','desc')->where('is_new',1)->get('questions',10, $offset);
			if($ask->num_rows() < 1){
				echo  "Нових питань нема";
			}
			else{
				$data = array(
					"ask" => $ask->result(),
					);
				$config['base_url'] = base_url().'admin/no_answer_questions';
				$config['num_links'] = 3;
				$config['total_rows'] =  $this->db->order_by('date','desc')->where('is_new',1)->get('questions')->num_rows();
				$config['per_page'] = 10;
				$this->pagination->initialize($config);  
				$this->load->view('admin/no_answer_questions_view',$data);
			}
		}
	}
	public function set_question_day(){
		if(!isset($_SESSION['admin']) or !isset($_POST['submit']) or !isset($_POST['hash'])){
			redirect('admin/index');
		}else{
			if(!$_POST['hash'] == "коля"){
				redirect('admin');
			}else{
				$question = $this->input->post('text');
				$ids = $this->db->select('id')->get('users')->result();

				foreach ($ids as $val) {
					$data = array(							
							"question" => $question,
							"is_new" => 1,
							"to" => $val->id,
							"from_whom" => null,
							"ip" => $_SERVER['SERVER_ADDR'],
							"hash" => md5(2333 . time()),
							"date" => date('c'),
							"from_know" => 0,
							"public" => 0,
							"question_day" => 1,
							);
					$this->db->insert('questions',$data);
				}
				redirect('/admin/question_day/success');
			}
		}
	}

	public function delete_user($id = null, $hash = null){
		if(!isset($_SESSION['admin'])){
			redirect('admin');
		}else{
			if($hash != "delete" or $this->db->where('id',$id)->get('users')->num_rows < 1){
				echo "error";
			}else{
				if($this->db->where('id',$id)->delete('users')){
					if($this->db->where('to',$id)->or_where('from_whom',$id)->delete('questions')){
						echo "OK";
					}
				}
			}
		}
	}

	public function all_users(){
		
	}
}
