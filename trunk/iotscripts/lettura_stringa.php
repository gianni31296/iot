
<?php
session_start();
$_SESSION["login"]="CIAO";

$descrizione="Errore generico";
$lettura="5:errore;8:data;4:ora;3:valore";
$stringa="00000201701011455054";


$elementi=explode(";",$lettura);
$i=0;

$errore=false;
$cont=0;

while($errore==false && $cont<(count($elementi))){
	$coppiadati=explode(":",$elementi[$cont]);
	$valore=$coppiadati[0];
	$tipo=$coppiadati[1];
	//print_r($coppiadati);
	switch($tipo){
		case "errore":
			if(intval(substr($stringa,$i,$valore))!=0){
				echo "Errore numero ".intval(substr($stringa,$i,$valore)) ."(".$descrizione.")";
				$errore=true;
			}
			break;
		case "data":
			
			break;
		case "ora":
			break;
		case "valore":
			break;
		
	}
	$i+=$valore;
	echo $elementi[$cont]."\n";
	$cont++;
}

print_r(json_encode($elementi));

?>
<a href='test.php'><input type=button value='pagina successiva'></a>