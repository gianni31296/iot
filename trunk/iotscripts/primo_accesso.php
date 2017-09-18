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
		seconds = 5;

		function updateTimer(divId)
		{
			elem = document.getElementById(divId);
			document.getElementById('seconds').innerHTML = --seconds;

			if (seconds == 0) {
				elem.style.display = 'block';
			} else {
				setTimeout("updateTimer('" + divId + "')", 1000);
			}
		}
	</script>
	
	<script id="s">
		var password = document.getElementById("inputPassword1")
		  , confirm_password = document.getElementById("inputPassword2");
		function validatePassword(){
		  if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Le password non corrispondono!");
		  } else {
			confirm_password.setCustomValidity('');
		  }
		}
		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
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
<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;" onload="javascript:updateTimer('foo')">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <?php if ($_SESSION["tipo_utente"]=="c") {echo "
		<div class=\"logo\">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class=\"logo-mini\"><b>I</b>oT</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class=\"logo-lg\"><b>IoT</b> Inc.</span>
		</div>";} elseif ($_SESSION["tipo_utente"]=="t"){ echo "
		<div class=\"logo\" style=\"background-color: #f38412;\">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class=\"logo-mini\"><b>I</b>oT</span>
		  <!-- logo for regular state and mobile devices -->
		  <span class=\"logo-lg\"><b>IoT</b> Inc.</span>
		</div>";}
	?>
	
    <!-- Header Navbar -->
    <?php if ($_SESSION["tipo_utente"]=="c") {echo "
		<nav class=\"navbar navbar-static-top\" role=\"navigation\">";} elseif ($_SESSION["tipo_utente"]=="t") {echo "
		<nav class=\"navbar navbar-static-top\" role=\"navigation\" style=\"background-color: #f38412;\">";}
	?>
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          

          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <!-- The user image in the navbar-->
              <?php
			  if ($_SESSION["sesso"]=="m") echo "<img src=\"../dist/img/avatar5.png\" class=\"user-image\" alt=\"User Image\">";
			  else echo "<img src=\"../dist/img/avatar3.png\" class=\"user-image\" alt=\"User Image\">";
			  ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION["login_nome"] . " " . $_SESSION["login_cognome"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php
				  if ($_SESSION["sesso"]=="m") echo "<img src=\"../dist/img/avatar5.png\" class=\"img-circle\" alt=\"User Image\">";
				  else echo "<img src=\"../dist/img/avatar3.png\" class=\"img-circle\" alt=\"User Image\">";
				  ?>
                <p>
                  <?php echo $_SESSION["login_nome"] . " " . $_SESSION["login_cognome"];?> - <?php if ($_SESSION["tipo_utente"]=="c") {echo "cliente";} elseif ($_SESSION["tipo_utente"]=="t") {echo "terza parte";} ?>
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
          <?php
		  if ($_SESSION["sesso"]=="m") echo "<img src=\"../dist/img/avatar5.png\" class=\"img-circle\" alt=\"User Image\">";
		  else echo "<img src=\"../dist/img/avatar3.png\" class=\"img-circle\" alt=\"User Image\">";
		  ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["login_nome"] . " " . $_SESSION["login_cognome"];?></p>
          <!-- Status -->
          
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree" data-widget="tree">
		<li class="header"><h4>OPERAZIONI:</h4></li>
		<!-- search form (Optional) -->
		</ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 754px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	  <?php
	  if ($_SESSION["sesso"]=="m")echo "<h1>Benvenuto&nbsp;" . $_SESSION["login_nome"] . "!</h1>";
	  else {echo "<h1>Benvenuta&nbsp;" . $_SESSION["login_nome"] . "!</h1>";}
	  ?>
	  <h3>Solo un attimo... prima di iniziare cambia la tua password!</h3>
    </section>
	<!-- Main content -->
	<div class="content">
		
		<?php
		    $message="";
			if(isset($_POST["modificacliente"])){
				if ($_SESSION["tipo_utente"]=="c")	$stmt=$conn->prepare("update clienti set passwordCliente=?,accessoCliente=0 where codCliente=?" );
				elseif ($_SESSION["tipo_utente"]=="t") $stmt=$conn->prepare("update terzeparti set passwordTP=?,accessoTP=0 where codTP=?" );
				
				$password=md5(filter_input(INPUT_POST,"psw"));
				//echo $nome."    ".$cod."...";
				
				$stmt->bind_param("sd",$password,$_SESSION['login']);
				$stmt->execute();
				$message="<div class=\"alert alert-info alert-dismissible\" style=\"background-color:#00993a !important; border-color:#00993a !important\">
						  La password è stata modificata correttamente!<br>
						  Sarai reindirizzato alla pagina iniziale tra &nbsp;";
			}
		
			if ($_SESSION["tipo_utente"]=="c") $stmt=$conn->query("SELECT nomeCliente, cognomeCliente, sessoCliente, indirizzoCliente, residenzaCliente, emailCliente, telefonoCliente FROM clienti WHERE codCliente=" . $_SESSION['login']);
			elseif ($_SESSION["tipo_utente"]=="t") $stmt=$conn->query("SELECT nomeTP, cognomeTP, sessoTP, indirizzoTP, residenzaTP, emailTP, telefonoTP FROM terzeparti WHERE codTP=" . $_SESSION['login']);
			$row = $stmt->fetch_assoc();
		?>
		
		<section class="content">
		
			<div class="box box-info" style="border-top-color:#00993a">
            <div class="box-header with-border">
              <h3 class="box-title">I tuoi dati:</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" id="form" >
			  <input name=modificacliente type=hidden>
              <div class="box-body">
                
				<div class="form-group">
                  <label for="nomec" class="col-sm-2 control-label">Nome</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomec" name="nome" value="<?php echo $row["nomeCliente"]; ?>" readonly>
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="cognomec" class="col-sm-2 control-label">Cognome</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cognomec" name="cognome" value="<?php echo $row["cognomeCliente"]; ?>" readonly>
                  </div>
                </div>
                
				<div class="form-group">
                  <label for="sessoc" class="col-sm-2 control-label">Sesso</label>
				  <div class="col-sm-10">
                  <div class="radio">
							<div class="col-sm-2">
							<input type="radio" value="m" name="sesso" id="sessom" <?php if($row["sessoCliente"]=="m") echo "checked"; ?> disabled>Maschio&emsp;
							</div>
							<div class="col-sm-2">
							<input type="radio" value="f" name="sesso" id="sessof" <?php if($row["sessoCliente"]=="f") echo "checked"; ?> disabled>Femmina
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
                    <input type="text" class="form-control" id="indirizzoc" name="indirizzo" value="<?php echo $row["indirizzoCliente"]; ?>" readonly>
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
					  <input type="text" class="form-control" id="residenzac" name="residenza" value="<?php echo $row["residenzaCliente"]; ?>" readonly>
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
					  <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" name="telefono" value="<?php echo $row["telefonoCliente"]; ?>" readonly>
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
					  <input type="email" class="form-control" id="emailc" name="email" value="<?php echo $row["emailCliente"]; ?>" readonly>                  
					</div>
                  </div>
				</div>
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
					  <i class="fa fa-key"></i>
					  </div>
                      <input type="password" class="form-control" name="psw" id="inputPassword1" placeholder="Password" required>
					</div>
				  </div>
                </div>
				
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Conferma password</label>
                  <div class="col-sm-10">
					<div class="input-group">
					  <div class="input-group-addon">
					  <i class="fa fa-key"></i>
					  </div>
                      <input type="password" class="form-control" name="psw1" id="inputPassword2" placeholder="Conferma password" required onblur="s">
					</div>
				  </div>
                </div>
              
			  <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right" style="border-color:#00993a; background-color:#00993a">Conferma</button>

              </div>
              <!-- /.box-footer -->
			</div>
            </form>
          </div>
		
		
		<?php
			if ($_SESSION["tipo_utente"]=="c"){ 
				$res = $conn->query("SELECT accessoCliente FROM clienti WHERE codCliente=" . $_SESSION['login']);
				$row = $res->fetch_assoc();
				$_SESSION['accesso']=$row['accessoCliente'];
			} else {
				$res = $conn->query("SELECT accessoTP FROM terzeparti WHERE codTP=" . $_SESSION['login']);
				$row = $res->fetch_assoc();				
				$_SESSION['accesso']=$row['accessoTP'];
			} 
			echo $message; if(isset($_POST["modificacliente"])) echo "<element id=\"seconds\">5</element>
			<div id=\"foo\" style=\"display: none;\">
			</div>
			</div> <META HTTP-EQUIV=REFRESH CONTENT=\"5; URL=utente.php\"> ";?>
			
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