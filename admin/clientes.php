<?php
session_start();
include 'includes/session.php';
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Clientes</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
	<script async="" src="js/suport.js"></script>
	
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
          <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
          <p class="mb-4">
			  
		  
			</p>

          <!-- DataTales Example -->


          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registros</h6>
				
<p>
<input type="checkbox" name="username" checked="checked"> username 
<input type="checkbox" name="id"> id
<input type="checkbox" name="datacadastro" checked="checked"> datacadastro
<input type="checkbox" name="email"> email
<input type="checkbox" name="senha"> senha
<input type="checkbox" name="status"> status
<input type="checkbox" name="tipo"> tipo
</p>
				
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					<th class="username">username</th>
					<th class="id">id</th>
					<th class="datacadastro">datacadastro</th>
					<th class="email">email</th>
					<th class="senha">senha</th>
					<th class="status">status</th>
					<th class="tipo">tipo</th>
					<th>-</th>
					<th>-</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
//## START SQL
$stusercli = $connection->prepare('SELECT * FROM  user WHERE tipo = ?');
$stipo = "1";//nível 1 = cliente
					  // s = string, i = int, b = blob, etc
$stusercli->bind_param('i', $stipo); 
$stusercli->execute();
$stusercli->store_result();
			
			if ($stusercli->num_rows > 0) {
	$stusercli->bind_result($id, $username, $email, $senha, $datacadastro, $ultimoacesso, $tipo, $status, $avatar);

			while ($stusercli->fetch()) {
//## END SQL
			
?>
					<tr>
					<td class="username"><a href="perfil.php?id=<?php echo $id; ?>"><?php echo $username; ?></a></td>                  
					<td class="id"><?php echo $id; ?></td>
					<td class="datacadastro"><?php echo $datacadastro; ?></td>
					<td class="email"><?php echo $email; ?></td>
					<td class="senha"><?php echo $senha; ?></td>
					<td class="status"><?php echo $status; ?></td>
					<td class="tipo"><?php echo $tipo; ?></td>

						<td>
							<button class="btn btn-info btn-circle" data-toggle="modal" data-target="#cli" onClick="carregacliente('<?php echo $id; ?>','<?php echo $email; ?>','edit');">
								<i class="fas fa-info-circle"></i>
							</button>
						</td>
							

<td>
	<button class="btn btn-danger btn-circle" data-toggle="modal" data-target="#cli" onClick="carregacliente('<?php echo $id; ?>','<?php echo $email; ?>','del');">
	<i class="fas fa-trash"></i>
	</button>
</td>

						
                    </tr>
				  

					  
<?php
}
				
		}
?>
                  </tbody>
                </table>
				  
				  <a href="novo-cliente" class="btn btn-square btn-primary">Novo Cliente</a>
              </div>
            </div>
          </div>
			
<!-- Modal  -->
<div class="modal fade" id="cli" tabindex="-1" role="dialog" aria-labelledby="cli" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		
		<form id="modalform" class="user" action="" name="modalform" method="post">
			
      <div class="modal-body">
		  <!--FORM -->
		<p id="userMsg"></p>
		<input type="hidden" id="registerbtn" name="registerbtn" value="">
		<input type="hidden" id="userid" name="userid" value="">
		
		  <!--END FORM -->
      </div>
			
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancela</button>
        <input type="submit" name="submit" class="btn btn-primary" id="submit" value="">
      </div>
			
		</form>
		
    </div>
  </div>
</div>
<!-- End Modal  -->
			
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

    <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
