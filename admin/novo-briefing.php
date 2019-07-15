<?php
session_start();
include 'includes/session.php';
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Novo Briefing</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <!--script src="vendor/jquery/jquery.min.js"></script *-->
	<!-- Using jQuery with a CDN -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<!--script src="//code.jquery.com/jquery-1.12.4.js"></script-->
  	<!--script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
	<script src="js/jquery.easy-autocomplete.min.js"></script>
	

	
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
          <h1 class="h3 mb-2 text-gray-800">Novo Briefing</h1>
          <p class="mb-4">....</p>

          <!-- DataTales Example -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cliente</h6>
            </div>
            <div class="card-body">
              <form class="user" action="code.php" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nome"  name="nome" placeholder="Nome">
                  </div>
					
					
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="sobrenome"  name="sobrenome" placeholder="Sobrenome">
                  </div>
                </div>
				  
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email1"  name="email1" placeholder="Email">
                </div>
				  
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password"  name="password" placeholder="Senha">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="Confirma Senha">
                  </div>
                </div>
				  <!-- CNPJ --> <!-- NOME FANTASIA -->
				  <div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<input type="text" class="form-control form-control-user" id="cnpj"  name="cnpj" placeholder="CNPJ">
					  </div>
                  <div class="col-sm-6">
					<input type="text" class="form-control form-control-user" id="nome_fantasia"  name="nome_fantasia" placeholder="Nome Fantasia">
					  </div>
                </div>
				  
				  <!-- razaosocial --> <!-- responsavel -->
					<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3 mb-sm-0">
                  	<input type="text" class="form-control form-control-user" id="razaosocial"  name="razaosocial" placeholder="Razão Social">
					  </div>
                  <div class="col-sm-6">
					<input type="text" class="form-control form-control-user" id="responsavel"  name="responsavel" placeholder="Nome Responsável">
					  </div>
                	</div>
				  
				  <!-- endereco --> <!-- cidade -->
					<div class="form-group row">
					  
					  <div class="col-sm-8 mb-3">
                  	<input type="text" class="form-control form-control-user" id="endereco"  name="endereco" placeholder="Endereço">
					  </div>
                  <div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="cidade"  name="cidade" placeholder="Cidade">
					  </div>
                	</div>
				  
				  <!-- bairro --> <!-- uf --> <!-- cep -->
					<div class="form-group row">
					  
					  <div class="col-sm-6 mb-3">
                  	<input type="text" class="form-control form-control-user" id="bairro"  name="bairro" placeholder="Bairro">
					  </div>
						
                  <div class="col-sm-2 mb-3">
					<input type="text" class="form-control form-control-user" id="uf"  name="uf" placeholder="Estado">
					  </div>
						
						<div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="cep"  name="cep" placeholder="CEP">
					  </div>
						
                	</div>
				  
				  <!-- Complemento -->
				 <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="complemento"  name="complemento" placeholder="Complemento">
                </div>
				  
				  <!-- Telefone 1 --> <!-- Telefone 2 -->
					<div class="form-group row">
					  
					  <div class="col-sm-8 mb-3">
                  	<input type="text" class="form-control form-control-user" id="tel1"  name="tel1" placeholder="Telefone 1">
					  </div>
                  <div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="tel2"  name="tel2" placeholder="Telefone 2">
					  </div>
                	</div>
				  
				  <!-- Email 1 --> <!-- Email 2 -->
					<div class="form-group row">
					  
					  <div class="col-sm-8 mb-3">
                  	<input type="text" class="form-control form-control-user" id="email1"  name="email1" placeholder="Email 1">
					  </div>
                  <div class="col-sm-4">
					<input type="text" class="form-control form-control-user" id="email2"  name="email2" placeholder="Email 2">
					  </div>
                	</div>
				  
               <button class="btn btn-primary btn-user btn-block" type="submit" name="registerbtn">Registrar</button>

				  
				  
              </form>
            </div>
          </div>

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

		<script>

var empresas = {
	url: "includes/empresas.json",
	//listLocation: "nome",
	getValue: "nome",
	list: {
		match: {
			enabled: true
		},
		onClickEvent: function() {
			//alert("JSON na fita !");
		},
		onSelectItemEvent: function() {
			var dataempresa = $("#nome").getSelectedItemData();

			$("#sobrenome").val( dataempresa.sobrenome ).trigger("change");
			$("#email1").val( dataempresa.email1 ).trigger("change");
			$("#cnpj").val( dataempresa.cnpj ).trigger("change");
			
			$("#nome_fantasia").val( dataempresa.nomefantasia ).trigger("change");
			$("#razaosocial").val( dataempresa.razaosocial ).trigger("change");
			$("#endereco").val( dataempresa.endereco ).trigger("change");
			$("#cidade").val( dataempresa.cidade ).trigger("change");
			$("#bairro").val( dataempresa.bairro ).trigger("change");
			
			$("#uf").val( dataempresa.uf ).trigger("change");
			$("#cep").val( dataempresa.cep ).trigger("change");
			$("#complemento").val( dataempresa.complemento ).trigger("change");
			$("#tel1").val( dataempresa.tel1 ).trigger("change");
			$("#tel2").val( dataempresa.tel2 ).trigger("change");
			$("#email1").val( dataempresa.email1 ).trigger("change");
			$("#email2").val( dataempresa.email2 ).trigger("change");
		}
	}
};

$("#nome").easyAutocomplete(empresas);

</script>
	
</body>

</html>
