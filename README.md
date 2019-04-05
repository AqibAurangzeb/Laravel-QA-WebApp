# Question&Answer

## Installation

### Install Composer
```
wget http://getcomposer.org/installer
php installer
```

### Install Dependencies with Composer
```
php composer.phar install
```

### Create Environment File
```
cp .env.example .env
```
Edit the .env file to have SQlite configuration. The only database settings needed are:

```
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/db.sqlite3
```
Update the second setting when you've created the empty database.

Then add the application key to the environment:
```
php artisan key:generate
```
### Create Database
Make the empty database, use pwd to get path and update DB_DATABASE path in config.
```
touch db.sqlite3
```
Create tables, nothing to populate in this case.
php artisan migrate

### Start the Application
```
php artisan serve
```
Start the server, the application will now be available on port 8000
