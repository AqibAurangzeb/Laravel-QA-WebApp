# Question & Answer
A laravel Question & Answer application supporting CRUD, search/filtering and user authentication. In addition it implements advanced features such as master-detail, security, gravatar and google-login. 

## Build & Deployment (CI/CD Pipeline)
Build and deployment configuration is setup for CircleCi and AWS ElastickBeanstalk. To set this up for yourself:

Update run command in .circleci/configyml
```
command: eb deploy YOUR-ENVIRONMENT-NAME-ON-AWS-ELASTICK-BEANSTALK
```
Update environment and application name in .elasticeanstalk/config.yml
```
environment: YOUR-ENVIRONMENT-NAME-ON-AWS-ELASTICK-BEANSTALK
application_name: YOUR-APPLICATION-NAME-ON-AWS-ELASTICK-BEANSTALK
``
The global settings may differ for your AWS instance therefore just update as needed.

## Question&Answer Installation

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
