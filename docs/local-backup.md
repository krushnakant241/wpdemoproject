# Take a Local Backup

This documentation describes the process for taking a backup of the local
development environment.

## Full Backup

From the root of your project (and with the docker containers running), run the
following command:

`bash ./bin/backup.sh`

This will create a zip containing your local database, as well as the entire
`wordpress/public_html` directory, and output it to the `backup` directory.

The backup file will be named `backup-<timestamp>.zip`.

## Database-only Backup

To take a backup of just your local database, you can run the command:

`bash ./bin/backup-database.sh`

This will create a dump of your local database, saving it to a file named
`database.sql` in the `backup` directory.

## TODO

Add functionality to allow developers to specify a rewrite value, to be used
when deploying your local environment to a server. Something along the lines
of:

`bash ./bin/backup.sh --url https://smithbrothersmedia.com.au`

which will rewrite all the urls in the database to the above url before
creating the backup (and set the urls back to `localhost` after the backup).

