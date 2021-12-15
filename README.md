# EKO ENERGY
## Project Notes

user: sbm-admin
pass: x1B*0JPU21R3fmXAQI

cpanel
https://139.180.181.226:2083/
domain: trams.sbmclient.com
user: tramssbmclient
pass: trams.sbmclient.com

staging db
db: tramssbm_2021
user: tramssbm_user
pass: trams.sbmclient.com
# Local Development

## Resources

Forked from the [SBM Wordpress Boilerplate](https://bitbucket.org/sbmdev/sbm-wordpress-boilerplate/src/master/)

Visit [wp-boilerplate-examples](https://bitbucket.org/sbmdev/wordpress-docker-example-config) to see many number of example config.

Install `Docker` [https://docs.docker.com/docker-for-mac/install/](https://docs.docker.com/docker-for-mac/install/).

## Getting Started

### FIRST SETTING UP THE PROJECT

1.  Set the APP_Name: Open root `.env` file & set the `APP_NAME` and others if you want

    - `APP_NAME` must be a unique name, as it controls the names of the docker containers created by the project.
    - Keep the conventions for project as just the site name without domain unless there is a good reason not to e.g. `smithbrothersmedia.com.au` the app name would be `smithbrothersmedia`

2.  Generate new WP Salt values, and add them to the WP Configuration

    - Visit the [WP Salt generator](https://api.wordpress.org/secret-key/1.1/salt/)
      page, and copy the resulting salt values.
    - Copy the salt values into the WP Configuration file;
      `wordpress/public_html/wp-config.php`, replacing the default values
      present.

### FIRST RUN ON YOUR MACHINE

1.  Start docker: `docker-compose up` from project root

    - (add `-d` to leave running in the background)

2.  Install PHP dependencies

    - From the project root run `bash ./bin/php.sh`. This will connect to the
      running PHP container
    - Within the container, run `cd /var/www/html && composer install`.
    - Once the above command completes, run `exit` to disconnect from the
      container

3.  Run through the WordPress installer to finalise the installation.

    - In the browser, navigate to [http://localhost/](http://localhost/), which
      should display the WordPress Installation screen
    - Set an appropriate site title for your project.
    - If working on a client project, create a "Development Server" record in
      LastPass for the admin username+password generated during the installation

        * You should choose `sbm-admin` as the admin username.
        * You should use `developer@smithbrothersmedia.com.au` as the admin email

OR Import the database in backup.

6.  Once installation is complete, login to the WP Admin and perform the
    following steps:

    - Activate all the plugins that you care about (most noticably Advanced Custom Fields Pro)
    - activate the `Smith Brothers Media Default Theme` theme
    - under **Settings > Permalinks** change the settings to either `Post Name`
      or `Month and Name`, depending on whether you want to add the year/month
      structure to blog urls.

7.  Gulp runs on the docker image and will automatically compile styles + scripts and watch for changes. If it stops working, restart the container.

## Additional Resources

### Mailhog

[Mailhog](https://github.com/mailhog/MailHog) lets you catch sent emails. To
use `Mailhog` open "[http://localhost:8025](http://localhost:8025)".

To configure WordPress to send emails to MailHog, activate the `WP Mail SMTP`
plugin that's installed by default, navigate to **WP Mail SMTP > Settings** in
the WordPres Admin, and enter the following settings:

- Mailer: Other SMTP
- SMTP Host: smtp
- Encryption: None
- SMTP Port: 1025
- Auto TLS: Off
- Authentication: Off

Once these settings are saved, navigate next to the **Email Test** tab and send
a test email. If you open a new tab and navigate to http://localhost:8025, you
should receive the test email here.

### Config Notes

- default "/theme" theme is forced as the active theme ( default wp themes are ignored ).

# Common Issues

- [WORDPRESS] If your theme file is broken, the wp-config file might be in the base directory `\wp-config.php` instead of in `\wordpress\public_html\wp-config.php`

- [PHP / DOCKER] If you receieve the error `WARNING: The PHP_VERSION variable is not set. Defaulting to a blank string.` whilst running `docker-compose` chances are you aren't in the root of the project.

- [DOCKER] If you receive an error about a container already running (especially if the error contains `docker with name: example.com`) you need to stop other running containers.
  run `docker ls -a` to list all running containers, the run `docker stop {CONTAINER_ID}` using the id from the list from the previous command.

- [DOCKER] To stop all containers, type `docker container stop $(docker container ls -aq)`.

- [DOCKER] To remove all containers and their volumes, type `docker container rm $(docker container ls -aq)`.

- [DOCKER] To remove all detached containers and their volumes, type `docker system prune --volumes`.

- [DOCKER] To restart a single or specific docker containers / service run `docker-compose build --no-cache <service name e.g. node, php, mysql` 

- [COMPOSER] if you get an error around not being able to un-zip a package, it is possible that the remote repo is down, or the subscription licence has ended. Check the composer package detail and test any package urls in your browser for response data.

# Deployment

- [cPanel deployment](docs/deployment-cpanel.md)

# Further Documentation

- [Take a local backup](docs/local-backup.md)

