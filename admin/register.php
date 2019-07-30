<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php include 'includes/meta.php'; ?>

  <title>SigaExata - Registrar novo usuário</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
	<script async="" src="js/suport.js"></script>

		 <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
		<script src="js/up/jquery-1.10.2.min.js"></script>
		<script src="js/up/bootstrap.min.js"></script>
		<script src="js/up/jquery.form.js"></script>
	
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crie sua conta!</h1>
              </div>
              <form id="registercliente" class="user" action="code.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nome"  name="nome" placeholder="Nome">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="sobrenome"  name="sobrenome" placeholder="Sobrenome">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email"  name="email" placeholder="Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password"  name="password" placeholder="Senha">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword" placeholder="Confirma Senha">
                  </div>
                </div>

			<input type="hidden" name="registerbtn" value="registro">

				<div class="form-group row">
                  <div class="col-sm-12">  
<div id="targetLayer" style="display:none;"></div>
                  </div>
                </div>
			</form>
				  <!-- IMAGEM / submit button-->
				<div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <button class="btn btn-primary btn-circle" data-toggle="modal" data-target="#upavatar">
						<i class="fas fa-upload"></i>
					</button>
                  </div>
                  <div class="col-sm-10">
                    <button class="btn btn-primary btn-user btn-block" type="submit" onClick="enviaform('registercliente');">Registrar</button>
                  </div>
                </div>

              <div class="text-center">
				  
                <a class="small" href="forgot-password.html">Esqueceu a senha?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Já possui uma conta? Faça o login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

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
	
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<script>
$(document).ready(function(){
	$('#uploadImage').submit(function(event){
		if($('#uploadFile').val())
		{
			event.preventDefault();
			$('#loader-icon').show();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({
				target: '#targetLayer',
				beforeSubmit:function(){
					$('.progress-bar').width('50%');
				},
				uploadProgress: function(event, position, total, percentageComplete)
				{
					$('.progress-bar').animate({
						width: percentageComplete + '%'
					}, {
						duration: 1000
					});
				},
				success:function(){
					
					$('#loader-icon').hide();
					$('#targetLayer').show();
				},
				resetForm: true
			});
		}
		return false;
	});
});
</script>
