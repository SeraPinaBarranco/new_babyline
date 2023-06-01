<?php
$SERVER =  "185.70.93.243";
$USER   =  "ropadecu_oc32oct";
//$PASS   =  "usbw";
$PASS   =  "khLONcGvZ-aM" ;
$BBDD   =  "ropadecu_oc32journal3";

$DNS = "mysql:host=$SERVER;dbname=$BBDD";

$pdo_ropadecu = new PDO($DNS,$USER, $PASS);
?>