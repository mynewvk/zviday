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
<body>
<?$this->load->view('template/navbar_view')?>
	<div class="container">
		<div class="well">
			<h3>Комментарії:</h3>
			<hr>
			<?foreach($comments as $val):?>
			<div class="media">
				<div class="media-body">
				  	<h4 class="media-heading comments-heading"><?=$val->comment?></h4>
				</div>
				<abbr class="timeago" title="<?=$val->date?>"></abbr>
				<a href="<?='/questions/one/' . $val->ask_hash?>" class="pull-right comments-link"><strong>Перейти до питаня »</strong></a>
			<hr>
			</div>
			<?endforeach?>
			<?=$this->pagination->create_links();?>
		</div>
		<?$this->load->view('template/bottom_nav_view')?>
	</div>
<?$this->load->view('template/footer_view')?>