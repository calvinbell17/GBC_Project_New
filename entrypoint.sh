#!/bin/bash

# Retrieve the secret from AWS Secrets Manager
SECRET_JSON=$(aws secretsmanager get-secret-value --secret-id DB --query SecretString --output text)

# Check if the secret was retrieved successfully
if [ $? -ne 0 ] || [ -z "$SECRET_JSON" ]; then
  echo " Error: Failed to retrieve secret from AWS Secrets Manager"
  exit 1
fi

# Parse the secret JSON
export WORDPRESS_DB_HOST=$(echo "$SECRET_JSON" | jq -r .host)
export WORDPRESS_DB_USER=$(echo "$SECRET_JSON" | jq -r .username)
export WORDPRESS_DB_PASSWORD=$(echo "$SECRET_JSON" | jq -r .password)
export WORDPRESS_DB_NAME=$(echo "$SECRET_JSON" | jq -r .dbname)

# Validate values
if [ -z "$WORDPRESS_DB_HOST" ] || [ -z "$WORDPRESS_DB_USER" ] || [ -z "$WORDPRESS_DB_PASSWORD" ] || [ -z "$WORDPRESS_DB_NAME" ]; then
  echo " Error: One or more database credentials are missing."
  exit 1
fi

# Check DB connection
echo " Testing database connection..."
if ! mysql -h "$WORDPRESS_DB_HOST" -u "$WORDPRESS_DB_USER" -p"$WORDPRESS_DB_PASSWORD" "$WORDPRESS_DB_NAME" -e "exit"; then
  echo " Error: Unable to connect to database."
  exit 1
fi

# Generate wp-config.php if not present
if [ ! -f /var/www/html/wp-config.php ]; then
    echo "🛠️ Generating wp-config.php..."
    cp /var/www/html/wp-config-sample.php /var/www/html/wp-config.php
    sed -i "s/database_name_here/$WORDPRESS_DB_NAME/" /var/www/html/wp-config.php
    sed -i "s/username_here/$WORDPRESS_DB_USER/" /var/www/html/wp-config.php
    sed -i "s/password_here/$WORDPRESS_DB_PASSWORD/" /var/www/html/wp-config.php
    sed -i "s/localhost/$WORDPRESS_DB_HOST/" /var/www/html/wp-config.php

    # Set permissions
    chown www-data:www-data /var/www/html/wp-config.php
    chmod 640 /var/www/html/wp-config.php
fi


exec apache2-foreground