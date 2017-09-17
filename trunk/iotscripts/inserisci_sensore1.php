<?php

session_start();
require 'dbconnect.php';
$conn=new mysqli($host, $user, $pwd, $db);
$option=filter_input(INPUT_POST,'opz');
$_SESSION['sensore']=filter_input(INPUT_POST,'sensore');
if($option=="nuovo") header("location: tipo_nuovo.php?campi=1");
else if($option=="esiste") header("location: tipo_esistente.php");

?>
