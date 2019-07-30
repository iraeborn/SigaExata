<?php
session_start();
include 'includes/session.php';
include 'conn.php';


if (isset($_POST["updatebtn"])) {
	
	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$cnpj = $_POST["cnpj"];
	$situacao = $_POST["situacao"];
	$razaosocial = $_POST["razaosocial"];
	$nomefantasia = $_POST["nomefantasia"];
	$setor = $_POST["setor"];
	$site = $_POST["site"];
	$endereco = $_POST["endereco"];
	$complemento = $_POST["complemento"];
	$cidade = $_POST["cidade"];
	$bairro = $_POST["bairro"];
	$uf = $_POST["uf"];
	$cep = $_POST["cep"];
	$mapa = "";//$_POST["mapa"];
	$telefone1 = $_POST["telefone1"];
	$telefone2 = $_POST["telefone2"];
	$email1 = $_POST["email1"];
	$email2 = $_POST["email2"];
	$pub = "";//$_POST["pub"];
	$sigla = "";//$_POST["sigla"];
	$nr = "";
	
		//echo "<br>updatebtn definido";
		$query = "UPDATE `cliente` SET `nome`='".$nome."',`sobrenome`='".$sobrenome."',`cnpj`='".$cnpj."',`situacao`='".$situacao."',`razaosocial`='".$razaosocial."',`nomefantasia`='".$nomefantasia."',`setor`='".$setor."',`site`='".$site."',`endereco`='".$endereco."',`complemento`='".$complemento."',`cidade`='".$cidade."',`bairro`='".$bairro."',`uf`='".$uf."',`cep`='".$cep."',`mapa`='".$mapa."',`nr`='".$nr."',`telefone1`='".$telefone1."',`telefone2`='".$telefone2."',`email1`='".$email1."',`email2`='".$email2."',`pub`='".$pub."',`sigla`='".$sigla."' WHERE id = ".$id;
			
		$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		//echo $query;
		echo header('Location:clientes');
	}else{
	//erro
		//echo $query;
	}
			
		
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Perfil Cliente</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<!-- Sidebar Menu-->
  <?php include 'includes/sidebar-menu.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
		  <?php include 'includes/topbar.php'; ?>
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Complete o seu Perfil</h1>
          <p class="mb-4">....</p>

			<?php
