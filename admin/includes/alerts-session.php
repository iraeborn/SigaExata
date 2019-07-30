<?php
echo "<div class='d-flex flex-row justify-content-center'>";
//SUCCESS
if(isset($_SESSION['sucess']) && $_SESSION['sucess'] !=''){
	echo "<div class='p-2 border border-primary'>";
	echo "sucess: ".$_SESSION['sucess'];
	echo "</div>";
//unset($_SESSION['success']);
}
//STATUS
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
	echo "<div class='p-2 border border-primary'>";
	echo "status: ".$_SESSION['status'];
	echo "</div>";
//unset($_SESSION['status']);
}

//SOBRENOME
if(isset($_SESSION['sobrenome'])){
	echo "<div class='p-2 border border-primary'>";
	echo "nome, sobrenome: ".$_SESSION['sobrenome'];
	echo "</div>";
}
	
if(isset($_SESSION['userid'])){
	echo "<div class='p-2 border border-primary'>";
	echo "user_id: ".$_SESSION['userid'];
	echo "</div>";
}
//URL
if(isset($url_atual) && $url_atual !=''){
	echo "<div class='p-2 border border-primary'>";
	echo "url: ".$url_atual;
	echo "</div>";
//unset($_SESSION['status']);
}

if(isset($_SESSION['tipo'])){
	echo "<div class='p-2 border border-primary'>";
	echo "tipo de usuario: ".$_SESSION['tipo'];
	echo "</div>";
}
echo "</div>";
?>