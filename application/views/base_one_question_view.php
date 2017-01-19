<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$question->question?> | Звідай.нет</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?
		load_media(array('jquery','bootstrap_css','main.css'));
	?>
	<style>
	body{
		background-image: url(<?=$background?>);
	}
	</style>
</head>
<body>
	<?
	// set navbar
	if($login == true){
		$this->load->view('template/navbar_view');
	}else{
		$this->load->view('header_not_login_user_view');
	}
	//end
	?>
	 	<?
	 	$settings = $this->functions->get_user_settings($question->to);
	 	$link_to_account = "/" .$this->functions->get_user_username($question->to);
	 	$user_ask_name = $this->functions->get("name",$question->to);

	 	if($question->public == 1){
	 		$from = $this->db->where("id", $question->from_whom)->get('users')->row();
	 		$username = $from->username;
	 		$photo = $from->photo_small;
	 		$link = "/". $from->username;
	 		$from_name = $from->name;
	 	}
	 	else{
	 		$photo = "/media/avatar/100/100x100.png";
	 		$link = "#";
	 	}
	 	if($question->question_day == 1){
	 		$photo = "/media/logo_100.png";
	 	}
	 	?>
	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-xs-12">
					<div class="media">
						<div class="pull-left">
							<a href="<?=$link?>">
							  <img class="media-object ask-avatar" src="<?=$photo?>">
							</a>
							<?if($question->question_day):?>
								<span class="label label-danger tool" data-title="Питання від Звідай.нет" data-placement="top" data-toggle="tooltip"  data-html="true" style="width:100%;display:inline-block"><i class="glyphicon glyphicon-flag"></i> Звідай.нет</span>
							<?endif?>
						</div>
						<div class="media-body">
							<div class="row">
								<div class="col-xs-10">
									<h4 class="media-heading"><?=link_replace(emoji_replace($question->question));?></h4>
								</div>
								<div class="col-xs-2">
									<a href="<?=$link_to_account?>" class="btn btn-link btn-block btn-xs"><i class="glyphicon glyphicon-user"></i> <b><?=$user_ask_name?></b></a>
								</div>
							</div>
							<div class="alert alert-info ask-answer-alert">
								<strong><?=link_replace(emoji_replace($question->answer))?></strong>
								<?if($question->photo != null):?>
								<br>
								<a href="<?=$question->photo?>" data-lightbox="answer-photo">
									<img src="<?=$question->photo_small?>" alt="<?=$question->answer?>" class="thumbnail" style="width:200px;height:auto;">
								</a>
								<?endif?>
							</div>
						</div>
					</div>
					<hr>
					<div class="ask-bottom-block">
						<div class="row">
							<div class="col-xs-10">
								<abbr class="timeago" title="<?=$question->date_answer?>"></abbr>
								<?if(isset($from_name)):?>
									<a href="<?='/' . $username;?>" class="ask-from"><strong>від <?=$from_name?></strong></a>
								<?endif?>
							</div>
							<div class="col-xs-2">
								<div id="vk_like" style="left:16px" class="pull-right"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?if($settings->can_comment == true):?>
		<div class="well">
			<div class="row">
				<div class="col-lg-12">
					<div id="vk_comments"></div>
				</div>
			</div>
		</div>
		<?endif;?>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/modal_login_view')?>
<script src="/media/js/main.js"></script>
<?load_media('bootstrap_js')?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
<script type="text/javascript">
  VK.init({apiId: 4110203, onlyWidgets: true});
</script>
<script type="text/javascript">
		VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
		VK.Widgets.Like("vk_like", {type: "button",height: "22px"});
</script>
<?load_media('timeago')?>
<script>
	$(document).ready(function() {
		VK.Observer.subscribe("widgets.comments.new_comment",function n(count,comment,date,sign)
		{
			$.post('/account/set_comment', {hash: "<?=$question->hash?>", comment: comment, count: count, date: date,sign: sign}, function(data, textStatus, xhr) {
					if(data != "ok"){
						show_popup(data);
					}
			});
		});
		VK.Observer.subscribe("widgets.comments.delete_comment",function d(count,comment,date,sign)
		{
			$.post('/account/delete_comment', {hash: "<?=$question->hash?>", comment: comment, count: count, date: date,sign: sign}, function(data, textStatus, xhr) {
					if(data != "ok"){
						show_popup(data);
					}
			});
		});
	});
</script>
</body>
</html>