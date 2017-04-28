<nav class="navbar navbar-inverse no-margin navbar-shadows">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand visible-xs" href="#">Brand</a>
    </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav vertical-menu visible-xs navbar-nav">
			<li class="active"><a href="#">Главная</a></li>
			<li><a href="#">Обратная связь</a></li>
			<li><a href="#">Каталог</a></li>
			<li><a href="#">Наши филиалы</a></li>
			<li><a href="#">Календарь мероприятий</a></li>
			<li class="nav-divider"></li>
			<li><a href="#">Вакансии</a></li>
		</ul>
	</div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="nav navbar-nav navbar-right">
        <!--<span><a href="#">Link</a></span>-->
		<form id="registration-form" class="form-inline navbar-right">
		  <div class="frm-group clear-both mrgn-xs">
			<label class="sr-only" for="login">Email address</label>
			<input class="btn-xs" type="text" class="form-control" id="login" placeholder="Login">
		  </div>
		  <div class="frm-group clear-both mrgn-xs">
			<label class="sr-only" for="password">Password</label>
			<input class="btn-xs" type="password" class="form-control" id="password" placeholder="Password">
		  </div>
		  <!--<div class="frm-group clear-both checkbox">
			<label>
			  <input class="btn-xs" type="checkbox"> 
			  <span> Запомнить меня </span>
			</label>
		  </div>-->
		  <div class="frm-group clear-both">
			  <a href="#registration">Регистрация</a>
		  </div>
		  <button type="submit" class="btn btn-default btn-xs" style="float:right">Войти</button>
		</form>
      </div>
    </div>
  </div>
</nav>
<!-- Логотип должен быть ниже чем nav-bar (иначе стили упадут) -->
<div class="logo hidden-xs">
	<div class="logo-text">
		<img src="./logo3.png" alt="logo"/>
	</div>
	<div class="logo-img">
		<img src="./logo2.png" alt="logo"/>
	</div>
</div>