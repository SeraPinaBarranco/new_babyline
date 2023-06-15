<?php
$SERVER =  "185.70.93.243";
$USER   =  "ropadecu_oc32oct";
//$PASS   =  "usbw";
$PASS   =  "khLONcGvZ-aM" ;
$BBDD   =  "ropadecu_oc32journal3";

$DNS = "mysql:host=$SERVER;dbname=$BBDD";

$pdo_ropadecu = new PDO($DNS,$USER, $PASS);

$SERVER_BABY =  "185.70.93.244";
$USER_BABY   =  "babyline_2020";
//$PASS   =  "usbw";
$PASS_BABY   =  "K7FaL*YQvGM0" ;
$BBDD_BABY   =  "babyline_2020";

$DNS_BABY = "mysql:host=$SERVER_BABY;dbname=$BBDD_BABY";

$pdo_baby = new PDO($DNS_BABY,$USER_BABY, $PASS_BABY);

?>