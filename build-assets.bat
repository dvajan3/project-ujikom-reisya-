@echo off
echo Installing npm dependencies...
call npm install
echo Building assets...
call npm run build
echo Assets built successfully!
pause