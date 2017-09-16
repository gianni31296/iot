<?php

session_start();
require 'dbconnect.php';
$conn=new mysqli($host, $user, $pwd, $db);
$option = filter_input(INPUT_GET,'option');
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
      <h1>Esito ricerca</h1>
    </section>
	<!-- Main content -->
	<div class="content">
		<section class="content">
		
			<div class="box">
            <div class="box-header">
			  
               
				
					<?php 
						$sensore = filter_input(INPUT_GET,'sensore');
						
						$stmt = $conn->prepare("
						select codRilevazione,
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
						 dato,sensori_tipi.descrizione_t,rilevazioni.descrizione,rilevazioni.stato from sensori_tipi 
						 join rilevazioni on rilevazioni.sensoreR=sensori_tipi.cod_sensore_rt
						 join tipi on tipi.cod_tipo=sensori_tipi.cod_tipo_rt 
						 join sensori on sensori.codsensore=sensori_tipi.cod_sensore_rt
						 where sensori.clienteS=?
						 and rilevazioni.sensoreR= ".$sensore. "
						 and sensori_tipi.cod_sensore_rt= ".$sensore. " " . 
						 (($option==0 or $option==2 or $option==3) ? "and rilevazioni.stato!=0" : "") ."
						 order by codRilevazione");
						echo $conn->error;
						$stmt->bind_param("d",$_SESSION["login"]);
						$stmt->execute();
						$stmt->store_result();
						$stmt->bind_result($cod,$a, $b,$c,$stato);
						$i=0;
						$numero_dati=$stmt->num_rows;
						if ($numero_dati>0) echo "  <h3 class=\"box-title\">Rilevazioni</h3>
								<h5 style=\"text-align:right\"> <a href=\"ricerca_ril_filtri.php\">>> aggiungi filtri</a></h5>
								</div>
            
								<!-- /.box-header -->
								<div class=\"box-body\"><div id=\"ril_wrapper\" class=\"dataTables_wrapper form-inline dt-bootstrap\"><div class=\"row\"><div class=\"col-sm-12\"><table id=\"ril\" class=\"table table-bordered table-striped dataTable\" role=\"grid\" aria-describedby=\"ril_info\">
								<tbody>";
						//$cols= Array( $numero_dati);
						$max_righe=10;
						$inizio_righe=0;
						$conteggio_righe=0;
						$headers=Array();
						while($stmt->fetch() && $conteggio_righe<$max_righe){

							$cols[$cod][$b]=$a;
							$cols[$cod]["descrizione"]=$c;
							$cols[$cod]["stato"]=$stato;
							$headers[$b]=$b;
							
							$codici[$cod]=$cod;
							
						}
						
						if(count($headers)>0){
						
						$headers["descrizione"]="descrizione";
						echo "<tr role=\"row\" class=\"odd\">";
							echo "<th>";
								echo "Codice";
								echo "</th>";
							
							foreach($headers as $header){
								echo "<th>";
								echo $header;
								echo "</th>";
							}
							switch($option){
								case 1:
									$headers["stato"]="stato";
									echo "<th><center>" . $headers["stato"] . "</center></th>";
									break;
								case 2:
									echo "<th><center>XML</center></th>";
									break;
								case 3:
									echo "<th><center>Mail</center></th>";
									break;
							}
						echo "</tr>";
						
						foreach($cols as $k=>$v){

							echo "<tr role=\"row\" class=\"odd\">";
							$num=0;
						
							foreach($headers as $header){
								if($num==0){
								echo "<td>";
								echo $codici[$k];
								echo "</td>";
								$num++;
								}
								echo "<td>";
								if ($header=='errore' AND $cols[$k]['errore']==0) echo "-";
								else if($header=='errore' AND $cols[$k]['errore']>0) echo "<a href=\"errore.php?cod=".$codici[$k]."\">".$cols[$k][$header]."</a>";
								else  {
									
									if($header=="stato" && $option==1) {
										
										echo "<center><input type=\"checkbox\" class=\"on-off-switch\" id=\"switch".$k."\" name=\"switch".$k."\" cod_number=12 ".( $cols[$k][$header]==1?"checked":"")."></center>";
									}
									else echo $cols[$k][$header] ;
									
								}
								echo "</td>";
							}
							/*switch($option){
								case 1:
									if ($cols[$k]['stato']==1)
									echo "<td><center><input type=\"checkbox\" id=\"on-off-switch\" name=\"switch".$k."\" cod_number=12 checked></center></td>";
									else echo "<td><center><input type=\"checkbox\" id=\"on-off-switch\" name=\"switch".$k."\" cod_number=12></center></td>";
									break;
								case 2:
									echo "<td><a href=\"#\"><center><span class=\"glyphicon glyphicon glyphicon-file\" style=\"color:light-blue\"></span></center></a></td>";
									break;
								case 3:
									echo "<td><a href=\"#\"><center><span class=\"glyphicon glyphicon glyphicon-envelope\" style=\"color:light-blue\"></span></center></a></td>";
									break;
							}	*/
							
							echo "</tr>";
						}
						echo"
							</tbody>
							</table></div></div>
							";
						} else echo "<div class=\"col-md-5\"><div class=\"alert alert-danger alert-dismissible\">
											<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
											<h4><i class=\"icon fa fa-ban\"></i> Errore!</h4>
											Non è stata trovata nessuna rilevazione con il sensore inserito!
								      </div></div>
									  </tbody></table></div></div><META HTTP-EQUIV=REFRESH CONTENT=\"5; URL=utente.php\"";
						
					?>
				</div>
            </div>
            <!-- /.box-body -->
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
<script>
							new DG.OnOffSwitchAuto({
								cls: '.on-off-switch',
								textOn: 'Visibile',
								textOff: 'Nascosto',
								listener:function(name, checked){
									//alert(parseInt(name.substring(6)));
									//alert(DG.switches["#"+name].getValue());
									$.post("update_rilevazione.php",{"cod":parseInt(name.substring(6)),"value":DG.switches["#"+name].getValue()},function(data){
										//alert($('#on-off-switch').attr("cod_number"));
										alert(data);
									})
								}
							});

							$("document").ready(function(){
								//$(".on-off-switch").click(function(){
									//$.get("utente.php",{"q":"GIANNI MASTROVITO"},function(data){$("#CIAONE").html(data);})
									//alert("CIAO");
								//});
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