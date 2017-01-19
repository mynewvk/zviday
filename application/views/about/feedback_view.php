<?
	$data['title'] = "Зворотній звязок";
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
		<?if(!isset($success)):?>
		<h2>Зворотній звязок:</h2>
		<hr>
		<?=form_open('about/feedback_set')?>
			<div class="form-group">
				<label for="email">Ваша пошта:</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="Вкажіть вашу пошту, щоб ми змогли звязатися з Вами">
			</div>
			<div class="form-group">
				<label for="text">Текст:</label>
				<textarea name="text" id="feedback-text" cols="4" class="form-control" rows="6" placeholder="Ваше повідомлення"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default" name="submit">Відправити!</button>
			</div>
		</form>
		<?if(validation_errors()):?>
			<div class="alert alert-danger"><?=validation_errors()?></div>
		<?endif;?>
		<?endif?>
		<?if(isset($success)):?>
			<h2>Дякуємо! Повідомлення відправлено!</h2>
			<h4>Дуже скоро адміністрація відповість Вам на нього</h4>
		<?endif?>
	</div>
	<?$this->load->view('template/modal_login_view')?>
		<?load_media(array('main.js','bootstrap_js'))?>
	<?$this->load->view('template/bottom_nav_view')?>
</div>
