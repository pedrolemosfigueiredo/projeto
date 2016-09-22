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
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
	</head>
	<body>
	<!-- <div class="container"> -->
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
	<!-- </div> -->
	<div class="container">
		<div class="row">
			<form action="index.php" method="get">
				{for $i=0 to $nDisciplinas - 1}
				<div class="col-lg-4">
					<button type="submit" name="disciplina" value="{$disciplinas[$i][0]}" class="btn btn-info">{$disciplinas[$i][1]}</button><p/>
				</div>
				{/for}
			</form>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="view/bootstrap/js/jquery.min.js"><\/script>')</script>
	<script src="view/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>