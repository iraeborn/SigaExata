<?php
date_default_timezone_set('UTC');

session_start();
include 'conn.php';

$ac = $_POST["registerbtn"];

$email = $_POST["email"];
$password = $_POST["password"];

if($ac == "registro"){

function before($this, $inthat){
        return substr($inthat, 0, strpos($inthat, $this));
}
$user = before('@', $_POST["email"]);

$cpassword = $_POST["confirmpassword"];
$datacadastro = date("d/m/Y"); 
$tipo = 1; //nível de acesso:0 = administrador,1 = cliente,2 = comercial,3 = marketing,4 = ti, 5 = juridico
$status = 1; //0 = ativo, 1 = desativado
	
	if($password === $cpassword){
		
		//verifica se email ja está sendo utilizado
		$query = "SELECT * FROM user WHERE email = '".$email."'";
		$query_run = mysqli_query($connection, $query);
	
		if(mysqli_num_rows($query_run) == 1){
			
			//echo "você está dentro<br>";
			//echo $query;
			$_SESSION['sucess'] = "false";
			$_SESSION['status'] = "Esse email já está sendo usado";
			header('Location:register.php');
			die();
			
		}else{
			
		$query = "INSERT INTO user (username, email, senha, datacadastro, tipo, status) VALUES ('$user','$email','$password','$datacadastro','$tipo','$status')";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			
			$_SESSION['sucess'] = "true";
			$_SESSION['status'] = "Usuário criado com sucesso";
			header('Location:login.php');
			die();
			
		}else{
			
			$_SESSION['status'] = "Usuário não foi criado";
			header('Location:register.php');
			die();
			
		}
		
	}
	}else{
	    
		$_SESSION['status'] = "O campo senha não confere";
		header('Location:register.php');
		die();
		
	} //end if is set cpassword

}elseif($ac == "login"){
	
	if(empty($_POST["email"]) || empty($_POST["password"])){// 2 campos obrigatorios
	//echo "Os dois campos são obrigatórios";
	$_SESSION['sucess'] = "false";
	$_SESSION['status'] = "Os dois campos são obrigatórios";
	header('Location:login.php');
	}else{
		
	// proteção MySQL injection
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($connection, $email);
$password = mysqli_real_escape_string($connection, $password);
//$password = md5($password);
	
	
	$query = "SELECT * FROM user WHERE email = '".$email."' AND senha = '".$password."'";
	$query_run = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($query_run) == 1){
		//echo "você está dentro<br>";
		//echo $query;
		$_SESSION['sucess'] = "true";
		$_SESSION['status'] = "você está dentro";
		header('Location:clientes.php');
		die();
		
	}else{
		//echo "Não encontrou seu login<br>";
		//echo $query;
		$_SESSION['sucess'] = "false";
		$_SESSION['status'] = "Login ou senha inválidos";
		header('Location:login.php');
		die();
	}
		
	}//end 2 campos obrigatorios
}//end if is set post
?>
