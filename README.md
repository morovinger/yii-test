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
# Create a Folder 
docker-compose exec php chmod -R 777 /app/runtime /app/web/assets
```

## Customization

You can customize the Docker setup by modifying:

- `docker-compose.yml`: Main Docker Compose configuration
- `Dockerfile`: PHP image configuration
- `docker/apache-config.conf`: Apache configuration
