<?
$data['title'] = "Про сайт"
?>
<?if($this->ion_auth->logged_in()):?>
	<?
	$data['id'] = $this->ion_auth->get_user_id();
	$this->load->view('template/header_view',$data);
	?>
	<?$this->load->view('template/navbar_view')?>
<?endif?>
<?if(!$this->ion_auth->logged_in()):?>
	<?$this->load->view('template/header_base_view',$data)?>
	<?$this->load->view('header_not_login_user_view')?>
<?endif?>
<div class="container">
	<div class="well">
		<h2>Про сайт:</h2>
		<hr>
		<h4>Звідан.нет - Перший закарпатський сайт, який дає змогу анонімно дізнатися більше про людей, які тобі цікаві.
		Підписуйся, задавай питання, отримуй відповіді. </h4>
		<hr>
		<h2>Логотип:</h2>
		<hr>
		<img src="/media/logo.png" alt="Звідай.нет">
	</div>
	<?$this->load->view('template/bottom_nav_view')?>
</div>
