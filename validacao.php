<?php
session_start();
include_once("conexao.php");

if(isset($_POST['but_submit'])){

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if ($email != "" && $senha != ""){

        $result_usuario = "SELECT COUNT(*) AS cntUser from ciclistas where email='".$email."' and senha='".$senha."'"; //$sql_query
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $row = mysqli_fetch_array($resultado_usuario);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['email'] = $email;
            header('Location: index.php');
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Email e/ou senha inválido(s)</p>";
	        header("Location: index.php");
        }

    }

}
