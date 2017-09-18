<?php
	
	session_start();
	require 'dbconnect.php';
	$_SESSION['login']=1;
	
	// FPDF
	// dichiarare il percorso dei font
	define('FPDF_FONTPATH','./font/');
	//questo file e la cartella font si trovano nella stessa directory
	//require 'add/fpdf.php';
	require 'add/mysql_report.php';
	// crea l'istanza del documento
	//$pdf = new fpdf();
	$pdf = new PDF('L','pt','A3'); 
	// inizializza il documento
	//$p->Open();
	 
	// aggiunge una pagina
	//$pdf->AddPage();
	$pdf->SetFont('Arial');
	//$p->Cell(40,10,'Hello World!');
	
	$pdf->connect($host, $user, $pwd, $db);

	$sql_statement = "SELECT * FROM rilevazioni WHERE sensoreR=1" ;
	$pdf->mysql_report($sql_statement, false, $attr );
	


	$output='';
	
	/*
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
	$stmt->bind_param("d",$_SESSION['login']);
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
		$cols[$cod]['descrizione']=$c;
		$cols[$cod]['stato']=$stato;
		$headers[$b]=$b;
		
		$codici[$cod]=$cod;
		
	}
	
	if(count($headers)>0){
	
	$headers['descrizione']="descrizione";
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
				$headers['stato']="stato";
				echo "<th><center>" . $headers['stato'] . "</center></th>";
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
	
	
	
	
	
	*/
	//$p->Write(5, $output);
	
	// Senza parametri rende il file al browser
	$pdf->output(); 
?>