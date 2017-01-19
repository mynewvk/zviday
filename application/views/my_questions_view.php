<?
// set background
	$b = $this->ion_auth->user()->row()->background;
	if($b == null){
		$b = "http://cs607728.vk.me/v607728417/12df/IbJ84gF1b_M.jpg";
	}
	$userToken = $this->functions->get_user_hash();
	$ask_count = $this->functions->questions_count();
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
	<link rel="stylesheet" href="/media/css/lightbox.css">
	<script>
		var userToken = '<?=$userToken?>';
		var allUserQuestionCount = '<?=$ask_count?>'
	</script>
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
			<h5>
				<strong style="font-size:1.5em">Відповідей: <span class="badge em-8 q-count"><?=$ask_count?></span></strong>
			</h5>
			<hr>
			<?$this->load->view('base_question_answer_view',array('ask' => $ask, 'delete' => true))?>
			<?=$this->pagination->create_links();?>
		</div>
	</div>
<script src="/media/js/lightbox-2.6.min.js"></script>
<?$this->load->view('template/footer_view')?>