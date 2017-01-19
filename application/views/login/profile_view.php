<?
// set background
	$b = $this->ion_auth->user($id)->row()->background;
	$user_hash =  $this->ion_auth->user()->row()->hash;
	$settings = json_decode($settings);
	if($b == null){
		$b = "http://cs607728.vk.me/v607728417/12df/IbJ84gF1b_M.jpg";
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$name?> | Звідай.нет</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/media/css/lightbox.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<?
		load_media(array('jquery','bootstrap_css','main.css'));
	?>
	<style>
	body{
		background-image: url(<?=$b?>);
	}
	</style>
</head>
<body>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-3" style="text-align:center;">
					<!-- avatar -->
					<?if($photo_big != null):?>
					<a href="<?=$photo_big?>"  data-lightbox="avatar">
						<img src="<?=$photo?>" alt="<?=$name?>" class="img-thumbnail">
					</a>
					<?endif?>
					<?if($photo_big == null):?>
						<img src="<?=$photo?>" alt="<?=$name?>" class="img-thumbnail">
					<?endif?>
					<!-- follow button -->
					<?if($is_follow == "not follow"):?>
						<button id="follow" onclick="follow(<?=$id?>)" class="follow-button btn btn-success btn-block" style="margin-top:10px;"><i class="glyphicon glyphicon-plus"></i> <strong>Подписатися</strong></button>
					<?endif?>
					<?if($is_follow == "follow"):?>
						<button id="follow" onclick="follow(<?=$id?>)" class="follow-button btn btn-danger btn-block"><i class="glyphicon glyphicon-remove"></i> <strong>Отписатися</strong></button>
					<?endif?>
					<!-- end follow button -->
					<?if($settings->show_vk_link and $vk_id != null):?>
						<a href="https://vk.com/id<?=$vk_id?>" class="btn btn-primary btn-block" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> <b>Вконтакті</b></a>
					<?endif?>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-10">
					<div class="pull-right">
						<span class="label label-info pull-right tool" style="font-size:.9em;cursor:pointer" data-placement="bottom" data-title="подпищиків" data-toggle="tooltip"><?=$this->functions->followers_count($id)?> <i class="glyphicon glyphicon-user"></i></span>
						<span class="label label-primary pull-right tool " style="left:-10px;position:relative;font-size:.9em;cursor:pointer" data-placement="bottom" data-title="Читає" data-toggle="tooltip"><?=$this->functions->following_count($id)?> <i class="glyphicon glyphicon-user"></i></span>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h1 class="inline" style="margin-top:0"><?=$name?></h1> 
							<?if($city !== ''):?>
								<h1 class="inline">
									<small><b>(</b><?=$city?><b>)</b></small>
								</h1>
							<?endif?>
							<?if($last_login >= time() - 60 * 15):?>
								<span class="label label-success" style="margin-right:10px">Online</span>
							<?endif;?>
							<?if($last_login < time() - 60 * 15):?>
								<h4 class="inline">
									<span data-title="Був в мережі" data-placement="top" data-toggle="tooltip"  data-container="body" class="tool last-login-time">
										<b><abbr class="timeago" title="<?=date('c',$last_login)?>"></abbr> 
										<i class="glyphicon glyphicon-time"></i></b>
									</span> 
								</h4>
							<?endif;?>
						</div>
					</div>
					<?if($status != ''):?>
					<div class="alert alert-info">
					  <strong><?=emoji_replace($status)?></strong>
					</div>
					<?endif?>
					<hr>
					<div class="ask-area">
						<h3><?=$ask_about?></h3>
						<?=form_open('questions/getask')?>
						<textarea class="form-control" rows="6" name="ask" maxlength="255" id="question-area"></textarea>
						<input type="hidden" class="ask-user-id" value="<?=$id?>" name="id">
						<input type="hidden" value="<?=$user_hash?>" name="token" id="token">
						<div class="row">
							<div style="padding:15px 0">
								<div class="col-xs-5">
									<input type="checkbox" name="anonymous" value="true" id="anonymous" checked="true"> <label for="anonymous">Анонімно</label>
									<span data-title="Смайлики" id="emoji-button" data-container="body" data-toggle="popover" data-html="true" data-placement="right" >
										<i class="emoji emoji-0"></i>
									</span>
									<span id="later-count"></span>
								</div>
								<div class="col-xs-7">
									<a class="btn btn-success ask-button pull-right" style="width:200px;"><strong>Зазвідати</strong></a>
								</div>
							</div>
						</div>
						</form>
					</div>
					<div class="ask-again" style="display:none;">
						<h3 style="text-align:center">Питання було відправлено!</h3>
						<button class="btn btn-primary btn-lg btn-block" onclick="hideAskArea()">Задати ще одне запитання</button>
					</div>
				</div>
			</div>
		</div>
		<div class="well">
				<strong style="font-size:1.5em">Відповідей: <span class="badge em-8"><?$ask_count = $this->functions->questions_count($id);echo $ask_count?></span></strong>
				<div id="vk_like"  class="pull-right vk-button"></div>
				<div class="row">
					<div class="col-lg-12">						
						<hr>
						<?$this->load->view('base_question_answer_view',array('ask' => $questions))?>
						<?if($ask_count > 10):?>
							<buttom class="btn btn-success btn-block" id="load-ask-button" onclick="load_ask(<?=$id?>)">Загрузити ще...</buttom>
						<?endif;?>
					</div>
				</div>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?load_media('lightbox_js')?>
<script>
$(document).ready(function() {
	$('#emoji-button').popover({
		content: "<?show_emoji_list()?>",
	});
});
var allUserQuestionCount = <?=$ask_count?>;
var UserHash = "<?=$user_hash?>";
</script>
<?load_media(array('timeago','main.js','bootstrap_js'))?>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
<script type="text/javascript">
  VK.init({apiId: 4110203, onlyWidgets: true});
  VK.Widgets.Like("vk_like", {type: "button",height: "22px"},  <?=$id?>);
</script>
</body>
</html>