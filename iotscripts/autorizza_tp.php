<?php

session_start();
require 'dbconnect.php';
$conn=new mysqli($host, $user, $pwd, $db);

?>

<html style="height: auto; min-height: 100%;"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IotInc | Utente</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
    <?php if ($_SESSION['tipo_utente']=='c') {echo "
		<div class=\"logo\">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class=\"logo-mini\"><b>I</b>oT</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class=\"logo-lg\"><b>IoT</b> Inc.</span>
		</div>";} elseif ($_SESSION['tipo_utente']=='t'){ echo "
		<div class=\"logo\" style=\"background-color: #f38412;\">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class=\"logo-mini\"><b>I</b>oT</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class=\"logo-lg\"><b>IoT</b> Inc.</span>
		</div>";}
	?>
	
    <!-- Header Navbar -->
    <?php if ($_SESSION['tipo_utente']=='c') {echo "
		<nav class=\"navbar navbar-static-top\" role=\"navigation\">";} elseif ($_SESSION['tipo_utente']=='t') {echo "
		<nav class=\"navbar navbar-static-top\" role=\"navigation\" style=\"background-color: #f38412;\">";}
	?>
      
	  <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">     </a>
	  <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">         
		  <li><a href="utente.php" class="fa fa-home">&emsp;Pagina iniziale<span class="sr-only">(current)</span></a></li>
		  <!-- User Account Menu -->
		  <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <!-- The user image in the navbar-->
              <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['login_nome'] . " " . $_SESSION['login_cognome'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['login_nome'] . " " . $_SESSION['login_cognome'];?> - <?php if ($_SESSION['tipo_utente']=='c') {echo "cliente";} elseif ($_SESSION['tipo_utente']=='t') {echo "terza parte";} ?>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Esci</a>
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
          <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login_nome'] . " " . $_SESSION['login_cognome'];?></p>
          <!-- Status -->
          
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree" data-widget="tree">
		<li class="header"><h4>OPERAZIONI:</h4></li>
		<!-- search form (Optional) -->
		<li>
			<form action="ricerca_ril_cod.php" method="post" class="sidebar-form">
				<div class="input-group">
				  <input type="text" name="cod" class="form-control" placeholder="Codice rilevazione">
				  <span class="input-group-btn">
					  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					  </button>
					</span>
				</div>
			</form>
		</li>
        <li><a href="visualizza_rilevazioni.php?option=0"><i class="fa fa-link"></i> <span>Visualizza rilevazioni</span></a></li>
        <?php if ($_SESSION['tipo_utente']=='c') echo "<li><a href=\"visualizza_rilevazioni.php?option=1\"><i class=\"fa fa-link\"></i> <span>Stato rilevazioni</span></a></li>";?>
		
		<?php if ($_SESSION['tipo_utente']=='c') echo "<li><a href=\"visualizza_rilevazioni.php?option=2\"><i class=\"fa fa-link\"></i> <span>Esporta dati in XML</span></a></li>";
			elseif ($_SESSION['tipo_utente']=='t') echo "<li><a href=\"visualizza_rilevazioni.php?option=3\"><i class=\"fa fa-link\"></i> <span>Esporta dati via mail</span></a></li>"; ?>
			
        <?php if ($_SESSION['tipo_utente']=='c') echo "
			<li class=\"treeview\">
			  <a href=\"#\"><i class=\"fa fa-link\"></i> <span>Terze parti</span>
				<span class=\"pull-right-container\">
					<i class=\"fa fa-angle-left pull-right\"></i>
				  </span>
			  </a>
			  <ul class=\"treeview-menu\" style=\"display: none;\">
				<li><a href=\"autorizza_tp.php\">Autorizza</a></li>
				<li><a href=\"revoca_tp.php\">Revoca autorizzazione</a></li>
			  </ul>
			</li>";?>
			
        <li><a href="#"><i class="fa fa-link"></i> <span>Sintesi</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 754px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Autorizza terza parte</h1>
    </section>
	<!-- Main content -->
	<div class="content">
		
		<section class="content">
		
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Dati della terza parte</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="autorizza_tp_ok.php" method="post">
              <div class="box-body">
                
				<div class="form-group">
                  <label for="nomec" class="col-sm-2 control-label">Nome</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomec" name="nome" placeholder="Es. Marco" required>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="cognomec" class="col-sm-2 control-label">Cognome</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cognomec" name="cognome" placeholder="Es. Rossi" required>
                  </div>
                </div>
                
				<div class="form-group">
                  <label for="sessoc" class="col-sm-2 control-label">Sesso</label>
				  <div class="col-sm-10">
                  <div class="radio">
							<div class="col-sm-2">
							<input type="radio" value="m" name="sesso" id="sessom" required>Maschio&emsp;
							</div>
							<div class="col-sm-2">
							<input type="radio" value="f" name="sesso" id="sessof">Femmina
							</div>
				  </div>
				  </div>
                </div>
				
				<div class="form-group">
                  <label for="emailc" class="col-sm-2 control-label">Indirizzo</label>
				  <div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
						<i class="fa fa-home"></i>
					  </div>
                    <input type="text" class="form-control" id="indirizzoc" name="indirizzo" placeholder="Es. Via Togliatti, 51">
					</div>
				  </div>
                </div>
				
				<div class="form-group">
                  <label for="emailc" class="col-sm-2 control-label">Residenza</label>
				  <div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
						<i class="fa fa-home"></i>
					  </div>  
					  <input type="text" class="form-control" id="residenzac" name="residenza" placeholder="Es. Matera">
					</div>
				  </div>
                </div>
                
				<div class="form-group">
					<label for="telefonoc" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
						<i class="fa fa-phone"></i>
					  </div>
					  <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" name="telefono">
					</div>
					</div>
				</div>
				
				<div class="form-group">
                  <label for="emailc" class="col-sm-2 control-label">Email</label>
				  <div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
					  <i class="fa fa-envelope"></i>
					  </div>
					  <input type="email" class="form-control" id="emailc" name="email" placeholder="Es. gio93@libero.it" required>                   
					</div>
                  </div>
				</div>
				
				<div class="form-group">
                  <label for="passwordc" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
					  <i class="fa fa-lock"></i>
					  </div>
                      <input type="password" class="form-control" id="passwordc" name="password" placeholder="Inserisci la password del cliente" required>
					</div>
				 </div>
                </div>
              
			  <!-- /.box-body -->
              <div class="box-footer">
				<button type="reset" class="btn btn-default">Cancella</button>
				<?php $_SESSION['fatto']=1; ?>
                <button type="submit" class="btn btn-info pull-right">Autorizza</button>

              </div>
              <!-- /.box-footer -->
            </form>
          </div>
			
		</section>
		
	</div>
	
  </div>	
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
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