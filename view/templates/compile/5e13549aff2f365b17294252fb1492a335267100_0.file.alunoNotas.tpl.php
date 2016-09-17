<?php
/* Smarty version 3.1.30, created on 2016-09-17 18:53:31
  from "C:\wamp64\www\daw\projeto\view\templates\alunoNotas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57dd912b6964b0_90849124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e13549aff2f365b17294252fb1492a335267100' => 
    array (
      0 => 'C:\\wamp64\\www\\daw\\projeto\\view\\templates\\alunoNotas.tpl',
      1 => 1474138410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57dd912b6964b0_90849124 (Smarty_Internal_Template $_smarty_tpl) {
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
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="#">About</a></li>
				  <li><a href="#">Contact</a></li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
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
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="controller/logout.php">Terminar sessão</a></li>
				</ul>
			  </div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
		<div class="container disciplinas">
			<table class="table">
				<tr><th>Avaliação</th><th>nota<th></tr>
				<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['nNotas']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['nNotas']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
					<tr><td><?php echo $_smarty_tpl->tpl_vars['notas']->value[$_smarty_tpl->tpl_vars['i']->value][2];?>
 (<?php echo $_smarty_tpl->tpl_vars['notas']->value[$_smarty_tpl->tpl_vars['i']->value][3];?>
)</td><td><?php echo $_smarty_tpl->tpl_vars['notas']->value[$_smarty_tpl->tpl_vars['i']->value][1];?>

				<?php }
}
?>

			</table>
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
