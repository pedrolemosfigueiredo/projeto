<!DOCTYPE html>
<html lang="pt-pt">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gestão de notas</title>
		<link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
		<link href="view/css/navbar.css" rel="stylesheet">
		<link href="view/css/jumbotron.css" rel="stylesheet">
		<link href="view/css/signin.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Sistema de gestão de notas</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			</div>
		  </div>
		</nav>
		<div class="container">
		  <div class="page-header">
			<h1>Bem-vindo ao sistema de gestão de notas do IPBeja</h1>
		  </div>
		  <p class="lead">Esta página destina-se apenas a alunos e professores do Instituto Politécnico de Beja.</p>
		  <div class="jumbotron">
			<div class="container">
				{if $showAuthenticationString}
					<p class="text-danger">{$authenticationString}</p>
				 {/if}
				<p>Para entrar introduza os seu nome de utilizador e senha:</p>
				<form class="form-signin" role="form" method="post" action="index.php">
					<label for="username">Nome de utilizador</label>
					<input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus>
					<label for="password">Senha</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					<div class="checkbox">
					  <label>
						<input type="checkbox" value="remember-me"> Remember me
					  </label>
					</div>
					<!-- <button class="btn btn-lg btn-primary btn-block" id="loginButton" name="login" type="submit">
						Sign in
					</button> -->
					<input class="btn btn-lg btn-primary btn-block" type="submit" value="login" name="login">
				</form>
			</div>
		  </div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="view/bootstrap/js/jquery.min.js"><\/script>')</script>
		<script src="view/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>