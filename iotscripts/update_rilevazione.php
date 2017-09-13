<?php

session_start();
//print_r($_SESSION);
//print_r($_POST);


require 'dbconnect.php';
$conn=new mysqli($host, $user, $pwd, $db);
if ($conn->query("update rilevazioni set stato=".$conn->escape_string($_POST["value"]=="true"?1:0). " where codRilevazione=".$conn->escape_string($_POST["cod"])))
	echo "FATTO";
else echo "NON FATTO ".$conn->error;


?>