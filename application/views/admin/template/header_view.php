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
    <a class="navbar-brand" href="/admin">Звідай.нет</a>
  </div>

  <div class="collapse navbar-collapse" id="nav-c">
    <ul class="nav navbar-nav">
      <li><a href="/admin/question_day">Питання дня</a></li>
      <li><a href="/admin/no_answer_questions/">Питання без відповідей</a></li>
      <li><a href="/questions">Питання</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/settings">Основні</a></li>
          <li><a href="/settings/background">Оформлення</a></li>
          <li><a href="/settings/photo_upload">Аватар</a></li>
          <li><a href="/settings/change_password">Пароль</a></li>
        </ul>
      </li>
    </ul>
     <ul class="nav navbar-nav navbar-right" style="margin-right:10px;">
      <li><a href="/auth/logout/">Вийти</a></li>
    </ul>
  </div>
  </div>
</nav>