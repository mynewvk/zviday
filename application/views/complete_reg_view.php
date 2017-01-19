<?$this->load->view('template/header_base_view')?>
<?$this->load->view('header_not_login_user_view')?>
	<div class="container">
		<div class="well">
			<div class="alert alert-info">
				<strong>Залишилося тільки придумати пароль та указати почту</strong>
			</div>
			<div class="row">
				<div class="col-xs-9">
				<?=form_open('auth/vk_complete')?>
				<div class="form-group">
					<?=form_label('Пароль:')?>
					<?=form_password('password','','class="form-control"')?>
				</div>
				<div class="form-group">
					<?=form_label("Пароль ще раз")?>
					<?=form_password('password_confirm','','class="form-control"')?>
				</div>
				<div class="form-group">
					<?=form_label('Почта')?>
					<?=form_input('email','','class="form-control"')?>
				</div>
				<input type="hidden" value="<?=(isset($token)) ? $token : set_value('passconf')?>" name="token">
				<div class="form-group">
					<?=form_submit('submit','Закінчити регестрацію!','class="btn btn-success"  style="font-weight:bold"')?>
				</div>
				<?=form_close()?>
				</div>
				<div class="col-xs-3">
					
				</div>
			</div>
			<hr>
			<a href="#"  data-toggle="modal" data-target="#myModal"><strong>Якщо ти вже зареєстрований</strong></a>
			<?if(validation_errors()):?>			
				<div class="alert alert-danger"><?=validation_errors()?><? if(isset($error))echo "<strong>" . $error . "</strong>" ?></div>
			<?endif;?>
		</div>
	</div>
<?=$this->load->view('template/modal_login_view')?>
<?load_media(array('main.js','bootstrap_js'))?>
</body>
</html>