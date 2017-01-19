<?$this->load->view('template/header_view')?>
<?$this->load->view('template/navbar_view')?>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-xs-12">
				<h4>Пошук користувачів</h4>
				<hr>
				<form action="/account/search" method="GET">
					<div class="input-group">
					      <input type="text" class="form-control" placeholder="введіть імя або фамілію" name="q" value="<?=$query?>">
					      <span class="input-group-btn">
					        <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					      </span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?if(isset($users)):?>
	<div class="well">
		<h4>Результати пошуку: <span class="badge badge-defaul"><?=$num_rows?></span></h4>
		<hr>
		<?foreach($users as $val):?>
		<div class="media">
			<a class="pull-left" href="/<?=$val->username?>">
			    <img class="media-object ask-avatar" src="<?=$val->photo_small?>">
			</a>
			<div class="media-body">
				<div class="row">
					<div class="col-xs-12">
						<a href="/<?=$val->username?>" class="link-default"><h4 class="media-heading inline"><?=str_replace($query, "<b>$query</b>", $val->name)?></h4></a>
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
		<?if(sizeof($users) < 1):?>
			<h5>Пошук не дав результатів</h5>
		<?endif;?>
	</div>
	<?$this->load->view('template/bottom_nav_view')?>
	<?endif;?>
</div>
<?$this->load->view('template/footer_view')?>