<?
// set background
	$b = $this->ion_auth->user()->row()->background;
	if($b == null){
		$b = "http://cs607728.vk.me/v607728417/12df/IbJ84gF1b_M.jpg";
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Звідай.нет | Стрічка</title>
	<link rel="stylesheet" href="/media/css/lightbox.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div class="well" style="padding-top:0px">
			<h2>Стрічка</h2>
			<hr>
			<?foreach($ask as $val):?>
				<?
				$user_to = $this->ion_auth->user($val->to)->row();
				$user_from = ($val->from_whom != null) ? $this->ion_auth->user($val->from_whom)->row() : null;
				?>
				<div class="media">
					<div class="pull-left">
						<a href="<?="/" . $user_to->username?>">
						  <img class="media-object ask-avatar" src="<?=$user_to->photo_small?>">
						</a>
						<?if($val->question_day):?>
							<span class="label label-danger tool" data-title="Питання від Звідай.нет" data-placement="top" data-toggle="tooltip"  data-html="true" style="width:100%;display:inline-block"><i class="glyphicon glyphicon-flag"></i> Звідай.нет</span>
						<?endif?>
					</div>
					<div class="media-body">
						<abbr class="timeago" title="<?=$val->date_answer?>"></abbr> <h5 style="margin-top:0px;display:inline-block"><a href="<?="/".$user_to->username?>"><?=$user_to->name?></a> відповів(ла) на <a href="/questions/one/<?=$val->hash?>">питання:</a> <?if($user_from != null):?>
						(<span>від</span> <b><a href="/<?=$user_from->username?>" class="text-info"><?=$user_from->name?></a></b>)
						<?unset($user_from)?>
						<?endif;?></h5>
					    <h4 class="media-heading"><?=link_replace(emoji_replace($val->question))?></h4>
						<div class="alert alert-info">
							<strong><?=link_replace(emoji_replace($val->answer))?></strong>
							<?if($val->photo != null):?>
								<br>
								<a href="<?=$val->photo?>" data-lightbox="answer-photo">
									<img src="<?=$val->photo_small?>" class="thumbnail ask-answer-photo">
								</a>
							<?endif?>
						</div>
					</div>
				</div>
				<hr>
			<?endforeach?>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
	<?load_media(array('main.js','bootstrap_js','timeago'))?>
	<script src="/media/js/lightbox-2.6.min.js"></script>
	</body>
</html>