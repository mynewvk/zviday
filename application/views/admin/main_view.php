<?$this->load->view('admin/template/header_view')?>
<?
	
?>
<div class="container">
	<div class="well">
		<h1>Статистика</h1>
		<hr>
		<div class="row">
			<div class="col-xs-6">
				<h4>Користувачі:</h4>
				<ul class="list-group">
				<li class="list-group-item">
				  <span class="badge"><?=$this->stats->all_users()?></span>
				  Усі користувачі
				</li>
				<li class="list-group-item">
				  <span class="badge"><?=$this->stats->vk_users()?></span>
				  <b>Користувачі підключені до ВК</b>
				</li>
				  <li class="list-group-item">
				    <span class="badge"><?=$this->stats->new_users_today()?></span>
				    Нових користувачів за сьогодні
				  </li>
				  <li class="list-group-item">
				    <span class="badge"><?=$this->stats->users_online_one_day()?></span>
				    Користувачі, які заходили не більше, ніж день тому
				  </li>
				  <li class="list-group-item">
				    <span class="badge"><?=$this->stats->users_online()?></span>
				    Користувачів онлайн
				  </li>
				  <li class="list-group-item">
				    <span class="badge"><?=$this->stats->deactivated_users()?></span>
				    Деактивовані користувачі
				  </li>
				</ul>
			</div>
				<div class="col-xs-6">
					<h4>Питання:</h4>
					<ul class="list-group">
					  <li class="list-group-item">
					    <span class="badge"><?=$this->stats->questions_today()?></span>
					    Усього нових питань за сьогодні
					  </li>
					  <li class="list-group-item">
					    <span class="badge"><?=$this->stats->answers_today()?></span>
					    Усього відповідей за сьогодні
					  </li>
					  <li class="list-group-item">
					    <span class="badge"><?=$this->stats->answers_month()?></span>
					    Усього відповідей за місяць
					  </li>
					  <li class="list-group-item">
					    <span class="badge"><?=$this->stats->comments_all()?></span>
					    <b>Комментарів Усього</b>
					  </li>
					</ul>
			</div>
		</div>
	</div>	
</div>