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
			
		
	}else{
		//echo "<br>updatebtn não definido";
		$ac = $_POST["registerbtn"];
		$userid = $_POST["userid"];
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SigaExata - Perfil Clientes</title>

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
          <h1 class="h3 mb-2 text-gray-800">Perfil</h1>
          <p class="mb-4">....</p>

			<?php
			
if($ac == "editarcliente"){
	
	//teste 2
	//$query = "(SELECT * FROM cliente WHERE cliente_id = ".$userid.") UNION (SELECT * FROM user WHERE id = ".$userid.")";
	
	//teste 1
	//$query = "SELECT cl.id,cl.nome,cl.sobrenome,cl.email1,us.cliente_id,us.email FROM cliente AS cl , user AS us WHERE us.cliente_id = ".$userid." AND cl.id = ".$userid;
	
	//exemplo teste 3
	//$query = "SELECT cl.*, us.* FROM cliente AS cl INNER JOIN user AS us WHERE us.cliente_id =".$userid;
//." AND us.cliente_id =".$userid
	
	//teste 4
	//$query = "SELECT * FROM cliente WHERE id = ".$userid;
	
	//teste5
	$query = "SELECT * FROM cliente 
INNER JOIN user WHERE user.cliente_id = ".$userid;
	
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
              <h6 class="m-0 font-weight-bold text-primary">Form</h6>
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
}
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
