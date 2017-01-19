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
					  <li><a href="/settings/background">Оформлення</a></li>
					  <li class="active"><a href="/settings/photo_upload">Аватар</a></li>
					  <li><a href="/settings/change_password">Пароль</a></li>
					</ul>
				</div>
			</div>
		    <h3>Змінити головну фотографію</h3>
		    <hr>
		    <div class="row">
		    	<div class="col-xs-3">
		    		<img src="<?=$photo?>" class="img-thumbnail">
		    		<?if($photo != "/media/avatar/300/300x400.png"):?>
		    		<a href="/settings/delete_photo/<?=$this->functions->get('hash')?>" class="btn btn-danger btn-block" style="margin-top:15px"><i class="glyphicon glyphicon-remove"></i> <b>Удалити фото</b></a>
		    		<?endif;?>
		    	</div>	
				<div class="col-xs-9">
					<h4 class="text-info">Виберіть нову фотографію:</h4>
					<hr>
					<?php echo form_open_multipart('settings/photo_upload');?>
					<div class="form-group">
					    <input type="file" name="userfile" size="20" />
					    <p class="help-block">фотографія має боти не більше 2 мб, формату png або jpg</p>
					    <?if(isset($error)):?><?=$error?><?endif;?>
					 </div>
					 <div class="form-group">
					 	<button type="submit" class="btn btn-default btn-lg" name="submit">Загрузити</button>
					 </div>
					 <hr>	
					  <h4 class="text-info">Або:</h4>
					  <hr>
					  <a href="https://oauth.vk.com/authorize?client_id=4110203&scope=offline,friends,status&redirect_uri=<?=base_url()?>auth/vk_update&response_type=code&v=5.5" class="btn btn-primary btn-lg">Загрузити фото з Вконтакте</a>
					</form>
				</div>	
			</div>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>