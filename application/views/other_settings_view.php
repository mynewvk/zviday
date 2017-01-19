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
					  <li><a href="/settings">Основні</a></li>
					  <li class="active"><a href="/settings/other">Інше</a></li>
					  <li><a href="/settings/background">Оформлення</a></li>
					  <li><a href="/settings/photo_upload">Аватар</a></li>
					  <li><a href="/settings/change_password">Пароль</a></li>
					</ul>
				</div>
			</div>
		<hr>
		<?=form_open('settings/other')?>
			<input type="checkbox" name="show_vk_link" value="true" id="show_vk_link" <?=set_checkbox('show_vk_link', 'true', $settings->show_vk_link)?> > <label for="show_vk_link">Показувати посилання на вашу сторінку Вконтакті</label><br>
			<input type="checkbox" name="can_comment" value="true"  id="can_comment" <?=set_checkbox('can_comment', 'true', $settings->can_comment)?> > <label for="can_comment">Дозволити комментувати мої відповіді</label><br> 
			<input type="hidden" name="hash" value="<?=$hash?>">
			<button type="submit" class="btn btn-success" name="submit">Зберегти</button>
		</form>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>