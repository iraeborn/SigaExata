<?php
session_start();
include 'includes/session.php';
include 'conn.php';
?>

<?php
if (isset($_POST["registerbtn"])){

	#user
	
//id = ;
$username = $_POST["username"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$avatar = $_POST["avatar"];
$datacadastro = $_POST["datacadastro"];
$ultimoacesso = $_POST["ultimoacesso"];
$status = $_POST["status"];
$tipo = $_POST["tipo"];

	#cliente
//id = ;
//userid = ;
//usersisid = ;
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];


$cnpj = $_POST["cnpj"];
$razaosocial = $_POST["razaosocial"];
$nomefantasia = $_POST["nomefantasia"];
$setor = $_POST["setor"];
$sigla = $_POST["sigla"];
$nr = $_POST["nr"];
$pub = $_POST["pub"];
$situacao = $_POST["situacao"];

$site = $_POST["site"];
$email1 = $_POST["email1"];
$telefone1 = $_POST["telefone1"];
	
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$bairro = $_POST["bairro"];
$uf = $_POST["uf"];
$cep = $_POST["cep"];
$complemento = $_POST["complemento"];
$mapa = $_POST["mapa"];

$email2 = $_POST["email2"];
$telefone2 = $_POST["telefone2"];
	
$endereco2 = $_POST["endereco2"];
$cidade2 = $_POST["cidade2"];
$bairro2 = $_POST["bairro2"];
$uf2= $_POST["uf2"];
$cep2 = $_POST["cep2"];
$complemento2 = $_POST["complemento2"];
$mapa2 = $_POST["mapa2"];

//## START SQL
$stusercli = $connection->prepare('INSERT INTO cliente (firstname, lastname, email) VALUES (?, ?, ?)');
$stipo = "1";//nível 1 = cliente
					  // s = string, i = int, b = blob, etc
$stusercli->bind_param('i', $stipo); 
$stusercli->execute();
$stusercli->store_result();
		
//## END SQL

	
	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Novo Cliente</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="js/up/jquery-1.10.2.min.js"></script>
	
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
  <!-- Suport -->
  <script src="js/suport.js"></script>
	 <!-- Suport Endereço -->
  <script src="js/suportendereco.js"></script>

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
          <h1 class="h3 mb-2 text-gray-800">Novo cliente</h1>
          <p class="mb-4">....</p>

          <!-- DataTales Example -->
<form class="user" action="novo-cliente" method="post">
	
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Dados de acesso</h6>
            </div>
            <div class="card-body">
              
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
					  <label for="nome">Nome</label>
                    <input type="text" class="form-control form-control-user" id="nome"  name="nome" placeholder="Nome">
                  </div>
                  <div class="col-sm-6">
					  <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control form-control-user" id="sobrenome"  name="sobrenome" placeholder="Sobrenome">
                  </div>
                </div>
				  
                <div class="form-group">
					<label for="email">E-mail</label>
                  <input type="email" class="form-control form-control-user" id="email"  name="email" placeholder="Email">
                </div>
				  
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
					  <label for="password">Senha</label>
                    <input type="password" class="form-control form-control-user" id="password"  name="password" placeholder="Senha">
                  </div>
                  <div class="col-sm-6">
					  <label for="confirmpassword">Confirma Senha</label>
                    <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="Confirma Senha">
                  </div>
                </div>
				  </div>
				   </div>  
			  
		<div class="card shadow mb-4">
				  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Dados da empresa</h6>
            </div>
			
            <div class="card-body">
				  <!-- CNPJ --> <!-- NOME FANTASIA -->
				  <div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
						  <label for="cnpj">CNPJ</label>
                  	<input type="text" class="form-control form-control-user" id="cnpj"  name="cnpj" placeholder="CNPJ">
					  </div>
                  <div class="col-sm-6">
					  <label for="nome_fantasia">Razão Social</label>
					<input type="text" class="form-control form-control-user" id="razaosocial"  name="razaosocial" placeholder="Razão Social">
					  </div>
                </div>
				
				<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
						  <label for="nomefantasia">Nome Fantasia</label>
                  	<input type="text" class="form-control form-control-user" id="nomefantasia"  name="nomefantasia" placeholder="Nome Fantasia">
					  </div>
                  <div class="col-sm-3">
					  <label for="setor">Setor</label>
					<input type="text" class="form-control form-control-user" id="setor"  name="setor" placeholder="Setor">
				</div>
					<div class="col-sm-3">
					  <label for="sigla">Sigla</label>
					<input type="text" class="form-control form-control-user" id="sigla"  name="sigla" placeholder="Sigla">
				</div>
                </div>
				
				<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
						  <label for="nr">Nr</label>
                  	<input type="text" class="form-control form-control-user" id="nr"  name="nr" placeholder="Nr">
					  </div>
                  <div class="col-sm-3">
					  <label for="pub">Pub</label>
					<input type="text" class="form-control form-control-user" id="pub"  name="pub" placeholder="Pub">
				</div>
					<div class="col-sm-3">
					  <label for="situacao">Situação</label>
					<input type="text" class="form-control form-control-user" id="situacao"  name="situacao" placeholder="Situacao">
				</div>
                </div>
				
				  </div>
				 </div>

	 <!-- Contato -->
	<div class="card shadow mb-4">
				  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Contato empresa</h6>
            </div>
            <div class="card-body">
				
				 
					<div class="form-group row">
					  
					  <div class="col-sm-5 mb-3">
						  <label for="site">Web site</label>
                  	<input type="text" class="form-control form-control-user" id="site"  name="site" placeholder="www.">
					  </div>
                  <div class="col-sm-4">
					  <label for="email1">E-mail</label>
					<input type="text" class="form-control form-control-user" id="email1"  name="email1" placeholder="E-mail">
					  </div>
					<div class="col-sm-3">
					  <label for="telefone1">Telefone</label>
					<input type="text" class="form-control form-control-user" id="telefone1"  name="telefone1" placeholder="Telefone">
					  </div>
                	</div>
				  
				  <!-- Endereço -->
				<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3">
					<label for="endereco">Endereço</label>
                  	<input type="text" class="form-control form-control-user" id="endereco"  name="endereco" placeholder="Endereço">
					  </div>
						
                  <div class="col-sm-3 mb-3">
					   <label for="uf">Estado</label>
					  <select class="form-control" id="uf"  name="uf" placeholder="Estado" style="height: 3rem;font-size: 0.8rem;border-radius: 10rem;">
						</select>
					  </div>
					
					<div class="col-sm-3 mb-3">
					   <label for="cidade">Cidade</label>
					
					  <select id="cidade" class="form-control" id="cidade"  name="cidade" placeholder="Cidade" style="height: 3rem;font-size: 0.8rem;border-radius: 10rem;">
						<option value=""></option>
						</select>
					  </div>
						
                	</div>	
				
				<div class="form-group row">
						
						<div class="col-sm-4">
							 <label for="cep">CEP</label>
					<input type="text" class="form-control form-control-user" id="cep"  name="cep" placeholder="CEP">
					  </div>
						
					<div class="col-sm-8">
					<label for="complemento">Complemento</label>
                  <input type="email" class="form-control form-control-user" id="complemento"  name="complemento" placeholder="Complemento">
					</div>

                	</div>

				</div>
		
				
				  </div>  
		
	
	<div class="card shadow mb-4">
				  <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
				  Dados de Cobrança<br>
				  <input type="checkbox" id="sameadress" checked> Mesmo da empresa
				
			</h6>
            </div>
            <div class="card-body" id="divsameadress">
				
				 
					<div class="form-group row">
					  
                  <div class="col-sm-6">
					  <label for="email2">E-mail cobrança</label>
					<input type="text" class="form-control form-control-user" id="email2"  name="email2" placeholder="E-mail cobrança">
					  </div>
					<div class="col-sm-6">
					  <label for="telefone1">Telefone cobrança</label>
					<input type="text" class="form-control form-control-user" id="telefone2"  name="telefone2" placeholder="Telefone cobrança">
					  </div>
                	</div>
				  
				  <!-- Endereço -->
				<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3">
					<label for="endereco2">Endereço cobrança</label>
                  	<input type="text" class="form-control form-control-user" id="endereco2"  name="endereco2" placeholder="Endereço cobrança">
					  </div>
						
                  <div class="col-sm-2 mb-3">
					   <label for="cidade2">Cidade cobrança</label>
					<input type="text" class="form-control form-control-user" id="cidade2"  name="cidade2" placeholder="Cidade ">
					  </div>
												
                	</div>	
				
				<div class="form-group row">
	
                  <div class="col-sm-2 mb-3">
					   <label for="uf2">Estado cobrança</label>
					<input type="text" class="form-control form-control-user" id="uf2"  name="uf2" placeholder="Estado cobrança">
					  </div>
						
						<div class="col-sm-4">
							 <label for="cep2">CEP cobrança</label>
					<input type="text" class="form-control form-control-user" id="cep2"  name="cep2" placeholder="CEP cobrança">
					  </div>
						
					<div class="col-sm-6">
					<label for="complemento2">Complemento cobrança</label>
                  <input type="email" class="form-control form-control-user" id="complemento2"  name="complemento2" placeholder="Complemento cobrança">
					</div>

                	</div>

				</div>
				  </div>  
	
	<button class="btn btn-primary btn-user btn-block" type="submit" name="registerbtn">Registrar</button>
</form>
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



</body>

</html>
