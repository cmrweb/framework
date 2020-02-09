@echo off 
set /p cmrgen="cmrhtml "
REM Change Directory to the folder containing your script
CD C:\wamp64\www\cmrweb\lib\cli
REM Execute
php generator.html.php %cmrhtml%