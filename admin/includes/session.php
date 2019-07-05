<?php
$url_atual = "$_SERVER[REQUEST_URI]";
//"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if( isset($_SESSION['status']) ){
	//sessão iniciada
		if($url_atual == "/admin/login"){
		//redireciona para pg clientes
		header('Location:clientes');	
		}else{
		echo $url_atual;
			//logado
}
	
}elseif($url_atual != "/admin/login"){
	//sessão não iniciada, redireciona para pg de login
	header('Location:login');
}else{
	//
}
?>