#!/usr/bin/env bash

### Take a backup of the local development environment, and place it in the
### `backup/` directory of the project. The backup file will be name
### `backup-<timestamp>`, and will contain the following internal structure:
### - database.sql (export of the local database)
### - public_html/ (the entire public directory for the project)
###
### This script is expected to be run from the project root. i.e:
###   `bash ./bin/backup.sh`

# initialise variables used in the process.
backup_timestamp="$(date +"%Y-%m-%dT%H-%M-%S")"
backup_current_directory="$(pwd)"
backup_output_directory="${backup_current_directory}/backup"

public_html="${backup_current_directory}/wordpress/public_html"

# create and record the temporary directory where we will do our work.
backup_directory="$(mktemp -d)"

# create the output directory, if it doesn't already exist.
mkdir -p "$backup_output_directory"

echo compiling website assets...

# backup the database
bash ./bin/backup-database.sh
mv "$backup_output_directory/database.sql" "$backup_directory"

# symlink the HTML directory, so it's included in the zip
ln -s "$public_html" "$backup_directory/public_html"

# zip the contents of the directory
echo compressing website assets...
cd "$backup_directory"
zip -r "$backup_output_directory/backup-$backup_timestamp.zip" . > /dev/null
cd "$backup_current_directory"

# remove the temporary directory
rm -rf "$backup_directory"

