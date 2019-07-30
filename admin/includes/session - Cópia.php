<?php
/*
0 = administrador
1 = cliente
2 = Comercial
3 = Marketing
4 = Ti
5 = Jurídico
*/
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
				//echo $_SESSION['sucess'];
				//echo "<br>";
				//echo $url_atual;
				if($_SESSION['tipo'] == '0'){
					//if($url_atual != "/admin/index"){header('Location:index');}
				}
				if($_SESSION['tipo'] == '1'){
					//header('Location:cliente');
				}
				if($_SESSION['tipo'] == '2'){
					//header('Location:comercial');
				}
				if($_SESSION['tipo'] == '3'){
					//header('Location:marketing');
				}
				if($_SESSION['tipo'] == '4'){
					//header('Location:ti');
				}
				if($_SESSION['tipo'] == '5'){
					//header('Location:juridico');
				}
				
				if($url_atual == "/admin/"){header('Location:clientes');}
			}
		}else{
				header('Location:login');
		}
}else{
	//echo "2";
}
?>