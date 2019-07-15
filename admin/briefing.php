<?php
session_start();
include 'includes/session.php';
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Briefing</title>

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
          <h1 class="h3 mb-2 text-gray-800">Briefing</h1>
          <p class="mb-4">
			  
<!--Alert session-->
<?php include 'includes/alerts-session.php'; ?>
			  
			</p>

          <!-- DataTales Example -->

<?php
$query = "SELECT * FROM  briefing";
$query_run = mysqli_query($connection, $query);
?>
          <div class="card shadow mb-4">
			  
            <div class="card-header py-3">
				
				
              <h6 class="m-0 font-weight-bold text-primary">Campanhas</h6>
				
				<p>
<input type="checkbox" name="id"> id 
<input type="checkbox" name="keywords"> keywords
<input type="checkbox" name="start" checked="checked"> start
<input type="checkbox" name="end" checked="checked"> end
<input type="checkbox" name="mecanica"> mecanica
<input type="checkbox" name="sorteio"> sorteio
<input type="checkbox" name="sorteio_data" checked="checked"> sorteio_data
<input type="checkbox" name="pergunta_cupom"> pergunta_cupom
<input type="checkbox" name="material"> material
<input type="checkbox" name="num_particip"> num_particip
<input type="checkbox" name="obs"> obs
<input type="checkbox" name="cliente_id"> cliente_id
</p>
				
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					<th class="id">id</th>
					<th class="keywords">keywords</th>
					<th class="start">start</th>
					<th class="end">end</th>
					<th class="mecanica">mecanica</th>
					<th class="sorteio">sorteio</th>
					<th class="sorteio_data">sorteio_data</th>
					<th class="pergunta_cupom">pergunta_cupom</th>
					<th class="material">material</th>
					<th class="num_particip">num_particip</th>
					<th class="obs">obs</th>
					<th class="cliente_id">cliente_id</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
if(mysqli_num_rows($query_run) > 0){
	
while($row = mysqli_fetch_assoc($query_run)){
?>
					<tr>
					<td class="id"><a href="perfil.php?id=<?php echo $row['id']; ?>"><?php echo $row['username']; ?></a></td>                  
					<td class="keywords"><?php echo $row['keywords']; ?></td>
					<td class="start"><?php echo $row['start']; ?></td>
					<td class="end"><?php echo $row['end']; ?></td>
					<td class="mecanica"><?php echo $row['mecanica']; ?></td>
					<td class="sorteio"><?php echo $row['sorteio']; ?></td>
					<td class="sorteio_data"><?php echo $row['sorteio_data']; ?></td>
					<td class="pergunta_cupom"><?php echo $row['pergunta_cupom']; ?></td>
					<td class="material"><?php echo $row['material']; ?></td>
					<td class="num_particip"><?php echo $row['num_particip']; ?></td>
					<td class="obs"><?php echo $row['obs']; ?></td>
					<td class="cliente_id"><?php echo $row['cliente_id']; ?></td>
                    </tr>		  
<?php
}
}else{
echo "Nenhum registro encontrado";
}
?>
                  </tbody>
					
                </table>
				  <a href="novo-briefing" class="btn btn-square btn-primary">Novo Briefing</a>
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
