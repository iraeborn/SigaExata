<?php
$con = mysqli_connect("localhost","root","");
if(!$con)
{
echo "Conexão não estabelecida".mysqli_error($con);
}
$db = mysqli_select_db($con,"sumeet");
if (!$db){
die("Seleção da base de dados falhou" . mysqli_error($con));
}
