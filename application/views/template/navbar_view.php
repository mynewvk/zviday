<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-c">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Звідай.нет</a>
    <?
      $user_id = $this->ion_auth->get_user_id();
    ?>
  </div>

  <div class="collapse navbar-collapse" id="nav-c">
    <ul class="nav navbar-nav">
      <li><a href="/account/friends">Друзі</a></li>
      <li><a href="/account/search">Пошук</a></li>
      <li><a href="/questions/answer">Відповіді <?=$this->functions->new_answers_count_badge($user_id)?></a></li>
      <li><a href="/questions/comments">Коментарі <?=$this->functions->new_comments_count_badge($user_id)?></a></li>
      <li><a href="/account/feed">Стрічка</a></li>
      <li><a href="/questions">Питання <?=$this->functions->new_questions_count_badge($user_id)?></a></li>
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
      <li><a href="/auth/logout/<?=$this->functions->get('hash')?>">Вийти</a></li>
    </ul>
  </div>
</nav>