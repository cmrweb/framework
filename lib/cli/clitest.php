<?php
/**
 *  GENERATE ROUTE
 */
$argLower="test";
preg_match("/\[[\W|\w|\s]*\]/",file_get_contents("../../web/module/route.php"),$oldRoute);
$route=substr($oldRoute[0],0,-1).",'{$argLower}'=>'{$argLower}'\n]";
$routeFinal = preg_replace("/\[[\W|\w|\s]*\]/",$route,file_get_contents("../../web/module/route.php"));
file_put_contents("../../web/module/route.php", $routeFinal);