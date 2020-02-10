@echo off
set /p serve="start "
start c:\wamp64\wampmanager.exe -wait
REM
start http://localhost/%serve%

exit