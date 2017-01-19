<?foreach($ask as $val):?>
<?
$settings = $this->functions->get_user_settings($val->to);

if($val->public == 1){
	$from = $this->db->where("id", $val->from_whom)->get('users')->row();
	$from_name = $from->name;
	$username = $from->username;
	$photo = $from->photo_small;
	$link = "/". $from->username;
}
else{
	$photo = "/media/avatar/100/100x100.png";
	$link = "#";
}
if($val->question_day == 1){
	$photo = "/media/logo_100.png";
}
?>
<div class="question" id="<?=$val->hash?>">
	<div class="media">
		<div class="pull-left">
			<a href="<?=$link?>">
			    <img class="media-object ask-avatar" src="<?=$photo?>">
			</a>
			<?if($val->question_day):?>
				<span class="label label-danger tool" data-title="Питання від Звідай.нет" data-placement="top" data-toggle="tooltip"  data-html="true" style="width:100%;display:inline-block"><i class="glyphicon glyphicon-flag"></i> Звідай.нет</span>
			<?endif?>
		</div>
		<div class="media-body">
		  <div class="row">
		  	<div class="col-xs-11">
		  		<h4 class="media-heading break-word"><?=link_replace(emoji_replace($val->question))?></h4> 
		  	</div>
		  	<?if(isset($delete)):?>
		  	<div class="col-xs-1">
		  		<span onclick='delAsk("<?=$val->hash?>");return false' data-title="Удалити" data-placement="top" data-toggle="tooltip"  data-container="body" class="del-ask pull-right">
					<button type="button" class="close" aria-hidden="true">&times;</button>
		  		</span>
		  	</div>
		  	<?endif?>
		  </div>
			<div class="alert alert-info ask-answer-alert">
				<?if($val->answer != null):?>
				<span>
					<b><?=link_replace(emoji_replace($val->answer))?></b>
				</span>
			<?endif?>
				<?if($val->photo != null):?>
				<a href="<?=$val->photo?>" data-lightbox="answer-photo">
					<img src="<?=$val->photo_small?>" class="thumbnail ask-answer-photo">
				</a>
				<?endif?>
			</div>
		</div>
	</div>
	<div class="ask-bottom-block">
		<abbr class="timeago" title="<?=$val->date_answer?>"></abbr>
	<?if(isset($from_name)):?>
		<a href="<?='/' . $username;?>" class="ask-from"><strong>від <?=$from_name?></strong></a>
	<?endif; unset($from_name)?>
		<?if($settings->can_comment == true):?>
			<a href="<?='/questions/one/' . $val->hash?>" class="pull-right ask-comments"><strong>Коментарії <?if($val->comments_count > 0){echo "<span class='label label-success'>" .$val->comments_count. "</span>";}?></strong></a>
		<?endif;?>
		<?if($settings->can_comment == false):?>
			<a href="<?='/questions/one/' . $val->hash?>" class="pull-right ask-comments btn btn-link"><b>Перейти до питання</b></a>
		<?endif;?>
	</div>
	<hr>
</div>
<?endforeach?>
<?if(sizeof($ask) < 1){
	echo "<h4>Не відповів на жодне запитання</h4>";
}?>