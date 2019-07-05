<?php
session_start();
include 'includes/session.php';
include 'conn.php';

date_default_timezone_set('UTC');

$ac = $_POST["registerbtn"];

if($ac == "registro"){

function before($this, $inthat){
        return substr($inthat, 0, strpos($inthat, $this));
}
$user = before('@', $_POST["email"]);
$email = $_POST["email"];
$password = $_POST["password"];
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
			header('Location:register');
			die();
			
		}else{
			
		$query = "INSERT INTO user (username, email, senha, datacadastro, tipo, status) VALUES ('$user','$email','$password','$datacadastro','$tipo','$status')";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			
			$_SESSION['sucess'] = "true";
			$_SESSION['status'] = "Usuário criado com sucesso";
			header('Location:login');
			die();
			
		}else{
			
			$_SESSION['status'] = "Usuário não foi criado";
			header('Location:register');
			die();
			
		}
		
	}
	}else{
	    
		$_SESSION['status'] = "O campo senha não confere";
		header('Location:register');
		die();
		
	} //end if is set cpassword

}elseif($ac == "login"){

	$email = $_POST["email"];
	$password = $_POST["password"];
	
	if(empty($_POST["email"]) || empty($_POST["password"])){// 2 campos obrigatorios
	//echo "Os dois campos são obrigatórios";
	$_SESSION['sucess'] = "false";
	$_SESSION['status'] = "Os dois campos são obrigatórios";
	header('Location:login');
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
		$_SESSION['success'] = "true";
		$_SESSION['status'] = "você está dentro";
		header('Location:clientes');
		die();
		
	}else{
		//echo "Não encontrou seu login<br>";
		//echo $query;
		$_SESSION['success'] = "false";
		$_SESSION['status'] = "Login ou senha inválidos";
		header('Location:login');
		die();
	}
		
	}//end 2 campos obrigatorios
}//end if is set post
elseif($ac == "editarcliente"){
echo "Editar usuário";
}elseif($ac == "excluircliente"){
	
//echo "excluir do usuário ".$_POST["deletaruser"];
	$query = "DELETE FROM user WHERE email = '".$_POST["deletaruser"]."'";
	$query_run = mysqli_query($connection, $query);
	
	$_SESSION['success'] = "true";
	$_SESSION['status'] = "Usuário excluído com sucesso";
	header('Location:clientes');
}
?>
