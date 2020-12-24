<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar</title>
                <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
		
	</head>
	<body><div class="container">
		<header><a href="cad_usuario.php">Cadastrar usuário</a><br>
		<h1>Ranking UCAlliens</h1></header>
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
			<th>Editar</th>
			<th>Pontuação</th>													
		</tr>
	</thead>
	<tbody>
		<?php $i = 0; while( $row_usuario = mysqli_fetch_assoc($resultado_usuarios) ) { $i++; ?>
		   <tr id="<?php echo $row_usuario ['id']; ?>">
		   <td  width=10 height=2><?php echo $i; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['nome']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['apelido']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['instagram']; ?></td>
		   <td  width=25 height=2><?php echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'><button style='background: #008000; border-radius: 6px; padding: 3px; cursor: pointer; color: #fff; border: none; font-size: 10px;'>editar</button></a> <a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'><button style='background: #FF0000; border-radius: 6px; padding: 3px; cursor: pointer; color: #fff; border: none; font-size: 10px;'>apagar</button></a>"; ?></td>				   				   				  
		   <td  width=25 height=2><?php echo $row_usuario ['pontuacao']; ?></td>
		   </tr>
		<?php } ?>
	</tbody>
</table>
                    
                        				

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		</div></body>
</html>