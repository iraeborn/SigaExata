<?php
session_start();
include 'conn.php';

if ( mysqli_connect_errno() ) {
	// Se houver um erro com a conexão, pare o script e exiba o erro.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//Agora vamos verificar se os dados do formulário de login foram enviados, isset () irá verificar se os dados existem.
if ( !isset($_POST['email'], $_POST['senha']) ) {
	// Could not get the data that should have been sent.
	//die ('Por favor, preencha o campo email e senha!');
	$_SESSION['status'] = "Por favor, preencha o campo email e senha!";
	header('Location:login');
	die();
}

// Prepare o nosso SQL, preparando a instrução SQL irá impedir a injeção de SQL.
if ($stmt = $connection->prepare('SELECT id, senha, email, tipo FROM user WHERE email = ?')) {
	//s = string, i = int, b = blob, etc
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Armazene o resultado para que possamos verificar se a conta existe no banco de dados.
	$stmt->store_result();
}

$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $senha, $email, $tipo);
	$stmt->fetch();
	// Conta existe, agora verificamos a senha.
	// Nota: lembre-se de usar password_hash no arquivo de registro para armazenar as senhas com hash.
	if (password_verify($_POST['senha'], $senha)) {
		// Sucesso de verificação! Usuário fez o login!
		// Crie sessões para sabermos que o usuário está logado, elas basicamente agem como cookies, mas lembram-se dos dados no servidor.
		session_regenerate_id();
		$_SESSION['status'] = "login ok";
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['email'];
		$_SESSION['id'] = $id;
		$_SESSION['tipo'] = $tipo;
		
// #### seleciona imagem do perfil do usuario

if ($stav = $connection->prepare('SELECT avatar FROM user WHERE email = ?')) {
	// s = string, i = int, b = blob, etc
	$stav->bind_param('s', $_POST['email']);
	$stav->execute();
	// Armazene o resultado
	$stav->store_result();
	
}
		if ($stav->num_rows > 0) {
	$stav->bind_result($avatar);
	$stav->fetch();
			$_SESSION['avatar'] = $avatar;
		}
// #### END seleciona imagem do perfil do usuario
		
//## ATUALIZA DB USER ultimoacesso
date_default_timezone_set('UTC');
$today = date('d-m-Y H:i:s');
$stupdate = $connection->prepare('UPDATE user SET ultimoacesso = ? WHERE id = ?');
// s = string, i = int, b = blob, etc
$stupdate->bind_param('si', $today, $id);
$stupdate->execute();
//## END ATUALIZA DB USER ultimoacesso
		
		//echo 'Bem vindo ' . $_SESSION['name'] . '!';
		header('Location:index');
		die();
	} else {
		$_SESSION['status'] = "Senha inválida";
		header('Location:login');
		die();
	}
} else {
		$_SESSION['status'] = "Usuário inválido";
		header('Location:login');
		die();
}
$stmt->close();
?>