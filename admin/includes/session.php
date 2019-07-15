<?php
$url_atual = "$_SERVER[REQUEST_URI]";
//"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if($url_atual != "/admin/login"){
	
		if( isset($_SESSION['sucess']) ){
			//caso a sessão sucess esteja definida
			if($_SESSION['sucess'] == 'false'){
				//caso a sessão sucess seja verdadeira
				header('Location:login');
			}else{
				//vc está logado
				echo $_SESSION['sucess'];
				echo "<br>";
				echo $url_atual;
				if($url_atual == "/admin/"){header('Location:clientes');}
			}
		}else{
				header('Location:login');
		}
}else{
	echo "2";
}
?>