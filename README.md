# label-system

uses Laravel

# Setup

clone project

#quick run 
Once the server is setup and running run the following three commands

php artisan migrate:refresh

vendor/bin/phpunit

php artisan label:test

#Install Dependencies
Install Composer, PHP 7+, yarn or npm
 
run composer install

run yarn or npm install

php artisan key:generate

#Run Server
php artisan serve

## Setup DB
run php artisan migrate:refresh

## To Test
if tests are not updating: run php artisan config:clear 

run vendor/bin/phpunit

##Run Command
run php artisan label:test

##DB Config
If not using the provided DB 
modify the .env.example and rename to .env

fill in the following with your DB info

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Frontend
at uri /labels/create there is a form to add labels.
