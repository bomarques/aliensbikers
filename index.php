<?php
session_start();
include_once("conexao.php");?>
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
  <div class="page-header" data-parallax="true" style="background-image: url('assets/img/mtb.jpg')">
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
      <h1>Ranking UCAliens</h1></header>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 30;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_usuarios = "SELECT * FROM ciclistas ORDER BY pontuacao DESC"; /*LIMIT $inicio, $qnt_result_pg";*/
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		?>
            <table id="editableTable" class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome</th>
			<th>Apelido</th>
			<th>Instagram</th>
			<th>Pontuação</th>
			<th>Editar</th>													
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; while( $row_usuario = mysqli_fetch_assoc($resultado_usuarios) ) { $i++; ?>
		   <tr id="<?php echo $row_usuario ['id']; ?>">
		   <td  width=10 height=2><?php echo $i; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['nome']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['apelido']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['instagram']; ?></td>
       <td  width=25 height=2><?php echo $row_usuario ['pontuacao']; ?></td>
       <td  width=25 height=2><?php echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'><button style='background: #008000; border-radius: 6px; padding: 3px; cursor: pointer; color: #fff; border: none; font-size: 10px;'>editar</button></a> <a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'><button style='background: #FF0000; border-radius: 6px; padding: 3px; cursor: pointer; color: #fff; border: none; font-size: 10px;'>apagar</button></a>"; ?></td>				   				   				  
		   </tr>
		<?php } ?>
	</tbody>
</table>
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