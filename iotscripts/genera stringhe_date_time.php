<?php

for ($i=0;$i<1000;$i++){
	//$stringhe[$i]="00000000001:00000".date("YmdHis",strtotime("2017-01-01 + ".$i." day"))."0".rand(20,40).":lettura ok sensore parcheggio";
	$stringhe[$i]="00000000001:00000".date("YmdHis",strtotime("2017-01-01"."00.00 + ".$i. " hour"))."0".rand(20,40).":lettura ok sensore parcheggio";
	echo $stringhe[$i] . "<br>";
}

?>