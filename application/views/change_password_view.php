<?$this->load->view('template/header_view.php')?>
<?$this->load->view('template/navbar_view.php')?>
	<div class="container">
		<div class="well">
			<?if(!isset($settings_ok)):?>
			<div class="alert alert-info">
				<strong>Змінити пароль</strong>
			</div>
			<?endif?>
			<?if(isset($settings_ok)):?>			
			<div class="alert alert-success">
				<strong>Пароль змінений </strong>
				<i class="glyphicon glyphicon-ok"></i>
			</div>
			<?endif?>
			<?if(isset($error)):?>			
			<div class="alert alert-danger">
				<strong><?=$error?></strong>
			</div>
			<?endif?>
			<div class="row" style="margin-bottom:20px">
				<div class="col-xs-12">
					<ul class="nav nav-pills">
					  <li><a href="/settings">Основні</a></li>
					  <li><a href="/settings/background">Оформлення</a></li>
					  <li><a href="/settings/photo_upload">Аватар</a></li>
					  <li class="active"><a href="/settings/change_password">Пароль</a></li>
					</ul>
				</div>
			</div>
			<?=form_open('settings/change_password')?>
			<div class="form-group">
				<?=form_label('Пароль:')?>
				<?=form_password('password','','class="form-control"')?>
			</div>
			<div class="form-group">
				<?=form_label("Новый пароль:")?>
				<?=form_password('new_password','','class="form-control"')?>
			</div>
			<div class="form-group">
				<?=form_label('Новый пароль ще раз:')?>
				<?=form_password('new_password_confirm','','class="form-control"')?>
			</div>			
			<div class="form-group">
				<?=form_submit('submit','Сохранити!','class="btn btn-success btn-large"')?>
			</div>
			<?if(validation_errors()):?>
				<div class="alert alert-danger"><?=validation_errors()?><? if(isset($error))echo "<strong>" . $error . "</strong>" ?></div>
			<?endif;?>
			<?=form_close()?>
		</div>
	</div>
<?$this->load->view('template/footer_view')?>