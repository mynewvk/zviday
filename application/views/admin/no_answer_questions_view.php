<?$this->load->view('admin/template/header_view')?>
<?
	
?>
<div class="container">
	<?if(isset($success)):?>
		<div class="alert alert-success">
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong><?=$success?></strong> <i class="glyphicon glyphicon-ok"></i>
		</div>
	<?endif;?>
	<div class="well">
		<h1>Питання без відповіді</h1>
		<hr>
		<div class="row">
			<div class="col-xs-12">
				<?foreach($ask as $val):?>
				<?
				$to = $this->db->where('id',$val->to)->get('users')->row();
				$to = "<a href='#'>" . $to->name."</a>";
				if($val->public == 1){
					$from = $this->db->where("id", $val->from_whom)->get('users')->row();
					$name = $from->name;
					$photo = '<img class="media-object ask-avatar" src="' .$from->photo_small.'">';
					$username = $from->username;
					$link = "/" . $from->username;
				}
				else{
					$photo = '<img class="media-object ask-avatar" src="/media/avatar/100/100x100.png">';
					$link = "#";
				}
				?>
				<div class="media" id="<?=$val->hash?>">
					<a class="pull-left" href="<?=$link?>">
					   <?=$photo?>
					</a>
					<div class="media-body">
					  <div class="row">
					  	<div class="col-xs-12">
					  		<h4 class="media-heading break-word"><?=emoji_replace($val->question)?></h4>
					  		питання для <?=$to?>
					  	</div>
					  </div>
					</div>
					<abbr class="timeago" title="<?=$val->date?>"></abbr>
					<?if(isset($name)):?>
						<a href="<?='/' . $username;?>" class="ask-from"><strong>від <?=$name;?></strong></a>
						<?unset($name)?>
						<?unset($photo)?>
					<?endif?>
				</div>
				<hr>
				<?endforeach?>
				<?echo $this->pagination->create_links();?>
			</div>
		</div>
	</div>	
</div>
<?load_media(array('bootstrap_js','main.js','timeago',))?>
</body>
</html>