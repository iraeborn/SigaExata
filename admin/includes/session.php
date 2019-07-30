<?php
/*
0 = administrador
1 = cliente
2 = Comercial
3 = Marketing
4 = Ti
5 = Jurídico
*/
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login');
	exit();
}
?>