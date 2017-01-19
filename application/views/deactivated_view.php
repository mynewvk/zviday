<?
$data['title'] = "На жаль користувач деактивував сторінку";
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
<body>
	<div class="container">
		<div class="well info" style="background:white">
			<h1 style="text-align:center">На жаль користувач деактивував сторінку :(</h1>
			<img src="https://pp.vk.me/c618826/v618826295/691a/YN-1YTkf5VI.jpg" style="display:block;margin:0 auto;">
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
	<?load_media('bootstrap_js')?>
	<?if(!$this->ion_auth->logged_in()):?>
		<?$this->load->view('template/modal_login_view')?>
	<?endif?>
</body>
</html>