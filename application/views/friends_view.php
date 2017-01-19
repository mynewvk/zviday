<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<h3 class="inline">Друзі <span class="label label-info em-6"><?=$total?></span></h3>
			<a href="/account/vk_friends" class="btn btn-primary pull-right" ><i style="display:inline-block;width:24px;height:24px;background-image:url(/media/vk_icon.png);margin:0"></i> <b style="vertical-align:super">Пошук друзів з Вконтакті</b></a>
			<hr>
					<?foreach($users as $val):?>
					<div class="media">
						<a class="pull-left" href="/<?=$val->username?>">
						    <img class="media-object ask-avatar" src="<?=$val->photo_small?>">
						</a>
						<div class="media-body">
							<div class="row">
								<div class="col-xs-12">
									<a class="link-default" href="/<?=$val->username?>"><h4 class="media-heading inline"><?=$val->name?></h4></a>
									<?if($val->last_login >= time() - 60 * 15):?>
										<span class="label label-success" style="margin-right:10px">Online</span>
									<?endif;?>
										<button type="button" class="close del-ask" aria-hidden="true" onclick="$(this).parents('.media').hide(400);follow(<?=$val->id?>);return false" data-title="Отписатися" data-placement="top" data-toggle="tooltip"  data-container="body">&times;</button>
									<div class="pull-right">
										<span class="label label-info" style="margin-left:20px"><i class="glyphicon glyphicon-envelope"></i> <strong><?=$this->functions->questions_count($val->id)?></strong> Відповідей</span>
										<?if($val->city != null):?>
											<span class="label label-info"><i class="glyphicon glyphicon-map-marker"></i> <?=$val->city?></span>
										<?endif;?>
										<?if($val->ask_about != null):?>
											<span class="label label-info" style="margin-right:10px"><i class="glyphicon glyphicon-comment"></i> <?=$val->ask_about?></span>
										<?endif;?>	
									</div>
								</div>
							</div>
							<div class="alert alert-info">
								<strong><?=emoji_replace($val->status)?></strong>
							</div>
						</div>
					</div>
					<hr>
					<?endforeach?>
					<?=$this->pagination->create_links();?>

		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>