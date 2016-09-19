<?php
/* Smarty version 3.1.30, created on 2016-09-19 17:41:02
  from "C:\wamp64\www\daw\projeto\view\templates\alunoMedia.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e0232ecf0041_45332184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffab821bef35d74d66a137afa9d194067f1fae51' => 
    array (
      0 => 'C:\\wamp64\\www\\daw\\projeto\\view\\templates\\alunoMedia.tpl',
      1 => 1474306856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e0232ecf0041_45332184 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="utf-8">
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gestão de notas</title>
		<link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
		<link href="view/css/navbar.css" rel="stylesheet">
		<link href="view/css/jumbotron.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Sistema de Gestão de notas</a>
			  </div>
			  <div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				  <li class="active"><a href="media.php">ver Média</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="controller/logout.php">Terminar sessão</a></li>
				</ul>
			  </div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
		<div class="container disciplinas">
			<h2>A sua média é de <?php echo $_smarty_tpl->tpl_vars['media']->value;?>
 valores<h2>
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
