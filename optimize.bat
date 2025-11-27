@echo off
echo Optimizing Laravel Application...

echo Clearing caches...
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo Optimizing for production...
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo Running migrations...
php artisan migrate --force

echo Optimization complete!
pause