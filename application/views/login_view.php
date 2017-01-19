<?$this->load->view('header_not_login_user_view')?>
<?$this->load->view('template/header_base_view')?>
	<div class="container">
		<div class="well">
			<div class="alert alert-info">
				<strong>Вхід</strong>
			</div>
			<?if(isset($error_login)):?>
				<div class="alert alert-danger"><strong>Неправильний логій чи пароль</strong></div>
			<?endif;?>
	<?=form_open('auth/login')?>
	<div class="form-group">
		<?=form_label('Логін')?>
		<?=form_input('username','','class="form-control"')?>
	</div>
	<div class="form-group">
		<?=form_label('Пароль')?>
		<?=form_password('password','','class="form-control"')?>
	</div>
	<div class="form-group">
		<?=form_submit('submit','Війти!','class="btn btn-success" style="font-weight:bold"')?>
		<a href="/auth/register" style="padding-left:15px"><strong>Регестрація</strong></a>
	</div>
	<?=form_close()?>
	<?if(validation_errors()):?>
	<div class="alert alert-danger"><?=validation_errors()?><? if(isset($error))echo "<strong>" . $error . "</strong>" ?></div>
	<?endif;?>
	<hr>
	<a href="<?=vk_login_link()?>" class="btn btn-primary btn-block btn-lg" > <strong>Ввійти за допомогою VK</strong></a>
</div>
</div>
<?$this->load->view('template/modal_login_view')?>
<script src="/media/js/main.js"></script>
<?load_media('bootstrap_js')?>
</body>
</html>