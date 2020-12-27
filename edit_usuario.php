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
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
	
	</head>
	<body><!doctype html>
<html lang="pt-br">

<head>
  <title>Alliens Bikers</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
	  <a class="navbar-brand" href="index.php">Home </a><a class="navbar-brand" href="Login.php">Login </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="cad_usuario.php" class="nav-link">
             Cadastrar
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header" data-parallax="true" style="background-image: url('assets/img/mtbedit.png')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Aliens Bikers</h1>
            <h4 class="title text-center">Equipe MTB de São Sebastião do Paraiso</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">

		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>

<form class="row g-3" method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			<div class="col-md-6">
				<label for="inputEmail" class="form-label">Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $row_usuario['email']; ?>" id="inputEmail">
			</div>
			<div class="col-md-6">
				<label for="inputPassword" class="form-label">Senha</label>
				<input type="password" name="senha" class="form-control" value="<?php echo $row_usuario['senha']; ?> id="inputPassword">
			</div>
			<div class="col-md-6">
				<label for="inputName" class="form-label">Nome</label>
				<input type="text" name="nome" class="form-control" value="<?php echo $row_usuario['nome']; ?>"id="inputName">
			</div>
			<div class="col-md-6">
				<label for="inputNickname" class="form-label">Apelido</label>
				<input type="text" name="apelido" class="form-control" value="<?php echo $row_usuario['apelido']; ?>" id="inputNickname">
			</div>
			<div class="col-md-6">
				<label for="inputProfile" class="form-label">Instagram</label>
				<input type="url" name="instagram" class="form-control" value="<?php echo $row_usuario['instagram']; ?>" id="inputProfile" placeholder="Link do instagram">
			</div>
			<div class="col-md-6">
				<label for="inputBirthday" class="form-label">Data de Nascimento</label>
				<input type="date" name="nascimento" class="form-control" value="<?php echo $row_usuario['nascimento']; ?>" id="inputBirthday" placeholder="">
			</div>
			<div class="col-md-6">
				<label for="inputScore" class="form-label">Pontuação</label>
				<input type="text" name="pontuacao" class="form-control" value="<?php echo $row_usuario['pontuacao']; ?>" id="inputScore" placeholder="">
			</div>
			<div class="col-12">
				<input type="submit" value="Editar" class="btn btn-primary">
			</div>
		</form>
		</div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">

          Parcerias: <a href="https://www.instagram.com/aliensbikersssp/">Instagram</a>&nbsp;ou&nbsp;<a href="mailto:aliensbikers@gmail.com">Email</a>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>Aliens Bikers SSP by
        <a href="https://www.linkedin.com/in/bruno-marques-39709a1a3/" target="blank">Bruno</a>.
      </div>
    </div>
  </footer>
</body>

</html>