if(isset($_POST["registerbtn"]) && $_POST["registerbtn"] == "editarcliente"){
	
$userid = $_POST["userid"];
	
	$query = "SELECT
   cliente.*,
   user.*
FROM
   cliente
INNER JOIN
   user ON user.cliente_id = cliente.id
WHERE
   cliente.id = ".$userid;
	
	$query_run = mysqli_query($connection, $query);
	
	if($query_run){
		echo "sucesso";
		echo "<br>mysqli_num_rows: ".mysqli_num_rows($query_run);
		echo "<br>user_id: ".$userid; 
	}else{
	//erro
		echo $query;
	}
	
	
if(mysqli_num_rows($query_run) > 0){
	
while($row = mysqli_fetch_assoc($query_run)){
			?>
			
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>
            </div>
            <div class="card-body">
              <form class="user" action="perfil" method="post">
				  <input type="hidden" id="id" name="id" value="<?php echo $userid ?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nome"  name="nome" placeholder="Nome" value="<?php echo $row['nome']; ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="sobrenome"  name="sobrenome" placeholder="Sobrenome" value="<?php echo $row['sobrenome']; ?>">
                  </div>
                </div>
				  
                <div class="form-group">
<input type="email" class="form-control form-control-user" id="email"  name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
				  </div>
				  
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password"  name="password" placeholder="Senha" value="<?php echo $row['senha']; ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="Confirma Senha" value="<?php echo $row['senha']; ?>">
                  </div>
                </div>
				  <!-- CNPJ --> <!-- NOME FANTASIA -->
				  <div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<input type="text" class="form-control form-control-user" id="cnpj"  name="cnpj" placeholder="CNPJ" value="<?php echo $row['cnpj']; ?>">
					  </div>
                  <div class="col-sm-6">
					<input type="text" class="form-control form-control-user" id="nomefantasia"  name="nomefantasia" placeholder="Nome Fantasia" value="<?php echo $row['nomefantasia']; ?>">
					  </div>
                </div>
				  
				  <!-- razaosocial --> <!-- situacao -->
					<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<input type="text" class="form-control form-control-user" id="razaosocial"  name="razaosocial" placeholder="Razão Social" value="<?php echo $row['razaosocial']; ?>">
					  </div>
                  <div class="col-sm-6">
					<input type="text" class="form-control form-control-user" id="situacao"  name="situacao" placeholder="Situação" value="<?php echo $row['situacao']; ?>">
					  </div>
                	</div>
				  
				  <!-- setor --> <!-- site  -->
					<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<input type="text" class="form-control form-control-user" id="setor"  name="setor" placeholder="Setor" value="<?php echo $row['setor']; ?>">
					  </div>
                  <div class="col-sm-6">
					<input type="text" class="form-control form-control-user" id="site"  name="site" placeholder="Website" value="<?php echo $row['site']; ?>">
					  </div>
                	</div>
				  
				  <!-- endereco --> <!-- cidade -->
					<div class="form-group row">
					  
					  <div class="col-sm-8 mb-3">
                  	<input type="text" class="form-control form-control-user" id="endereco"  name="endereco" placeholder="Endereço" value="<?php echo $row['endereco']; ?>">
					  </div>
                  <div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="cidade"  name="cidade" placeholder="Cidade" value="<?php echo $row['cidade']; ?>">
					  </div>
                	</div>
				  
				  <!-- bairro --> <!-- uf --> <!-- cep -->
					<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3">
                  	<input type="text" class="form-control form-control-user" id="bairro"  name="bairro" placeholder="Bairro" value="<?php echo $row['bairro']; ?>">
					  </div>
						
                  <div class="col-sm-2 mb-3">
					<input type="text" class="form-control form-control-user" id="uf"  name="uf" placeholder="Estado" value="<?php echo $row['uf']; ?>">
					  </div>
						
						<div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="cep"  name="cep" placeholder="CEP" value="<?php echo $row['cep']; ?>">
					  </div>
						
                	</div>
				  
				  <!-- Complemento -->
				 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="complemento"  name="complemento" placeholder="Complemento" value="<?php echo $row['complemento']; ?>">
                </div>
				  
				  <!-- Telefone 1 --> <!-- Telefone 2 -->
					<div class="form-group row">
					  
					  <div class="col-sm-8 mb-3">
                  	<input type="text" class="form-control form-control-user" id="telefone1"  name="telefone1" placeholder="Telefone 1" value="<?php echo $row['telefone1']; ?>">
					  </div>
                  <div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="telefone2"  name="telefone2" placeholder="Telefone 2" value="<?php echo $row['telefone2']; ?>">
					  </div>
                	</div>
				  
				  <!-- Email 1 --> <!-- Email 2 -->
					<div class="form-group row">
					  
					  <div class="col-sm-8 mb-3">
                  	<input type="text" class="form-control form-control-user" id="email1"  name="email1" placeholder="Email 1" value="<?php echo $row['email1']; ?>">
					  </div>
                  <div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="email2"  name="email2" placeholder="Email 2" value="<?php echo $row['email2']; ?>">
					  </div>
                	</div>
				  
               <input class="btn btn-primary btn-user btn-block" type="submit" name="updatebtn" id="updatebtn" value="CONCLUIR">

				  
				  
              </form>
            </div>
          </div>
<?php
}
}else{
echo "Nenhum registro encontrado";
}
}else{
	
//## START SQL
$stusercli = $connection->prepare('SELECT
   cliente.*,
   user.*
FROM
   cliente
INNER JOIN
   user ON user.id = cliente.userid
WHERE
   cliente.userid = ?');
	
$userid = $_GET['id'];
					  // s = string, i = int, b = blob, etc
$stusercli->bind_param('i', $userid); 
$stusercli->execute();
$stusercli->store_result();
			

if ($stusercli->num_rows > 0) {
	$stusercli->bind_result($bairro, $cep, $cidade, $cnpj, $complemento, $email1, $email2, $endereco, $id, $mapa, $nome, $nomefantasia, $nr, $pub, $razaosocial, $setor, $sigla, $site, $situacao, $sobrenome, $telefone1, $telefone2, $uf, $userid, $id, $username, $email, $senha, $datacadastro, $ultimoacesso, $tipo, $status, $avatar);

			while ($stusercli->fetch()) {
//## END SQL
	
?>
		
<div class="container">
  <div class="row">
    <div class="col-sm">
<ul class="list-group">
	  <li class="list-group-item active">
	Dados Pessoais
	</li>
  <li class="list-group-item">
	<i>id:</i><br><?php echo $userid ?>
	</li>
  <li class="list-group-item">
	<i>Nome:</i><br><?php echo $nome; ?>
	</li>
  <li class="list-group-item">
	<i>Sobrenome: </i><br><?php echo $sobrenome; ?>
	</li>
  <li class="list-group-item">
	  <i>Email: </i><br><?php echo $email; ?>
	</li>
  <li class="list-group-item">
	<i>Senha: </i><br><?php echo $senha; ?>
	</li>
</ul><br>
    </div>
	  
    <div class="col-sm">
      <ul class="list-group">
	<li class="list-group-item active">
	Dados Empresariais
	</li>
	  <li class="list-group-item">
	<i>CNPJ: </i><br><?php echo $cnpj; ?>
	</li>
	  <li class="list-group-item">
	<i>Nome Fantasia: </i><br><?php echo $nomefantasia; ?>
	</li>
	  <li class="list-group-item">
	<i>Razão Social: </i><br><?php echo $razaosocial; ?>
	</li>
	  <li class="list-group-item">
	<i>Situação: </i><br><?php echo $situacao; ?>
	</li>
	<li class="list-group-item">
	<i>Setor: </i><br><?php echo $setor; ?>
	</li>
	<li class="list-group-item">
	<i>Website: </i><br><?php echo $site; ?>
	</li>
</ul><br>
    </div>
    <div class="col-sm">
      <ul class="list-group">
	<li class="list-group-item active">
	Endereço
	</li>
  <li class="list-group-item">
	<i>Logradouro: </i><br><?php echo $endereco; ?>
	</li>
	<li class="list-group-item">
	<i>Cidade: </i><br><?php echo $cidade; ?>
	</li>
	<li class="list-group-item">
	<i>Bairro: </i><br><?php echo $bairro; ?>
	</li>
	<li class="list-group-item">
	<i>Estado: </i><br><?php echo $uf; ?>
	</li>
	<li class="list-group-item">
	<i>CEP: </i><br><?php echo $cep; ?>
	</li>
	<li class="list-group-item">
	<i>Complemento: </i><br><?php echo $complemento; ?>
	</li>
	<li class="list-group-item">
	<i>Telefone 1: </i><br><?php echo $telefone1; ?>
	</li>
	<li class="list-group-item">
	<i>Telefone 2: </i><br><?php echo $telefone2; ?>
	</li>
	<li class="list-group-item">
	<i>Email 1: </i><br><?php echo $email1; ?>
	</li>
	<li class="list-group-item">
	<i>Email 2: </i><br><?php echo $email2; ?>
	</li>
</ul><br>
    </div>
  </div>
</div>
			
<?php
}}}
?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
		<?php include 'includes/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include 'includes/logout.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
