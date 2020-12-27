<!-- Formulário de Login -->
<?php
session_start();
?>
<!doctype html>
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
            <a href="cad_usuario.php" class="nav-link">Cadastrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header" data-parallax="true" style="background-image: url('assets/img/mtblog.jpg')">
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
<form class="row g-3" method="POST" action="validacao.php">
    <legend>Dados de Login</legend>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Email</label>
				<input type="email" name="email" class="form-control" id="inputEmail4">
			</div>
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Senha</label>
				<input type="password" name="senha" class="form-control" id="inputPassword4">
			</div><div class="col-12">
				<button type="submit" value="Entrar" name="but_submit"class="btn btn-primary">Entrar</button>
			</div></form>
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