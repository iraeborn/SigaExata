<?php
$connection = mysqli_connect("localhost", "root","","adminpanel");

if(isset($_POST["registerbtn"])){

&user = $_POST["user"];
&email = $_POST["email"];
&password = $_POST["password"];
&cpassword = $_POST["confirmpassword"];

	if($password === $cpassword){

	$query = "INSERT INTO register (username, email, password) VALUES ('$username', '$email'.'$password')";
	$query_run = mysqli_query($connection, $query);
		if($query_run){
		$SESSION['sucess'] = "Admin Profile Added";
		header['Location:register.php'];
		}else{
		$SESSION['status'] = "Admin Profile NOT Added";
		header['Location:register.php'];		
		}
	}else{
		$SESSION['status'] = "O campo senha não confere";
		header('Location: register.php');
	} //end if is set cpassword

} //end if is set post
?>
