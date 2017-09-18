<?php
session_start();
require 'dbconnect.php';


$connessione=new mysqli($host, $user, $pwd, $db);

$esito = 0;
$email = filter_input(INPUT_POST,"user");
$psw = filter_input(INPUT_POST,"psw");
$tipo = filter_input(INPUT_POST,"tipo");
$psw_inserita = md5($psw) ;

if($tipo=="c"){
	$stmt = $connessione->prepare("SELECT codCliente, nomeCliente, cognomeCliente, sessoCliente, accessoCliente  FROM clienti where emailCliente=? and passwordCliente=?");
} else {
	$stmt = $connessione->prepare("SELECT codTP, nomeTP, cognomeTP, clienteTP, sessoTP, accessoTP FROM terzeparti where emailTP=? and passwordTP=?");
}
$stmt->bind_param("ss", $email, $psw_inserita);
$stmt->execute();
if ($tipo=="c") $stmt->bind_result($codUtente,$nomeUtente, $cognomeUtente, $sesso, $accesso);
	else  $stmt->bind_result($codUtente,$nomeUtente, $cognomeUtente, $cliente_rel, $sesso, $accesso);
if($stmt->fetch()){
	$_SESSION['login']=$codUtente;
	$_SESSION['login_nome']=$nomeUtente;
    $_SESSION['login_cognome']=$cognomeUtente;
	$_SESSION['tipo_utente']=$tipo;
	$_SESSION['sesso']=$sesso;
	if ($tipo=="t") $_SESSION['cliente_rel']=$cliente_rel;
	unset($_SESSION['errore']);
	$_SESSION['accesso']=$accesso;
	header("Location: utente.php");
}
else{
	$_SESSION['errore']="Dati inseriti non corretti!";
    header("Location: ../");
}

?>
