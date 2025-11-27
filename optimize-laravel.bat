@echo off
echo Optimizing Laravel Application...
echo.

echo Clearing application cache...
php artisan cache:clear

echo Clearing route cache...
php artisan route:clear

echo Clearing config cache...
php artisan config:clear

echo Clearing view cache...
php artisan view:clear

echo Caching routes...
php artisan route:cache

echo Caching config...
php artisan config:cache

echo Caching views...
php artisan view:cache

echo.
echo Laravel optimization completed!
echo.
pause