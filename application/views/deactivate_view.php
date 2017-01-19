<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<h3>Ви збираєтесь деактивувати аккаунт</h3>
			<h4 class="text-info">Ніхто не зможе продивлятися вашу сторінку</h4>
			<hr>
			<a href="<?=$link?>" class="btn btn-success">Підтвердити <i class="glyphicon glyphicon-ok"></i></a>
			<a href="/account" class="btn btn-danger">Відхилити <i class="glyphicon glyphicon-remove"></i></a>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>