hackathonCulturathon
====================

A Symfony project created on June 13, 2018, 3:45 pm.
# WCSHackathon3Culturathon

System requirements
-------------------

* PHP 7.1;

* Git https://git-scm.com/book/fr/v1/D%C3%A9marrage-rapide-Installation-de-Git

* Database (MySQL/MariaDB or PostgreSQL);

* Composer https://getcomposer.org/doc/00-intro.md

* Npm https://www.npmjs.com/get-npm

How To Use
----------

To clone and run this project, you'll need Git, Composer and NPM. From your command line:

**Clone this repository**  
$ git clone https://github.com/StevenGrl/WCSHackathon3Culturathon.git

**Go into the repository**  
$ cd WCSHackathon3Culturathon

**Install dependencies**  
$ npm install
$ composer install

*Few questions are asked, you have to answer to database_name, database_user, database_password*

*and just don't leave it blank : mailer_user, mailer_password or you will have an error*

**Initiate Project**
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force

**Load fixtures**
$ php bin/console doctrine:fixtures:load

**Compile Webpack for CSS and JS**
$ npm run dev (for dev environment)
$ npm run build (for prod environment)

**Launch PHP  Server**
$ php bin/console server:run (DEV Only)
$ for prod env, configure a web server (apache, nginx, ...)

*You can log in with Username: "admin", password: "1234"*
