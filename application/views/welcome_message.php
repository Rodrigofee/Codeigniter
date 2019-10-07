<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<title>Armazenando imagens no banco de dados Mysql</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<script>
	.teste {
		border - left: 3 px solid;
		border - right: 3 px solid;
		height: solid;
		border - bottom: 3 px solid #000;
	border-top: 3px solid # 000;
		display: block;
	}
</script>

<body>
	<div class="container">
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-offset-3">
				<h2>Selecione um novo arquivo de imagem</h2>
			</div>
			<form enctype="multipart/form-data" action="index.php/welcome/insert" method="post">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<label>Evento</label>
						<input class="form-control" name="evento_id" type="text" />
					</div>
					<div class="col-sm-6 col-sm-offset-3">
						<label>Descrição</label>
						<input class="form-control" name="nome_evento" type="textarea" />
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<br>
						<input name="imagem" type="file" />
						<br>
						<input class="form-control btn btn-success" type="submit" value="Salvar" />
						<br>
						<br>
						<br>
					</div>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-sm-offset-3">
				<h2>Listando arquivos de imagens</h2>
			</div>
		</div>
</body>

</html>