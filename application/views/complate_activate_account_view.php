<?
$data['title'] = "Аккаунт активований";
?>
	<?
	$data['id'] = $this->ion_auth->get_user_id();
	$this->load->view('template/header_view',$data);
	?>
	<?$this->load->view('template/navbar_view')?>
<body>
	<div class="container">
		<div class="well info" style="background:white">
			<h3 style="text-align:center;margin-bottom:20px;">Вітаємо! Ви успішно активували аккаунт</h3>
			<img src="https://pp.vk.me/c618826/v618826295/68e2/Mb0g6dQ5Az4.jpg" style="display:block;margin:0 auto;">
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
</body>
</html>