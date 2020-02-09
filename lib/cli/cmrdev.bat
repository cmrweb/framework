@echo off 
set /p cmrdev="cmrdev "
REM Change Directory to the folder containing your script
CD C:\wamp64\www\cmrweb\lib\cli
REM Execute
php generator.dev.php %cmrdev%