## GurbaniDB API

Version: 2.1

Welcome to the GurbaniDB API for the Sikh Scriptures developed using the popular Laravel PHP Framework. We decided to take advantage of Laravel's fantastic ORM to rapidly develop this API.

We decided to keep this API version (2.x) and the GurbaniDB database version (2.x) the same because they were developed together and are compatible with one another.

GurbaniDB API Version 1.0, as used formerly in the GurbaniDB search engine, is now deprecated and we will no longer be supporting or documenting it.

## Demo
The latest version of this repo is live at: http://api.sikher.com

## Pre-requisites

Before installing the GurbaniDB API, please ensure you have the following packages installed on your local machine or server.

You may choose to use a software like [WAMPP](http://www.wampserver.com/en/) or [XAMPP](http://www.apachefriends.org/en/xampp.html), or a package manager like Brew for Mac or APT for Linux, to install most of these dependencies for you:

* [Git](http://git-scm.com/downloads)
* [Apache v2.2+](http://httpd.apache.org/download.cgi) \(with actions, rewrite & php5 modules enabled\)
* [MySQL 5.5+](http://dev.mysql.com/downloads/mysql/)
* [PHP 5.3.7+](http://www.php.net/manual/en/install.php) \(with mcrypt, mysql, mysqli, pdo, pdo_mysql & json extensions enabled - check with `phpinfo();` command\)
* [Composer](http://getcomposer.org/download/) 
* [PhpMyAdmin](http://www.phpmyadmin.net/home_page/downloads.php)

As well as this, you will need to know how to setup name-based Virtual Hosts or vhosts in Apache and how to edit your system's `hosts` file.

Finally, you will need to know some basics of how to use `Terminal` or the command-line.

## Installation

### Step 1: Download the Repository

Just use `git` to clone the ssh version:

    git clone git@github.com:sikher/gurbanidb.git

**Or** use `git` to clone the https version:

    git clone https://github.com/sikher/gurbanidb.git

**Or** download the .zip archive and unzip it:

    https://github.com/sikher/gurbanidb/archive/master.zip

### Step 2: Setup a Virtual Host & Install Laravel

1. Please setup a vhost called `api.dev` (or a name of your choosing) to point to the directory where you just downloaded the GurbaniDB repository
2. Now open `Terminal` or the command-line and use `cd` to navigate to the GurbaniDB repository. Then run the command `php composer.phar install` to install all the dependencies of the [Laravel](http://laravel.com/docs/installation) PHP framework
3. Open a browser and navigate to `api.dev/` to see if it loads the homepage. If not, check your Apache error log and double-check you installed all the pre-requisites properly.

### Step 3: Install Local GurbaniDB Database & Setup Production Database 

1. Download the GurbaniDB 2.1 database here: http://www.sikher.com/sql/2.1/
2. Follow the installation instructions here: https://github.com/sikher/docs/blob/master/2.x.md
3. Go to `./app/config/` in your repository and `mkdir` 'production'. Then `cp` the file `database.php` into the new production folder. Now update the database settings inside the following files:
	* `app/config/database.php` - Default Database
	* `app/config/local/database.php` - Local Database
	* `app/config/production/database.php` - Production Database

The local and production environments are determined by the `bootstrap/start.php` file, so you will also have to modify this to your local and production server HTTP host names.

## Running Tests

To run the unit tests simply navigate to the root of the directory in `Terminal` and use the command:

	$ phpunit

If everything is setup right, you should see something like:

	PHPUnit 3.7.28 by Sebastian Bergmann.

	Configuration read from {dir/to/your/application}/phpunit.xml

	......................................................

	Time: 2.16 seconds, Memory: 55.00Mb

	OK (54 tests, 54 assertions)

## API Routes

Below is a list of all the API routes supported in this application, which you can also find in `app/routes.php`:
* `/about` - Gives version number of API
* `/scripture/page/{page_id?}` - Gives back the page, defaults to page 1
* `/scripture/hymn/{hymn_id?}` - Gives back the hymn, defaults to hymn 1
* `/scripture/{id?}` - Gives back the line, defaults to line 1
* `/translation/page/{page_id?}/{language_id?}` - Gives back the translation of a page in the language specified, defaults to 1/1
* `/translation/hymn/{hymn_id?}/{language_id?}` - Gives back the translation of a hymn in the language specified, defaults to 1/1
* `/translation/{scripture_id?}/{language_id?}` - Gives back the translation of a line in the language specified, defaults to 1/1
* `/transliteration/page/{page_id?}/{language_id?}` - Gives back the transliteration of a page in the language specified, defaults to 1/55
* `/transliteration/hymn/{hymn_id?}/{language_id?}` - Gives back the transliteration of a hymn in the language specified, defaults to 1/55
* `/transliteration/{scripture_id?}/{language_id?}` - Gives back the transliteration of a line in the language specified, defaults to 1/55
* `/melody` - Gives back a list of all the melodies
* `/melody/{id?}` - Gives back the melody specified, defaults to 1
* `/author` - Gives back a list of all the authors
* `/author/{id?}` - Gives back the author specified, defaults to 1
* `/language` - Gives back a list of all the languages
* `/language/{id?}` - Gives back the language specified, defaults to 1

## To Do
* Add ability to search by first letter, which returns line, hymn and page ids for each search
* Add in some logic to track the usage of each endpoint
