# Yii 2 Basic Project Template with Docker

This is a Yii 2 Basic Project Template enhanced with Docker support. It allows you to quickly set up a development environment with Docker.

## Features

- Yii 2 Basic Application
- Docker setup with PHP 7.4, Apache, MySQL 8.0, and phpMyAdmin
- User registration and authentication
- Clean URL structure

## Directory Structure

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      docker/             contains Docker-specific configuration files
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

## Requirements

- Docker and Docker Compose
- Git

## Installation and Setup

### Clone the Repository

```bash
git clone <repository-url>
cd <project-directory>
```

### Start the Docker Environment

```bash
# Start all containers
docker-compose up -d

# Install composer dependencies (first time only)
docker-compose exec php composer install

# Apply migrations
docker-compose exec php php yii migrate --interactive=0
```

### Access the Application

- **Web Application**: http://localhost:8080/
- **phpMyAdmin**: http://localhost:8081/ (Server: mysql, Username: yii2user, Password: yii2password)

## Database Configuration

The database configuration is already set up for Docker in `config/db.php`. It uses the following environment variables which are set in the docker-compose.yml file:

- DB_HOST: mysql (Docker service name)
- DB_NAME: yii2_basic
- DB_USER: yii2user
- DB_PASSWORD: yii2password

## Docker Commands

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f

# Rebuild containers
docker-compose up -d --build

# Run migrations
docker-compose exec php php yii migrate

# Create a user (example)
docker-compose exec php php yii create-user admin admin@example.com password123
```

## Customization

You can customize the Docker setup by modifying:

- `docker-compose.yml`: Main Docker Compose configuration
- `Dockerfile`: PHP image configuration
- `docker/apache-config.conf`: Apache configuration

## Testing

To run tests in the Docker environment:

```bash
docker-compose exec php php vendor/bin/codecept run
```

Yii 2 Basic Project Template is a skeleton [Yii 2](https://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

PHP 7.4 and using sqlite


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.
