<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<div class="alert alert-info">
				<strong>Настройки</strong>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-pills">
					  <li><a href="/settings">Основні</a></li>
					  <li class="active"><a href="/settings/background">Оформлення</a></li>
					  <li><a href="/settings/photo_upload">Аватар</a></li>
					  <li><a href="/settings/change_password">Пароль</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?=form_open_multipart('settings/background');?>
					<h3>Змінити фон сторінки</h3>
					<hr>
					<div class="form-group">
					    <label for="exampleInputFile">Поміняти фотографію</label>
					    <input type="file" name="userfile" size="20" />
					    <p class="help-block">фотографія має боти не більше 1 мб, формату png або jpg</p>
					    <?=$error?>
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Загрузити</button>
					</form>
				<?if($this->ion_auth->user()->row()->background != null):?>
					<hr>
					<?=form_open_multipart('settings/delete_background');?>
					<input type="hidden" value="<?=$this->ion_auth->user()->row()->hash?>" name="hash">
					<button type="submit" class="btn btn-danger btn-block" name="submit">Удалити фон сторінки</button>
					</form>
				<?endif;?>
				</div>
			</div>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>