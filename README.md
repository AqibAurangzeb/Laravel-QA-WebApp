# Question & Answer
A laravel Question & Answer application supporting CRUD, search/filtering and user authentication. In addition it implements advanced features such as master-detail, security, gravatar and google-login. 

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
```
php artisan migrate
```

### Start the Application
```
php artisan serve
```
Start the server, the application will now be available on port 8000

## Build & Deployment (CI/CD Pipeline)

### Configuration
Build and deployment configuration is setup for CircleCi and AWS ElastickBeanstalk. To set this up for yourself:

Update run command in .circleci/configyml
```
command: eb deploy YOUR-ENVIRONMENT-NAME-ON-AWS-ELASTICK-BEANSTALK
```
Update environment and application name in .elasticeanstalk/config.yml
```
environment: YOUR-ENVIRONMENT-NAME-ON-AWS-ELASTICK-BEANSTALK
application_name: YOUR-APPLICATION-NAME-ON-AWS-ELASTICK-BEANSTALK
```
The global settings may differ for your AWS instance therefore just update as needed.

### Add project to CircleCi
Log into CircleCi via your GitHub account, find the github repo and add the project.

Go-into project settings and add environment variables. This will need updating when you've created a user on AWS. 
```
AWS_ACCESS_KEY_ID: XXXXXXXXXXXXXXXXXXXXX
AWS_SECRET_ACCESS_KEY: XXXXXXXXXXXXXXXXXXXXX
```

The application will now build in CircleCi but will fail as AWS instance needs to be started-up and AWS client/secret provided.

### Create a web app with Elastic Beanstalk
Log-into your AWS account, navigate to Elastic Beanstak and click get started.
Ensure the application name you create here is the same as the one in config.
Choose the PHP platform
Create the web application

### Configure your Elastic Beanstalk environment
First create and associate the database.
In configuration -> Database. Choose Mysql engine, a root and password then create a database.
Second update software settings
In configuration -> Software. Mark the Document root as '/public' and add following environment properties.
```
GOOGLE_ID: XXXXXXXXXXXXXXXXXXXXX
GOOGLE_SECRET: XXXXXXXXXXXXXXXXXXXXX
GOOGLE_URL: XXXXXXXXXXXXXXXXXXXXX
MAIL_PASSWORD: XXXXXXXXXXXXXXXXXXXXX
MAIL_USERNAME: XXXXXXXXXXXXXXXXXXXXX
```

Update these with your own, on deployment these variables will replace the ones in .env file. 

### Setup AWS IAM for deployment
[Add User Here](https://console.aws.amazon.com/iam/home?#/users$new?step=details)
Set username and select programmatic access
Click 'Create group' on the user permissions page
Set a group name and select AWSElasticBeanstalkFullAccess policy.
Create the group so it's assigned to your new user.
Review and create user.

Add the created user's access and secret to the environment variables in CircleCi.
###

At this stage your application should build and deploy to ElasticBeanstalk but will not work. All you need is a .env file.
```
cp .env.example .env
```
Commit this into your repository and the build will succeed and deploy to your AWS instance. Alternatives to this is ssh'ing onto your instance and manually adding the .env file.
