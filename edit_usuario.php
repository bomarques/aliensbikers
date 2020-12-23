<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM ciclistas WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
	</head>
	<body><div class="container"><header>		<a href="cad_usuario.php">Cadastrar ciclista</a><br>
		<a href="index.php">Página inicial</a><br>
		<h1>Editar Ciclista</h1></header>

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

<form class="row g-3" method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $row_usuario['email']; ?>" id="inputEmail4">
			</div>
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Senha</label>
				<input type="password" name="senha" class="form-control" id="inputPassword4">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Nome</label>
				<input type="text" name="nome" class="form-control" value="<?php echo $row_usuario['nome']; ?>"id="inputAdress2">
			</div>
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Apelido</label>
				<input type="text" name="apelido" class="form-control" value="<?php echo $row_usuario['apelido']; ?>" id="inputAdress2">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Instagram</label>
				<input type="url" name="instagram" class="form-control" value="<?php echo $row_usuario['instagram']; ?>" id="inputAdress2" placeholder="Link do instagram">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Data de Nascimento</label>
				<input type="date" name="nascimento" class="form-control" value="<?php echo $row_usuario['nascimento']; ?>" id="inputAdress2" placeholder="">
			</div>
			<div class="col-12">
				<input type="submit" value="Editar" class="btn btn-primary">
			</div>
		</form>
		<!-- como era
			
		<section><form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php// echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php// echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php //echo $row_usuario['email']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form></section> -->
	</div></body>
</html>