<nav class="navbar navbar-inverse no-margin" style="border-radius:0; border: none; box-shadow: 0 0 8px rgba(255,255,255,0.5) inset, 0 0 10px rgba(0,0,0,0.5);">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">Brand</a>-->
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