<?php

/*
 * dbconnect.php
 * 
 * Fornisce solo le variabili per la connessione al Database
 * 
 */
 
$host = "localhost";
$db = "IotDatabase";
//$db = "my_piacereospite";
$user = "gianni";
//$user = "piacereospite";
$pwd = "gianni";
//$pwd = "";


/*
 * Visualizza la struttura di una variabile con un messagio
 * @param $var Variabile da visualizzare
 * @param string $messaggio - Messaggio da visualizzare
 */

function debug($var, $messaggio = 'variabile') {
    echo "<h3>$messaggio</h3>";
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
