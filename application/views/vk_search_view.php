<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
<div class="container">
	<div class="well">
		<h3 class="text-info">Твої друзі з VK зареєстровані на Звідай.нет <span class="label label-primary"><?=$num_rows?></span></h3>
		<hr>
		<?foreach($users as $val):?>
		<div class="media">
			<a class="pull-left" href="/<?=$val->username?>">
			    <img class="media-object ask-avatar" src="<?=$val->photo_small?>">
			</a>
			<div class="media-body">
				<div class="row">
					<div class="col-xs-12">
						<a href="/<?=$val->username?>" class="link-default"><h4 class="media-heading inline"><?=$val->name?></h4></a>
						<?if($val->city != null):?>
							<span class="label label-success pull-right"><?=$val->city?></span>
						<?endif;?>
						<?if($val->ask_about != null):?>
							<span class="label label-default pull-right" style="margin-right:10px"><?=$val->ask_about?></span>
						<?endif;?>
					</div>
				</div>
				<?if($val->status != null):?>
				<div class="alert alert-info">
					<strong><?=emoji_replace($val->status)?></strong>
				</div>
				<?endif;?>
			</div>
		</div>
		<hr>
		<?endforeach?>
		<?=$this->pagination->create_links();?>
		<?if(sizeof($users) < 1):?>
			<h5>На жаль ніхто з ваших друзів не зареєстрований на Звідай.нет :(</h5>
		<?endif;?>
	</div>
	<?$this->load->view('template/bottom_nav_view')?>
</div>
<?$this->load->view('template/footer_view')?>