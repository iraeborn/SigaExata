<?php
$url_atual = "$_SERVER[REQUEST_URI]";
//"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if( isset($_SESSION['status']) ){
		//logado
		if($url_atual == "/admin/login.php"){
		header('Location:clientes.php');	
		}
	
}elseif($url_atual != "/admin/login.php"){
	header('Location:login.php');	
}
?>