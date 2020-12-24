<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$apelido = filter_input(INPUT_POST, 'apelido', FILTER_SANITIZE_STRING);
$instagram = filter_input(INPUT_POST, 'instagram', FILTER_SANITIZE_STRING);
$nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
$pontuacao = filter_input(INPUT_POST, 'pontuacao', FILTER_SANITIZE_NUMBER_INT);

/*Teste para ver se recebeu valores
echo "ID: $id <br>";
echo "Nome: $nome <br>";
echo "E-mail: $email <br>";
*/
$result_usuario = "UPDATE ciclistas SET nome='$nome', email='$email', instagram='$instagram', nascimento='$nascimento', senha='$senha', apelido='$apelido', pontuacao='$pontuacao', modificado=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit_usuario.php?id=$id");
}
