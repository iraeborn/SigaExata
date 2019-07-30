<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-text mx-3">SigaExata</div>
</a>


<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Painel</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  MENU
</div>

	<?php
	if($_SESSION['tipo'] == '0'){
	?>
	
<!-- Nav Item - Sistema -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSistema" aria-expanded="true" aria-controls="collapseSistema">
    <i class="fas fa-fw fa-cogs"></i>
    <span>Sistema</span>
  </a>
  <div id="collapseSistema" class="collapse" aria-labelledby="headingSistema" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="usuarios">Usuários</a>
	<a class="collapse-item" href="config">Configurações Globais</a>
    </div>
  </div>
</li>
	
	<?php
	}
	?>

	<?php
	if($_SESSION['tipo'] == '0' || $_SESSION['tipo'] == '2'){
	?>
<!-- Nav Item - Comercial -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClientes" aria-expanded="true" aria-controls="collapseClientes">
    <i class="fas fa-fw fa-users"></i>
    <span>Comercial</span>
  </a>
  <div id="collapseClientes" class="collapse" aria-labelledby="headingClientes" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="clientes">Clientes</a>
		<a class="collapse-item" href="briefing">Briefing</a>
		<a class="collapse-item" href="clientes">Simulador</a>
    </div>
  </div>
</li>
	
	<?php
	}
	?>

	<?php
	if($_SESSION['tipo'] == '0' || $_SESSION['tipo'] == '3'){
	?>
<!-- Nav Item - Marketing -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMarketing" aria-expanded="true" aria-controls="collapseMarketing">
    <i class="fas fa-fw fa-user-tie"></i>
    <span>Marketing</span>
  </a>
  <div id="collapseMarketing" class="collapse" aria-labelledby="headingMarketing" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="#">key-visual</a>
      <a class="collapse-item" href="#">Peças</a>
    </div>
  </div>
</li>
	<?php
	}
	?>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
	<?php
	if($_SESSION['tipo'] == '0' || $_SESSION['tipo'] == '5'){
	?>
<!-- Nav Item - Jurídico -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJuridico" aria-expanded="true" aria-controls="collapseJuridico">
    <i class="fas fa-fw fa-handshake"></i>
    <span>Jurídico</span>
  </a>
  <div id="collapseJuridico" class="collapse" aria-labelledby="headingJuridico" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="#">Contador</a>
      <a class="collapse-item" href="#">Documentos</a>
    </div>
  </div>
</li>

	<?php
	}
	?>
	
	<?php
	if($_SESSION['tipo'] == '0' || $_SESSION['tipo'] == '4'){
	?>
<!-- Nav Item - TI -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTI" aria-expanded="true" aria-controls="collapseTI">
    <i class="fas fa-fw fa-database"></i>
    <span>TI</span>
  </a>
  <div id="collapseTI" class="collapse" aria-labelledby="headingTI" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="#">Servidor</a>
      <a class="collapse-item" href="#">Banco de dados</a>
		<a class="collapse-item" href="#">Domínio</a>
    </div>
  </div>
</li>
	<?php
	}
	?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->