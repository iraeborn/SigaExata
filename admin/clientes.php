<?php
session_start();
include 'includes/session.php';
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SigaExata - Clientes</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
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
			  
<!--Alert session-->
<?php include 'includes/alerts-session.php'; ?>
			  
			</p>

          <!-- DataTales Example -->

<?php
$query = "SELECT * FROM  user";
$query_run = mysqli_query($connection, $query);
?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registros</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					<th>username</th>
					<th>cliente_id</th>
					<th>datacadastro</th>
					<th>email</th>
					<th>senha</th>
					<th>status</th>
					<th>tipo</th>
					<td>-</td>
					<td>-</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
if(mysqli_num_rows($query_run) > 0){
	
while($row = mysqli_fetch_assoc($query_run)){
?>
					<tr>
					<td><?php echo $row['username']; ?></td>                  
					<td><?php echo $row['cliente_id']; ?></td>
					<td><?php echo $row['datacadastro']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['senha']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><?php echo $row['tipo']; ?></td>

						<td>
							<button class="btn btn-info btn-circle" data-toggle="modal" data-target="#cli" onClick="carregacliente('<?php echo $row['cliente_id']; ?>','<?php echo $row['email']; ?>','edit');">
								<i class="fas fa-info-circle"></i>
							</button>
						</td>
							

<td>
	<button class="btn btn-danger btn-circle" data-toggle="modal" data-target="#cli" onClick="carregacliente('<?php echo $row['cliente_id']; ?>','<?php echo $row['email']; ?>','del');">
	<i class="fas fa-trash"></i>
	</button>
</td>

						
                    </tr>
				  

					  
<?php
}
}else{
echo "Nenhum registro encontrado";
}
?>
                  </tbody>
                </table>
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
