<?$this->load->view('template/header_view.php')?>
<?$this->load->view('template/navbar_view.php')?>
<?
 $settings = $this->functions->get_user_settings();
?>
	<div class="container">
		<div class="well">
			<?if(!isset($settings_ok)):?>
			<div class="alert alert-info">
				<strong>Настройки</strong>
			</div>
			<?endif?>
			<?if(isset($settings_ok)):?>			
			<div class="alert alert-success">
				<strong>настройки збережені </strong>
				<i class="glyphicon glyphicon-ok"></i>
			</div>
			<?endif?>
			<div class="row" style="margin-bottom:20px">
				<div class="col-xs-12">
					<ul class="nav nav-pills">
					  <li class="active"><a href="/settings">Основні</a></li>
					  <li><a href="/settings/background">Оформлення</a></li>
					  <li><a href="/settings/photo_upload">Аватар</a></li>
					  <li><a href="/settings/change_password">Пароль</a></li>
					</ul>
				</div>
			</div>
			<?=form_open('settings')?>
			<div class="form-group">
				<?=form_label('Логін:')?>
				<?=form_input('',$username,'class="form-control" disabled')?>
			</div>
			<div class="form-group">
				<?=form_label("Ім'я, Фамілія:")?>
				<?=form_input('name',$name,'class="form-control"')?>
			</div>
			<div class="form-group">
				<?=form_label('Город')?>
				<?=form_input('city',$city,'class="form-control"')?>
			</div>			
			<div class="form-group">
				<?=form_label('Заголовок')?>
				<?=form_input('ask_about',$ask_about,'class="form-control"')?>
			</div>
			<div class="form-group">
				<?=form_submit('submit','Зберегти!','class="btn btn-success btn-large"')?>
			</div>
			<?if(validation_errors()):?>
				<div class="alert alert-danger"><?=validation_errors()?><? if(isset($error))echo "<strong>" . $error . "</strong>" ?></div>
			<?endif;?>
			<?=form_close()?>
			<hr>
			<h3>Інше:</h3>
			<hr>
			<?=form_open('settings/other')?>
				<div class="form-group">
					<input type="checkbox" name="show_vk_link" value="true" id="show_vk_link" <?=set_checkbox('show_vk_link', 'true', $settings->show_vk_link)?> > <label for="show_vk_link">Показувати посилання на мою сторінку Вконтакті</label><br>
				</div>
				<div class="form-group">
					<input type="checkbox" name="can_comment" value="true"  id="can_comment" <?=set_checkbox('can_comment', 'true', $settings->can_comment)?> > <label for="can_comment">Дозволити комментувати мої відповіді</label><br> 
				</div>
				<input type="hidden" name="hash" value="<?=$hash?>">
				<div class="form-group">
					<button type="submit" class="btn btn-success" name="submit">Зберегти!</button>
				</div>
			</form>
			<hr>
			<h3>Звязок з Вконтакті:</h3>
			<hr>
			<?if($vk_id !== null):?>
				<div style="display:inline-block;width:120px;">
					<img src="http://rufruf.ru/wp-content/uploads/2012/02/vk.png" alt="">
				</div>
				<div style="display:inline-block;width:220px;">
					<h4>Підключений <i class="glyphicon glyphicon-ok"></i></h4>
					<h5><a href="http://vk.com/id<?=$vk_id?>" target="_blank">Сторінка</a></h5>
				</div>
			<?endif;?>
			<?if($vk_id == null):?>
				<div style="display:inline-block;width:120px;">
					<img src="http://rufruf.ru/wp-content/uploads/2012/02/vk.png" alt="">
				</div>
					<h4 style="display:inline-block;vertical-align:top;margin:0">
						<a href="https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri=<?=base_url()?>auth/vk_connect&response_type=code&v=5.5" class="">Підключитися</a>
					</h4>
			<?endif;?>
			<hr>
			<h3>Деактивувати аккаунт:</h3>
			<h5 class="text-info">(Ви в будь який момент зможете відновити свій аккаут)</h5>
			<hr>
			<a href="/settings/deactivate" class="btn btn-danger">Деактивувати</a>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>