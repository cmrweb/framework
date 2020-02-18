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
//echo "\n\e[39minit \e[93m.env \e[32mDone! \n";
//echo $envContent;
$cli = preg_replace("/cmrweb/", $projectName, file_get_contents("lib/cli/cmr.bat"));
    file_put_contents("lib/cli/cmr.bat", $cli);
//echo "\e[39minit \e[93mcli \e[32mDone!\n";
echo "\n\e[96mRun \e[93mcd \e[39m$projectName\n\n";
echo "\e[93mcd \e[39mlib\n";
echo "\e[93mcli/cmr\n";
echo "\e[93mcmr \e[32mstart\e[39m\n \e[96mOr\n\e[93mcd \e[39mlib/cli\n\e[93mphp \e[39mcmr.php \e[32mstart\e[39m\n";