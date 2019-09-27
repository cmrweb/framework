@echo off 
set /p cmrgen="cmrgen "
REM Change Directory to the folder containing your script
CD C:\wamp64\www\cmrfwDefaultProject\lib\cli
REM Execute
php generator.php %cmrgen%