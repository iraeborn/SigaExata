<?php
session_start();
$connection = mysqli_connect("localhost", "sigaexat_admin","Siga**65","sigaexat_siga");

if(isset($_POST["registerbtn"])){

$user = $_POST["user"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["confirmpassword"];
$datacadastro = date("d/m/Y");
$tipo
$status
	
	if($password === $cpassword){

	$query = "INSERT INTO user (username, email, senha, datacadastro, tipo, status) VALUES ('$username', '$email'.'$password', '$datacadastro', '$tipo', 'status')";
	$query_run = mysqli_query($connection, $query);
		if($query_run){
		$SESSION['sucess'] = "Usuário criado";
		header['Location:register.php'];
		}else{
		$SESSION['status'] = "Usuário não foi criado";
		header['Location:register.php'];		
		}
	}else{
		$SESSION['status'] = "O campo senha não confere";
		header('Location: register.php');
	} //end if is set cpassword

} //end if is set post
?>
