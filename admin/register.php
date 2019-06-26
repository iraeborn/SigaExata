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

?>
