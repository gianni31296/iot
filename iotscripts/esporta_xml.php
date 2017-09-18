<?php 

	session_start();
	require 'dbconnect.php';
	$_SESSION['login']=1;

	$conn=new mysqli($host, $user, $pwd, $db);

	$no_ril=0;
	$sensore = filter_input(INPUT_GET,'sensore');
	/*$inizio=0;
	$num_righe=25;
	$res=$conn->query("select  count(*) as cnt from sensori_tipi where cod_sensore_rt=".$conn->escape_string($sensore));
	$data_num_colonne=$res->fetch_assoc();
	$num_colonne=$data_num_colonne["cnt"];
*/	
	$stmt = $conn->prepare("
	select codRilevazione,rilevazioni.erroreR as errore,
	 if(tipo_dato='intero' or tipo_dato='decimale',
		convert(substr(stringa,inizio,lunghezza),decimal),
		if(tipo_dato='data',
			date_format(convert(substr(stringa,inizio,lunghezza),date),'%d/%m/%Y'),
			if(tipo_dato='ora',
				convert(substr(stringa,inizio,lunghezza),time),
				substr(stringa,inizio,lunghezza)
			)
		)
	 ) 
	 dato,sensori_tipi.descrizione_t,rilevazioni.descrizione from sensori_tipi 
	 join rilevazioni on rilevazioni.sensoreR=sensori_tipi.cod_sensore_rt
	 join tipi on tipi.cod_tipo=sensori_tipi.cod_tipo_rt 
	 join sensori on sensori.codsensore=sensori_tipi.cod_sensore_rt
	 left join errori on rilevazioni.erroreR=errori.codErrore
	 where sensori.clienteS= ? 
	 and rilevazioni.sensoreR= ".$sensore. "
	 and sensori_tipi.cod_sensore_rt= ".$sensore. "
	 and rilevazioni.stato!=0
	 order by codRilevazione");
	$stmt->bind_param("d",$_SESSION["login"]);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($cod,$e,$a,$b,$c);
	$i=0;
	$numero_dati=$stmt->num_rows;

	//$cols= Array( $numero_dati);
	$headers=array();
	
	if ($numero_dati>0){
		$xml = new SimpleXMLElement('<xml/>');

		while($stmt->fetch()){
			$cols[$cod][$b]=$a;
			$cols[$cod]["descrizione"]=$c;
			$headers[$b]=$b;
			$codici[$cod]=$cod;
		}
		
		if(count($headers)>0){
		
		$headers["descrizione"]="descrizione";
			
			foreach($headers as $header){
			
				foreach($cols as $k=>$v){

					$num=0;
					$ril = $xml->addChild('rilevazione');
					foreach($headers as $header){
						
						if($num==0){
							$ril->addChild('codice', $codici[$k]);
							$num++;
						}
						if($header=='errore' and $cols[$k]['errore']>0){
							$ril->addChild('errore', $e[$k]);
						} else {
							$ril->addChild($header, $cols[$k][$header]);
						}
						
					}
				}
			}
		} else echo "no";
	 
		//Header('Content-type: text/xml');
		//print($xml->asXML());
		if(file_exists("rilevazioni_s". $sensore . ".xml")) unlink("rilevazioni_s". $sensore . ".xml");
		$f=fopen("rilevazioni_s". $sensore . ".xml","w");
		fwrite($f,$xml->asXML());
		fflush($f);
		fclose($f);
		
	} else $no_ril=1;	
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
  
  
  
  <!--- pezzo script jquery -->
  <script src='js/jquery-3.2.1.min.js'></script>
  <script src="js/on-off-switch.js"></script>
  <script src="js/on-off-switch-onload.js"></script>
  <link rel="stylesheet" href="css/on-off-switch.css">
	<!--- fine pezzo script jquery -->
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
              <span class="hidden-xs"><?php echo $_SESSION["login_nome"] . " " . $_SESSION["login_cognome"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
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
          <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
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
        <?php if ($_SESSION["tipo_utente"]=="c") echo "<li><a href=\"visualizza_rilevazioni.php?option=1\"><i class=\"fa fa-link\"></i> <span>Stato rilevazioni</span></a></li>";?>
		
		<?php if ($_SESSION["tipo_utente"]=="c") echo "<li><a href=\"visualizza_rilevazioni.php?option=2\"><i class=\"fa fa-link\"></i> <span>Esporta dati in XML</span></a></li>";
			elseif ($_SESSION["tipo_utente"]=="t") echo "<li><a href=\"visualizza_rilevazioni.php?option=3\"><i class=\"fa fa-link\"></i> <span>Esporta dati via mail</span></a></li>"; ?>
			
        <?php if ($_SESSION["tipo_utente"]=="c") echo "
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
      <h1>Esporta XML</h1>
    </section>
	<!-- Main content -->
	<div class="content">
		
		<section class="content">
			<center>
                <?php if(file_exists("rilevazioni_s". $sensore . ".xml")) echo 
				'<div class="alert alert-success alert-dismissible">'.
				'<font size="6"><i class="icon fa fa-check"></i>Il tuo file è pronto!</font>&emsp;&emsp;'.
				'<a class="btn btn-app" href="rilevazioni.xml" download target=_blank style="color:black">'.
                '<i class="fa fa-save"></i> Esporta'.
				'</a>'.
				'</div>';
				 else echo '<div class="alert alert-danger alert-dismissible">'.
				 '<font size="6"><i class="icon fa fa-times"></i>Errore nella creazione del file!</font>'. ($no_ril==1 ? '<br><font size="4">Non ci sono rilevazioni relative al sensore inserito</font>' : '') . 
				 '</div>';
				?>
              </center>
		</section>
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
<script>
							new DG.OnOffSwitch({
								el: '#on-off-switch',
								textOn: 'Visibile',
								textOff: 'Nascosto',
								listener:function(name, checked){
									//alert("CIAO");
									$.post("utente.php",{"cod":$('#on-off-switch').attr("cod_number")},function(data){
										alert($('#on-off-switch').attr("cod_number"));
									})
								}
							});

							$("document").ready(function(){
								$("#on-off-switch").click(function(){
									//$.get("utente.php",{"q":"GIANNI MASTROVITO"},function(data){$("#CIAONE").html(data);})
									alert("CIAO");
								});
							});

							</script>
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
