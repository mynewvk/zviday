<?
	$background = "http://cs607728.vk.me/v607728417/12df/IbJ84gF1b_M.jpg";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Адмінка</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/media/css/lightbox.css">
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
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="non" style="min-width:1000px">
     <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-c">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Звідай.нет</a>
  </div>
  <div class="collapse navbar-collapse" id="nav-c">
  </div>
  </div>
</nav>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-xs-8">
				<?=form_open('admin/set_session')?>
					<div class="form-group">
						<label for="name">Name:</label><input class="form-control" type="text" id="name" name="one"></input>					
					</div>
					<div class="form-group">
						<label for="name">Password:</label><input class="form-control" type="text" id="password" name="two"></input>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" name="submit">Вхід</button>
					</div>
				<?=form_close()?>
			</div>
			<div class="col-xs-4">
				<?if(isset($error)):?>
					<div class="alert alert-danger">
						<?=$error?>
					</div>
				<?endif?>
			</div>
		</div>
	</div>
</div>