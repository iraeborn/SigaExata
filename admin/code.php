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
$avatar = $_POST["avatar"];
$user = before('@', $_POST["email"]);
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["confirmpassword"];
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
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
			
		$query_cliente = "INSERT INTO `cliente`(`nome`, `sobrenome`, `email1`) VALUES ('$nome', '$sobrenome', '$email')";
			
			
		$query_user = "INSERT INTO user (cliente_id, username, email, senha, datacadastro, tipo, status, avatar) VALUES (LAST_INSERT_ID(),'$user','$email','$password','$datacadastro', '$tipo', '$status', '$avatar')";

			
		$query_cliente_run = mysqli_query($connection, $query_cliente);
		$query_user_run = mysqli_query($connection, $query_user);

		if($query_cliente_run && $query_user_run){
			
			$_SESSION['sucess'] = "false";
			$_SESSION['status'] = "Usuário criado com sucesso";
			header('Location:login');
			die();
			
		}else{
			$_SESSION['sucess'] = "false";
			$_SESSION['status'] = "Usuário não foi criado";
			header('Location:register');
			die();
			
		}
		
	}
	}else{
	    $_SESSION['sucess'] = "false";
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
	
	$query = "SELECT
		cliente.nome, cliente.sobrenome, user.email, user.senha, user.cliente_id, user.avatar
		FROM
		cliente
		INNER JOIN
		user ON user.cliente_id = cliente.id
		WHERE user.email = '".$email."' AND user.senha ='".$password."'";

	$query_run = mysqli_query($connection, $query);
	
	if(mysqli_num_rows($query_run) == 1){
		//echo "você está dentro<br>";
		//echo $query;
		$_SESSION['sucess'] = "true";
		$_SESSION['status'] = "você está dentro";
		
		while($row = mysqli_fetch_assoc($query_run)){
		$_SESSION['sobrenome'] = $row['nome']."&nbsp;".$row['sobrenome'];
		$_SESSION['userid'] = $row['cliente_id'];
		$_SESSION['avatar'] = $row['avatar'];
		}
		header('Location:clientes');
		die();
		
	}else{
		//echo "Não encontrou seu login<br>";
		//echo $query;
		$_SESSION['sucess'] = "false";
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
	$query_user = "DELETE FROM user WHERE cliente_id = ".$_POST["userid"];
	$query_cliente = "DELETE FROM cliente WHERE id = ".$_POST["userid"];
	$query_user_run = mysqli_query($connection, $query_user);
	$query_cliente_run = mysqli_query($connection, $query_cliente);
	
	$_SESSION['sucess'] = "true";
	$_SESSION['status'] = "Usuário excluído com sucesso";
	//echo $_POST["userid"];
	header('Location:clientes');
}
?>
