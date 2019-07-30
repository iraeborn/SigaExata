<?php
session_start();
include 'includes/session.php';
include 'conn.php';
?>

<?php
if (isset($_POST["updatebtn"])) {
	// ####
	$id = $_POST["id"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$senha = password_hash( $_POST["password"], PASSWORD_DEFAULT );
	$tipo = $_POST["tipo"];
	$status = $_POST["status"];
	$avatar = $_POST["avatar"];
	
	if($email == $_SESSION['name']){
	$_SESSION['avatar'] = $avatar;
		}
	
	if(isset($senha)){
// Prepare o nosso SQL, preparando a instrução SQL irá impedir a injeção de SQL.
	$stupus = $connection->prepare('UPDATE user SET username =?,email=?,senha=?,tipo =?,status=?,avatar=? WHERE id = ?');
		$stupus->bind_param('sssiisi',  $username, $email, $senha, $tipo, $status, $avatar, $id);
		}else{
	$stupus = $connection->prepare('UPDATE user SET username =?,email=?,tipo =?,status=?,avatar=? WHERE id = ?');
		$stupus->bind_param('ssiisi',  $username, $email, $tipo, $status, $avatar, $id);
	}
	// Parâmetros de ligação (s = string, i = int, b = blob, etc), no nosso caso o nome de usuário é uma string, então usamos "s"
	
	$stupus->execute();

	//header('Location:user?id='.$id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Perfil Usuário</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- 
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/up/jquery-1.10.2.min.js"></script>


	-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/up/jquery.form.js"></script>
		
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
	
	<script src="js/suport.js"></script>
	
	
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
				  <h1 class="h3 mb-2 text-gray-800">Usuário do Sistema</h1>
				  <p class="mb-4">....</p>

		<?php
		if (isset($_GET["id"]) || isset($_POST["id"])) {
			// ####
			if ( isset( $_GET["id"] ) ){
				$getid = $_GET["id"];
			}elseif( isset( $_POST["id"] ) ){
				$getid = $_POST["id"];
			}
			
			
		// Prepare o nosso SQL, preparando a instrução SQL irá impedir a injeção de SQL.
		if ($stus = $connection->prepare('SELECT * FROM user WHERE id = ?')) {
			// Parâmetros de ligação (s = string, i = int, b = blob, etc), no nosso caso o nome de usuário é uma string, então usamos "s"
			$stus->bind_param('i',  $getid);
			$stus->execute();
			// Armazene o resultado
			$stus->store_result();
		}
				if ($stus->num_rows > 0) {

			$stus->bind_result($id, $username, $email, $senha, $datacadastro, $ultimoacesso, $tipo, $status, $avatar);
			$stus->fetch();

			// Faz alguma coisa com a linha.
					?>

					<!-- TABLE 2 coluns-->
					 
				<div>
					
		  <div class="row">
		<div class="col-sm-3 text-center p1">

			<div id="targetLayer" style="display:none;">
			</div>
			
			<div id="targetold">

				<img src="avatar/<?php echo $avatar; ?>" class="img-profile rounded-circle p-3" style="max-width: 100%" data-toggle="popover" data-content="Disabled popover">
				
				
			</div>

			<button class="btn btn-primary btn-circle" data-toggle="modal" data-target="#upavatar">
			<i class="fas fa-upload"></i>
			</button>

		</div>

		<div class="col-sm-9">
			
<form class="user" action="user" method="post" id="upuser">
				  <!-- DataTales Example -->
				  <div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary">Atualize seu Perfil</h6>
					</div>
					<div class="card-body">
					  
						  <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
						<input type="hidden" id="avatar" name="avatar" value="<?php echo $avatar ?>">
				<input type="hidden" id="updatebtn" name="updatebtn" value="updatebtn">

						<div class="form-group">
							<label for="email">E-mail</label>
							<input type="email" class="form-control form-control-user" id="email"  name="email" placeholder="Email" value="<?php echo $email; ?>">
						  </div>

						
						<div class="form-group row" id="pass">
						  <div class="col-sm-6 mb-3 mb-sm-0">
							  <label for="password">Senha</label>
							<input type="password" class="form-control form-control-user" id="password"  name="password" placeholder="Senha" value="<?php echo $row['senha']; ?>">
						  </div>
						  <div class="col-sm-6">
							  <label for="confirmpassword">Confirmação de senha</label>
							<input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="Confirma Senha" value="<?php echo $row['senha']; ?>">
						  </div>
						</div>
						  <!-- CNPJ --> <!-- NOME FANTASIA -->
						  <div class="form-group row">

							  <div class="col-sm-6 mb-3 mb-sm-0">
								  <label for="username">Usuário</label>
							<input type="text" class="form-control form-control-user" id="username"  name="username" placeholder="Usuário" value="<?php echo $username; ?>">
							  </div>
						  <div class="col-sm-6">
							  <label for="ultimoacesso">Último Acesso</label><br>
							  <?php echo $ultimoacesso; ?>

							  </div>
						</div>

						  <!-- razaosocial --> <!-- situacao -->
							<div class="form-group row">

							  <div class="col-sm-6 mb-3 mb-sm-0">

		<?php
		/*
		0 = administrador
		1 = cliente
		2 = Comercial
		3 = Marketing
		4 = Ti
		5 = Jurídico

		*/
switch ($tipo) {
    case 0:
        $usertipo = "administrador";
        break;
    case 1:
        $usertipo = "cliente";
        break;
    case 2:
        $usertipo = "Comercial";
        break;
    case 3:
        $usertipo = "Marketing";
        break;
    case 4:
        $usertipo = "Ti";
        break;
    case 5:
        $usertipo = "Jurídico";
        break;
}
		?>

		<label for="status">Acesso usuário</label>
			
						<?php if($_SESSION['tipo'] == '0'){ ?>		  
			<select class="form-control" id="tipo" name="tipo">
			  <option value="0" <?php if($tipo == '0'){echo "selected";} ?>>Administrador</option>
			  <option value="1" <?php if($tipo == '1'){echo "selected";} ?>>Cliente</option>
				<option value="2" <?php if($tipo == '2'){echo "selected";} ?>>Comercial</option>
				<option value="3" <?php if($tipo == '3'){echo "selected";} ?>>Marketing</option>
				<option value="4" <?php if($tipo == '4'){echo "selected";} ?>>Ti</option>
				<option value="5" <?php if($tipo == '5'){echo "selected";} ?>>Jurídico</option>
			</select>
								  <?php
								  }else{
			echo "<br>".$usertipo;
		}
								  ?>
							  </div>
						  <div class="col-sm-6">
			<label for="status">Status</label>
			<select class="form-control" id="status" name="status">
			  <option value="0" <?php if($status = '0'){echo "selected";} ?>>Inativo</option>
			  <option value="1" <?php if($status = '1'){echo "selected";} ?>>Ativo</option>
			</select>

							  </div>
							</div>
						


</div>
				  </div>
</form>
		</div>
							
		<?php
		// ####
			}
		}
		?>
					  
					

		  </div>

			<button class="btn btn-primary btn-user btn-block" onClick="enviaform('upuser');">Atualizar</button>
				</div>
					 
				<!-- /.container-fluid -->

		<!-- Modal  -->
		<div class="modal fade" id="upavatar" tabindex="-1" role="dialog" aria-labelledby="upavatar" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Envie sua foto de perfil</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>

				<form id="uploadImage" action="upload.php" method="post">

			  <div class="modal-body">
				  <!--FORM -->
				<p id="userMsg">Escolha a imagem</p>
				  <input type="file" class="btn btn-primary"  name="uploadFile" id="uploadFile" accept=".jpg, .png" />
				  <!--END FORM -->
			  </div>

			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancela</button>

				  <input type="submit" id="uploadSubmit" value="Upload"  class="btn btn-primary" />

				  <div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

			  </div>

				</form>
				<div id="loader-icon" style="display:none;"><img src="loader.svg" /></div>
			</div>
		  </div>
		</div>
		<!-- End Modal  -->

			  </div>
    <!-- End of Main Content -->

    <!-- Footer -->
	<?php include 'includes/footer.php'; ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
</div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- Logout Modal-->
<?php include 'includes/logout.php'; ?>
	
	  <!-- jQuery first, then Bootstrap JS. -->
    
    <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>