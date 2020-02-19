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
echo "\e[96mBienvenu(e) sur le cmrframework by cmrweb \e[32mcontact@cmrweb.fr\n";
echo "\e[96mV0.05.04\n";
echo "\e[96mPour accèder au project \n\e[93mcd \e[39m$projectName\n";
echo "\e[96mPour lancer la page \n";
echo "\e[93mcd \e[39mlib/cli\n";
echo "\e[93mcmr \e[91m| \e[93m./cmr\n";
echo "\e[93mcmr \e[32mstart\e[39m\n";
echo "\e[96mAide cli \n";
echo "\e[93mcmr \e[32mhelp\e[39m\n";