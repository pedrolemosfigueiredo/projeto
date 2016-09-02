<?php
/* Smarty version 3.1.30, created on 2016-09-02 15:15:14
  from "C:\wamp64\www\daw\projeto\view\templates\authentication.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57c99782976ff6_41301847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13ed3e2d2f42c8b4fb6c56f29f2d5747a2c041c2' => 
    array (
      0 => 'C:\\wamp64\\www\\daw\\projeto\\view\\templates\\authentication.tpl',
      1 => 1472829310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c99782976ff6_41301847 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
					aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li role="separator" class="divider"></li>
					<li class="dropdown-header">Nav header</li>
					<li><a href="#">Separated link</a></li>
					<li><a href="#">One more separated link</a></li>
				  </ul>
				</li>
			  </ul>
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
				<?php if ($_smarty_tpl->tpl_vars['showAuthenticationString']->value) {?>
					<p class="text-danger"><?php echo $_smarty_tpl->tpl_vars['authenticationString']->value;?>
</p>
				 <?php }?>
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
					<button class="btn btn-lg btn-primary btn-block" id"loginButton" name="login" type="submit">
						Sign in
					</button>
				</form>
			</div>
		  </div>
		</div>
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>window.jQuery || document.write('<?php echo '<script'; ?>
 src="view/bootstrap/js/jquery.min.js"><\/script>')<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="view/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
