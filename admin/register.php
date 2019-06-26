<?php
session_start();
?>

<form action="code.php" method="post">
<input type="text" name="user" placeholder="Digite seu Usuário">
<input type="email" name="email" placeholder="Digite seu Email">
<input type="password" name="password" placeholder="Crie sua Senha">
<input type="password" name="confirmpassword" placeholder="Confirme sua Senha">

<button type="submit" name="registerbtn">Salvar</button>
</form>


<?php
//Caso a sessão seja iniciada, exibe mensagem sucess
if(isset($_SESSION['success']) && $_SESSION['success'] !='')
{
echo $_SESSION['success'];
unset($_SESSION['success']);
}

//Caso a sessão seja iniciada, exibe mensagem sucess
if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
echo $_SESSION['status'];
unset($_SESSION['status']);
}

?>


<?php
$connection = mysqli_connect("localhost", "root","","adminpanel");

$query = "SELECT * FROM register";
$query_run = mysqli_query($connection, $query);

?>

<table>
<thead>
<tr>
<th>Id</th>
<th>Usuário</th>
<th>Email</th>
<th>Password</th>
</tr>
</thead>

<?php
if(mysqli_num_rows($query_run) > 0)
{
while($row = mysqli_fetch_assoc($query_run))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['usuario']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['password']; ?></td>
</tr>

<?php
}
}
?>

</table>
