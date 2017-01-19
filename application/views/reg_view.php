<?$this->load->view('header_not_login_user_view')?>
<?$this->load->view('template/header_base_view')?>
	<div class="container">
		<div class="well">
			<div class="alert alert-info">
				<strong>Регестрація</strong>
			</div>
			<div class="row">
				<div class="col-xs-9">
				<?=form_open('auth/register')?>
				<div class="form-group">
					<?=form_label('Логін:')?>
					<?=form_input('username',set_value('username'),'class="form-control"')?>
					<?=form_error('username')?>
					<span class="help-block">Виберіть собі унікальний логін, який стане силкою на вашу сторінку <b><?=base_url()?>логін</b> (не менше 5 символів)</span>
				</div>
				<div class="form-group">
					<?=form_label("Ім'я, Фамілія:")?>
					<?=form_input('name',set_value('name'),'class="form-control"')?>
					<?=form_error('name')?>
					<span class="help-block">Через пробел напишіть своє <b>імя та фамілію</b></span>
				</div>
				<div class="form-group">
					<?=form_label('Почта')?>
					<?=form_input('email',set_value('email'),'class="form-control"')?>
					<?=form_error('email')?>
					<span class="help-block">Вкажіть свою почту</span>
				</div>
				<div class="form-group">
					<?=form_label('Місто')?>
					<?=form_input('city',set_value('city'),'class="form-control"')?>
					<?=form_error('city')?>
					<span class="help-block">Вкажіть своє місто проживання</span>
				</div>
				<div class="form-group">
					<?=form_label('Пароль')?>
					<?=form_password('password','','class="form-control"')?>
					<?=form_error('password')?>
					<span class="help-block">Придумайте пароль від 5 до 20 символів</span>
				</div>
				<div class="form-group">
					<?=form_label('Пароль ще раз')?>
					<?=form_password('password_confirm','','class="form-control"')?>
					<?=form_error('password_confirm')?>
					<span class="help-block">Напишіть пароль ще раз</span>
				</div>
				<div class="form-group">
					<?=form_submit('submit','Регестрація!','class="btn btn-success"  style="font-weight:bold"')?>
				</div>
				<?=form_close()?>
				</div>
				<div class="col-xs-3">
					<h4 class="text-info">Швидка реєстрація через ВК:</h4>
					<a class="btn btn-primary btn-block btn-lвg" href="https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri=http://oauth.ru/auth/vk&response_type=code&v=5.5" style="margin-top:24px">VK</a>
				</div>
			</div>
			<hr>
			<a href="#"  data-toggle="modal" data-target="#myModal"><strong>Якщо ти вже зареєстрований</strong></a>
		</div>
	</div>
<?=$this->load->view('template/modal_login_view')?>
<?load_media(array('bootstrap_js','main.js'))?>
</body>
</html>