<?php
date_default_timezone_set('UTC');

session_start();
include 'conn.php';

if(isset($_POST["registerbtn"])){

$user = $_POST["user"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["confirmpassword"];
$datacadastro = date("d/m/Y"); 
$tipo = 1; //nível de acesso:0 = administrador,1 = cliente,2 = comercial,3 = marketing,4 = ti, 5 = juridico
$status = 1; //0 = ativo, 1 = desativado
	
	if($password === $cpassword){

	$query = "INSERT INTO user (username, email, senha, datacadastro, tipo, status) VALUES ('$user','$email','$password','$datacadastro','$tipo','$status')";

	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
	    
		$_SESSION['sucess'] = "true";
		$_SESSION['status'] = "Usuário criado com sucesso";
		header('Location:register.php');
		die();
		
		}else{
		    
		$_SESSION['status'] = "Usuário não foi criado";
		header('Location:register.php');
		die();
		
		}
	}else{
	    
		$_SESSION['status'] = "O campo senha não confere";
		header('Location:register.php');
		die();
		
	} //end if is set cpassword

} //end if is set post
?>
