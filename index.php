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
		$qnt_result_pg = 20;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_usuarios = "SELECT * FROM ciclistas LIMIT $inicio, $qnt_result_pg";
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
		</tr>
	</thead>
	<tbody>
		<?php while( $row_usuario = mysqli_fetch_assoc($resultado_usuarios) ) { ?>
		   <tr id="<?php echo $row_usuario ['id']; ?>">
		   <td  width=10 height=2><?php echo $row_usuario ['id']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['nome']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['apelido']; ?></td>
		   <td  width=25 height=2><?php echo $row_usuario ['instagram']; ?></td>
		   <td  width=25 height=2><?php echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a> | <a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a>"; ?></td>				   				   				  
		   </tr>
		<?php } ?>
	</tbody>
</table>
                    
                  
                    
			<!-- echo "ID: " . $row_usuario['id'] . "<br>";
			echo "Nome: " . $row_usuario['nome'] . "<br>";
			echo "E-mail: " . $row_usuario['email'] . "<br>";
			echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a> |  ";
			echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>"; -->


                        
                        
                        
		<!--PAGINAÇÃO CASO NECESSÁRIO:
			<?php
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 1; ?>
                        
                     <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="index.php?pagina=1">Primeira</a></li>
    <li class="page-item"><a class="page-link" <?php for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina; $pag_ant++){
    if($pag_ant >= 1){echo "href='index.php?pagina=$pag_ant'";}}?>><?php echo "$pag_ant"?></a></li>
    <li class="page-item"><div class="page-link"><?php echo "$pagina"?></div></li>
    <li class="page-item"><a class="page-link" <?php for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){ 
        if($pag_dep <= $quantidade_pg){echo "href='index.php?pagina=$pag_dep'";}}?>><?php echo "$pag_dep"?></a></li>
    <li class="page-item"><a class="page-link"<?php echo "href='index.php?pagina=$quantidade_pg'"?>>Ultima</a></li>
  </ul>
</nav>   
                      
                        
              <?php          
		echo "<a href='index.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='index.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>
		-----------------------------------------------------------------------------
		-->
				

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		</div></body>
</html>