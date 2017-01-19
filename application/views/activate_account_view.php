<?
$data['title'] = "Активація акаунта";
?>
	<?
	$data['id'] = $this->ion_auth->get_user_id();
	$this->load->view('template/header_view',$data);
	?>
	<?$this->load->view('template/navbar_view')?>
<body>
	<div class="container">
		<div class="well info" style="background:white">
			<h3 style="text-align:center;margin-bottom:20px;">Ви деактивували свій аккаунт. Відновіть сторінку в один клік!</h3>
			<img src="https://pp.vk.me/c618826/v618826295/68e9/0jt_0s6eZuM.jpg" style="display:block;margin:0 auto;">
			<a class="btn btn-success btn-block" href="<?=$link?>">Активація акаунта</a>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
</body>
</html>