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
echo "int .env Done!";
//echo $envContent;
$cli = preg_replace("/cmrweb/", $projectName, file_get_contents("lib/cli/cmr.bat"));
    file_put_contents("lib/cli/cmr.bat", $cli);
echo "init cli Done!\n";
echo "cd $projectName\n";
echo "cd lib\n";
echo "cli/cmr\n";
echo "cmr start\n";