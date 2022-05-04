
## About this project

This project was made for job application. Original task was as follows:

Stack: PHP 7.4+, MySQL 5.7+
Frameworks: vanilla PHP or Laravel.
To develop architecture of DB based on XML-file.
Create parser of XML-file for adding, editing and deleting data from database.
Parser has to start by console command. Console command has to have attribute for path to XML-file, when path to XML-file is not defined by the user default XML-file is used.

## Installing/using

1. For starters, you have to download and install project on your machine, then set up MySQL database (with MySQL Workbench, for example), fill .env file in with your database name, username/password.
2. Start running MySQL database (mysql.server start), PHP server (php artisan serve).
3. In console run a command: add:pathtoxml [path]. Path to XML-file is not required. If you don't specify path default one will be used.
4. Open web-browser on the the page http://127.0.0.1:8000/cars (in most cases).
5. Start experiencing the application.

## Stack versions:
1. PHP 8.0.2.
3. Laravel 9.2.
2. MySQL 8.0.27.
