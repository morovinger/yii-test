#!/bin/bash
set -e

# Wait for MySQL to be ready
echo "Waiting for MySQL to start..."
maxTries=10
while [ $maxTries -gt 0 ] && ! mysql -h"$DB_HOST" -u"$DB_USER" -p"$DB_PASSWORD" -e "SELECT 1" >/dev/null 2>&1; do
    sleep 3
    echo "Retrying MySQL connection..."
    maxTries=$(($maxTries - 1))
done

if [ $maxTries -eq 0 ]; then
    echo "Could not connect to MySQL. Exiting."
    exit 1
fi

echo "MySQL is up and running!"

# Set permissions
echo "Setting permissions..."
chown -R www-data:www-data /app/runtime /app/web/assets

# Run migrations
echo "Running migrations..."
php /app/yii migrate --interactive=0

# Start Apache in foreground
echo "Starting Apache..."
exec apache2-foreground 