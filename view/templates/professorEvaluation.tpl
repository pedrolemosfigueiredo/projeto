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
				<ul class="nav navbar-nav navbar-right">
				  <li><a href="controller/logout.php">Terminar sessão</a></li>
				</ul>
			  </div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
		<div class="container disciplinas">
			<div class="row">
				<form method="post" action="index.php">
					{for $i=0 to $nNotas - 1}
						<label for="nota[{$notas[$i][0]}]">{$notas[$i][2]}</label><br>
						<input type="number" name="nota[{$notas[$i][0]}]" min="0" max="20" value="{$notas[$i][1]}"><p/>
					{/for}
					<input type="hidden" name="evaluation" value="{$evaluation} "/>
					<input type="submit" name="changeGrades" value="Guardar"></input>
					<input type="submit" value="Cancelar"></input>
				</form>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="view/bootstrap/js/jquery.min.js"><\/script>')</script>
		<script src="view/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>