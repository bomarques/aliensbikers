<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>CRUD - Cadastrar</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>

<body>
	<div class="container">
		<header>
			<a href="index.php">Listar usuários</a><br>
			<h1>Cadastrar Ciclista</h1>

			<?php
			if (isset($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
		</header>

		<form class="row g-3" method="POST" action="proc_cad_usuario.php">
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Email</label>
				<input type="email" name="email" class="form-control" id="inputEmail4">
			</div>
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Senha</label>
				<input type="password" name="senha" class="form-control" id="inputPassword4">
			</div>
			<div class="col-md-6">
			<label for="inputName" class="form-label">Nome</label>
				<input type="text" name="nome" class="form-control" id="inputName">
			</div>
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Apelido</label>
				<input type="text" name="apelido" class="form-control" id="inputNickname">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Instagram</label>
				<input type="url" name="instagram" class="form-control" id="inputProfile" placeholder="Link do instagram">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Data de Nascimento</label>
				<input type="date" name="nascimento" class="form-control" id="inputBirthday" placeholder="">
			</div>
			<div class="col-12">
				<button type="submit" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
			</div>
		</form>

	</div>
</body>

</html>