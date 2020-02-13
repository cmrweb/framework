<?php
$projectName = preg_replace("/\w*[\W]/","",__DIR__);
$dbHOST = "localhost";
$dbNAME = preg_replace("/\w*[\W]/","",__DIR__);
$dbUSER = "root";
$dbPASS = "";
$envContent = "
APP_ENV=\"dev\"
DB_HOST=\"{$dbHOST}\"
DB_NAME=\"{$dbNAME}\"
DB_USER=\"{$dbUSER}\"
DB_PASS=\"{$dbPASS}\"
ROOT_PATH=\"/{$projectName}\"";
file_put_contents(".env", $envContent);
echo ".env generer";
echo $envContent;
