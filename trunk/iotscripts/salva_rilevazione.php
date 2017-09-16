<?php


/*
for ($i=0;$i<1000;$i++){
	echo "00000000001:00000".date("YmdH0000",strtotime("2017-01-01 + ".$i." day")).rand(20,40).":lettura ok sensore parcheggio"."<br>";
}
*/

$stringhe=Array(
	"00000000001:0000120170101000000000:si è verificato un errore",
	"00000000001:0000220170101010000000:si è verificato un errore",
	"00000000001:0000320170101020000000:si è verificato un errore",
	"00000000001:0000420170101030000000:si è verificato un errore",
	"00000000001:0000520170101040000000:si è verificato un errore"

	);

for ($i=0;$i<100;$i++){
	$stringhe[]="00000000001:00000".date("YmdHis",strtotime("2017-01-01"."05.00 + ".$i. " hour"))."0".rand(20,40).":lettura ok sensore parcheggio";
	
}

include "dbconnect.php";

// Connessione con il Database
//@$connessione = mysqli_connect($host, $user, $pwd, $db)
//        or die("Errore connessione MySQL Server" . mysqli_error($connessione));

$conn=new mysqli($host, $user, $pwd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("truncate rilevazioni;");

for($i=0;$i<count($stringhe);$i++){
	
$stmt = $conn->prepare("insert into rilevazioni(stringa,descrizione,sensoreR,erroreR) values(?,?,?,?)");
$stmt->bind_param("ssdd", $stringa, $descrizione, $sensoreR,$errore);

$sezioni = explode(":",$stringhe[$i]);

$sensoreR = intval($sezioni[0]);
$stringa = $sezioni[1];
$descrizione = $sezioni[2];
$errore = intval(substr($stringa,0,5));
if ($errore==0) $errore=NULL;

//$sensoriR=intval(substr($stringa,0,5));

$stmt->execute();

if($conn->error) echo $conn->error;
}


$stmt->close();
$conn->close();

?>