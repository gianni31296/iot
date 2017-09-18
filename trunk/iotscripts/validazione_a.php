<?php
session_start();
require 'dbconnect.php';


$connessione=new mysqli($host, $user, $pwd, $db);

$esito = 0;
$user = filter_input(INPUT_POST,"user");
$psw = filter_input(INPUT_POST,"psw");
$psw_inserita = md5($psw) ;


$stmt = $connessione->prepare("SELECT codCliente, nomeCliente, cognomeCliente FROM clienti where emailCliente=? and passwordCliente=?");
$stmt->bind_param("ss", $email, $psw_inserita);
$stmt->execute();
$stmt->bind_result($codCliente,$nomeCliente, $cognomeCliente);
if($user=="admin" and $psw_inserita==md5("admin")){
	unset($_SESSION["errore"]);
	header("Location: azienda.php");
}
else{
	$_SESSION["errore"]="Nome utente e/o password non corretti!";
    header("Location: ../index2.php");
}

?>
