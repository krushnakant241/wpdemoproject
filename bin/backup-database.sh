#!/usr/bin/env bash

## Take a backup of the local database, and export it to the `backup` directory
## on the host machine.

docker exec -it $(docker-compose ps -q db) /bin/sh -c '/usr/bin/mysqldump "$MYSQL_DATABASE" -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" > /backup/database.sql 2> /dev/null'
