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
	<title>Звідай.нет | Нові питання</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?
		load_media(array('jquery','bootstrap_css','main.css'));
	?>
	<style>
	body{
		background-image: url(<?=$b?>);
	}
	</style>
	<script>
		var userToken = '<?=$user_hash?>';
	</script>
</head>
<body>
	<?$this->load->view('template/navbar_view')?>
	<div class="container">

		<?if(isset($success)):?>
			<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert">&times;</a>
			    <strong><?=$success?></strong> <i class="glyphicon glyphicon-ok"></i>
			</div>
		<?endif;?>

		<div class="well">
			<h3>Усього нових питань <span class="q-count label label-danger"><?=$this->functions->new_questions_count()?></span></h3>
			<hr>
			<div class="cos-xs-12">
				<?foreach($ask as $val):?>
				<?
				if($val->public == 1){
				$from = $this->db->where("id", $val->from_whom)->get('users')->row();
					$name = $from->name;
					$photo = $from->photo_small;
					$username = $from->username;
					$link = "/" . $from->username;
				}
				else{
					$photo = "/media/avatar/100/100x100.png";
					$link = "#";
				}
				if($val->question_day == 1){
					$photo = "/media/logo_100.png";
				}
				?>

				<div class="media" id="<?=$val->hash?>">
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
					  	<div class="col-xs-1">
					  		<span onclick='delAsk("<?=$val->hash?>");return false' data-title="Удалити" data-placement="top" data-toggle="tooltip"  data-container="body" class="del-ask pull-right">
								<button type="button" class="close" aria-hidden="true">&times;</button>
					  		</span>
					  	</div>
					  </div>
						<div class="alert alert-info" style="margin-top:10px;">
							<?=form_open_multipart("questions/setask")?>
							<textarea class="form-control" rows="3" name="answer" onfocus="$(this).nextUntil().css('display','inline')" class="answer-area" id="question-<?=$val->hash?>" maxlength="255"></textarea>
							<input type="hidden" value="<?=$val->hash?>" name="hash">
							<input type="hidden" value="<?=$user_hash?>" name="token">
							<div class="row" style="display:none">
								<div class="col-xs-3" style="padding:0">
									<button type="submit" class="btn btn-primary asnwer-button btn-block">
										<strong>Отвітити</strong>
									</button>
								</div>
								<div class="col-xs-9 emoji-block" data-hash="<?=$val->hash?>">
									<?show_emoji_list_q();?>
								</div>
							</div>								
							<div class="file-div" style="display:none">
									<hr>
									<h4>Прикріпити фото:</h4>
									<input type="file" name="userfile" />
							</div>
							</form>
						</div>
					</div>
					<abbr class="timeago" title="<?=$val->date?>"></abbr>
					<?if(isset($name)):?>
						<a href="<?='/' . $username;?>" class="ask-from"><strong>від <?=$name;?></strong></a>
						<?unset($name)?>
						<?unset($photo)?>
					<?endif?>
				<hr>
				</div>
				<?endforeach?>
				<?echo $this->pagination->create_links();?>
				</div>
			</div>
			<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>