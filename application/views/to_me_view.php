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
	<title>Звідай.нет</title>
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
<body style="background-image:">
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<h3>Відповіді на твої питання:</h3>
			<hr>
					<? foreach($ask as $val):?>

					<?if(true){
						$for = $this->db->where("id", $val->to)->get('users')->row();
						$fn = $for->name;
						$photo = $for->photo_small;
						$link = "/" . $for->username;
					}
					else{
						$photo = "/media/avatar/100/100x100.png";
						$link = "#";
					}
					$settings = $this->functions->get_user_settings($val->to);
					?>
					<div class="media">
						<a class="pull-left" href="<?=$link?>">
						    <img class="media-object ask-avatar" src="<?=$photo?>">
						</a>
						<div class="media-body">
						  	<h4 class="media-heading break-word"><?=emoji_replace($val->question)?></h4>
							<div class="alert alert-info ask-answer-alert" style="margin-top:10px;">
									<?if($val->answer != null):?>
									<span>
										<b><?=emoji_replace($val->answer)?></b>
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
					<?if(isset($fn)):?>
						<a href="<?= "/questions/one/" . $val->hash?>" class="ask-from"><strong>питання</strong></a>
						<span style="font-size:.9em">для</span>
						<a href="<?='/' . $for->username;?>" class="ask-from"><strong><?=$fn;?></strong></a>
					<?endif; unset($fn)?>
						<?if($settings->can_comment == true):?>
							<a href="<?='/questions/one/' . $val->hash?>" class="pull-right ask-comments"><strong>Коментарії <?if($val->comments_count > 0){echo "<span class='label label-success'>" .$val->comments_count. "</span>";}?></strong></a>
						<?endif;?>
						<?if($settings->can_comment == false):?>
							<a href="<?='/questions/one/' . $val->hash?>" class="pull-right ask-comments btn btn-link"><b>Перейти до питання</b></a>
						<?endif;?>
					</div>
					<hr>
					<?endforeach?>
					<?=$this->pagination->create_links();?>
					<?if($ask == null):?>
						<h1>Ти не відповів ні на одно питання!</h1>
					<?endif?>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>