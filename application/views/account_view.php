<?
// set background
	$b = $this->ion_auth->user()->row()->background;
	$settings = json_decode($settings);
	if($b == null){
		$b = "http://cs607728.vk.me/v607728417/12df/IbJ84gF1b_M.jpg";
	}
?>
<!doctype html>
<html lang="ru">
<head>

	<meta charset="UTF-8">
	<title><?=$name?> | Звідай.нет</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/media/css/lightbox.css">
	<?
		load_media(array('jquery','bootstrap_css','main.css'));
	?>
	<style>
	body{
		background-image: url(<?=$b?>);
	}
	</style>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
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
		<div class="alert alert-info">
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong>Ви знаходетесь на тестовій версії сайту. Скоро ми буде доступна повна версія, а зараз можете підписатися на наш паблік ВК, та залишати відгуки :)</strong>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-xs-3" style="text-align:center;">
					<!-- avatar -->
					<?if($photo_big != null):?>
					<a href="<?=$photo_big?>"  data-lightbox="avatar">
						<img src="<?=$photo?>" alt="<?=$name?>" class="img-thumbnail">
					</a>
					<?endif?>
					<?if($photo_big == null):?>
						<img src="<?=$photo?>" alt="<?=$name?>" class="img-thumbnail">
					<?endif?>
					
					<button  data-toggle="modal" data-target="#photo_upload_box" class="btn btn-default btn-block change-avatar-button"><i class="glyphicon glyphicon-camera"></i> <b>Змінити фото</b></button>
					<?if($settings->show_vk_link and $vk_id != null):?>
						<a href="https://vk.com/id<?=$vk_id?>" class="btn btn-primary btn-block" target="_blank"><i class="glyphicon glyphicon-share-alt"></i> <b>Вконтакті</b></a>
					<?endif?>
				</div>
				<div class="col-xs-9">
					<span class="label label-primary pull-right tool" style="font-size:.9em;cursor:pointer" data-placement="top" data-title="Підписано на Вас" data-toggle="tooltip"><?=$this->functions->followers_count()?> <i class="glyphicon glyphicon-user"></i></span>
					<h1><?=$name?> <?if($city != null):?><small><b>(</b><?=$city?><b>)</b></small><?endif?></h1>
					<div class="alert alert-info status" data-toggle="modal" data-target="#set_status_box" style="cursor:pointer">
					  <strong id="user-status"><?if($status == null){ echo "<i>Натисни щоб поставити статус :)</i>";}
					  else{echo emoji_replace($status);}?></strong>
					</div>
					<h3>Розкажи про себе в соц мережах:</h3>
					<div class="alert alert-success">
						<b>Посилання на сторінку :</b>
						<input type="text" value="<?=base_url(). $username?>" onclick="$(this).select();" class="form-control share-input" />
						<div style="margin-top:10px">
							<button class="btn btn-sm btn-primary" onclick="window.open('http://vk.com/share.php?url=zviday.net%2F<?=$username?>&title=Звідай+шось+%7C+zviday.net%2F<?=$username?>','vkontakte', 'location=1,status=1,scrollbars=1,resizable=1,width=800,height=400,top=200,left=200')"><b>ВКонтакті</b></button>
							<button class="btn btn-sm btn-info" onclick="window.open('http://twitter.com/home?status=Звідай+шось+%7C+zviday.net%2F<?=$username?>','twitter', 'location=1,status=1,scrollbars=1,resizable=1,width=800,height=400,top=200,left=200')"><b>Twitter</b></button>
						</div>
					</div>
					<?
						$fol = $this->db->where('who',$id)->limit(7)->get('follow');
						if($fol->num_rows > 0){
							foreach ($fol->result() as $key => $value) {
								$data[] = $value->by;
							}
							$fol = $this->db->where_in('id', $data)->order_by("id","desc")->get("users")->result();	
						}
						else{
							$fol = null;
						}
					?>
					<?if($fol !== null):?>
					<div class="alert alert-success" style="padding-bottom:17px">
					<?foreach($fol as $val):?>
						<a href="<?='/'.$val->username?>" class="friends-link">
							<img style="margin-top:10px;" data-title="<strong><?=$val->name?></strong>" data-placement="top" data-toggle="tooltip"  data-html="true" class="tool ask-avatar" src="<?=$val->photo_small?>" alt="<?=$val->name?>"></img>
						</a>
					<?endforeach?>
					</div>
					<?endif?>
				</div>
			</div>
		</div>
		<div class="well">
			<strong style="font-size:1.5em">Відповідей: <span class="badge em-8 q-count"><?$ask_count = $this->db->where('to',$id)->where('is_new',0)->get('questions')->num_rows(); echo $ask_count?></span></strong>
			<div id="vk_like" class="pull-right vk-button"></div>
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<?$this->load->view('base_question_answer_view',array('ask' => $questions,'delete' => true))?>
					<?if($ask_count > 10):?>
						<buttom class="btn btn-success btn-block" id="load-ask-button" onclick="load_ask(<?=$id?>)">Загрузити ще.. </buttom>
					<?endif;?>
				</div>
			</div>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/modal_photo_upload_view')?>
<?$this->load->view('template/modal_avatar_view')?>
<?$this->load->view('template/modal_set_status_view')?>
<?load_media(array('timeago','main.js'))?>
<script src="/media/js/lightbox-2.6.min.js"></script>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
<script>
	var allUserQuestionCount = <?=$ask_count?>;
	var userToken = '<?=$hash?>';
	VK.init({apiId: 4110203, onlyWidgets: true});
	VK.Widgets.Like("vk_like", {type: "button",height: "22px"}, <?=$id?>);
</script>
<?load_media('bootstrap_js')?>
</body>
</html>