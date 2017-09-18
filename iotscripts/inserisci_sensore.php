<?php

session_start();
require 'dbconnect.php';
$conn=new mysqli($host, $user, $pwd, $db);
?>

<html style="height: auto; min-height: 100%;"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IotInc | Azienda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="..\width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script type="text/javascript"> 
	//Dichiaro la funzione 
	function azione(variabile,var2) { 
	document.getElementById(variabile).style.display='';
	document.getElementById(var2).style.display='';}
</script>
 <script type="text/javascript"> 
	//Dichiaro la funzione 
	function azione2(variabile) { 
	if(document.getElementById(variabile).style.display=='') { 
		document.getElementById(variabile).style.display='none'; 
}}
</script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
		<div class="logo" style="background-color: #00993a;">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class="logo-mini"><b>I</b>oT</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class="logo-lg"><b>IoT</b> Inc.</span>
		</div>
	
    <!-- Header Navbar -->
		<nav class="navbar navbar-static-top" role="navigation" style="background-color: #00993a;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
		  <li><a href="azienda.php" class="fa fa-home">&emsp;Pagina iniziale<span class="sr-only">(current)</span></a></li>

          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <!-- The user image in the navbar-->
			  <img src="../dist/img/logo.png" class="user-image" alt="User Image">
			  
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Amministratore</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header" style="background-color:#00993a">
				  <img src="../dist/img/logo.png" class="img-circle" alt="User Image">
                <p>
					Amministratore
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout_a.php" class="btn btn-default btn-flat">Esci</a>
                </div>
              </li>
            </ul>
          </li>        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
		  <img src="../dist/img/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Amministratore</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree" data-widget="tree">
		<li class="header"><h4>OPERAZIONI:</h4></li>
		<!-- search form (Optional) -->
		<li>
			<form action="ricerca_cli_cod.php" method="post" class="sidebar-form">
				<div class="input-group">
				  <input type="text" name="cod" class="form-control" placeholder="Codice cliente">
				  <span class="input-group-btn">
					  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					  </button>
					</span>
				</div>
			</form>
		</li>
		<li class="treeview">
		  <a href="#"><i class="fa fa-link"></i> <span>Gestione clienti</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			  </span>
		  </a>
		  <ul class="treeview-menu" style="display: none;">
			<li><a href="inserisci_cliente.php">Inserisci nuovo cliente</a></li>
			<li><a href="modifica_cliente.php">Modifica dati cliente</a></li>
			<li><a href="elimina_cliente.php">Elimina cliente</a></li>
		  </ul>
		</li>
			
			<li class="treeview">
			  <a href="#"><i class="fa fa-link"></i> <span>Gestione sensori</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				  </span>
			  </a>
			  <ul class="treeview-menu" style="display: none;">
				<li><a href="inserisci_sensore.php">Inserisci nuovo sensore</a></li>
				<li><a href="elimina_sensore.php">Elimina sensore</a></li>
			  </ul>
			</li>
			
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 754px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <h1>Inserisci nuovo sensore</h1>
    </section>
	<!-- Main content -->
	<div class="content">
		
		<section class="content">
		
			<div class="box box-info" style="border-top-color:#00993a">
            <div class="box-header with-border">
              <h3 class="box-title">Seleziona un'opzione</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="inserisci_sensore1.php" name="form1" method="post">
              <div class="box-body">
				<div class="form-group">
                  <div class="radio">
					  <label for="cliente" class="col-sm-2 control-label"></label>

					  <div class="col-sm-10">
						<input type="radio" value="nuovo" name="opz" id="cliente" required onclick="azione2('s')">Sensore con nuovo tipo
					  </div>
				  </div>
				  <div class="radio">
					  <label for="cliente" class="col-sm-2 control-label"></label>
					  <div class="col-sm-10">
						<input type="radio" value="esiste" name="opz" id="terzaparte" onclick="azione('s')">Sensore con tipo esistente
						<div style="display:none;" id="s" >Seleziona il sensore dal quale copiare il tipo&emsp;<select name="sensore">
							<?php 
								$stmt=$conn->query("SELECT codSensore, marca,clienteS FROM sensori");
								while($row = $stmt->fetch_assoc()){
									echo "<option value=".$row['codSensore'].">" . $row['codSensore'] . " - " . $row['marca'] . " del cliente num. " . $row['clienteS'] . "</option>";
								}
							?>
						</select>
						</div>
					  </div>
				  </div>
                </div>

				 
			  <!-- /.box-body -->
			  <span>
              <div class="box-footer">
				<button type="reset" class="btn btn-default">Cancella</button>
                <button type="submit" class="btn btn-info pull-right" style="border-color:#00993a; background-color:#00993a">Avanti</button>

              </div></span>
              <!-- /.box-footer -->
            </form>
          </div>
			
		</section>
		
	</div>
	
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2017 <font color="#0087ff">Iot Inc.</font></strong> &nbsp;All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

</body></html>