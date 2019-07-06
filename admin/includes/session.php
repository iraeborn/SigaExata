<?php
$url_atual = "$_SERVER[REQUEST_URI]";
//"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if( isset($_SESSION['sucess']) ){
	
	//sessão iniciada
	if($_SESSION['sucess'] == 'true'){
		
		if($url_atual == "/admin/login"){
			//redireciona para pg clientes
			header('Location:clientes');	
		}else{
			//logado
			//echo "1";
		}
		
	}else{
			echo "2";	
	}
	
}else{
	//não logado
	//echo "Session 'sucess' não definida!";
}
?>