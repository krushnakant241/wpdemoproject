# Deployment - cPanel

Deploying our website builds to cPanel servers is the recommended/default way
that our websites be hosted. This guide specifies how to configure the
repository to deploy to a cPanel server.

At the moment, it is recommended that the semi-automated cPanel deployments
only be used for staging sites, and that production deployments are done
manually until the process is improved to a level that could be used on
production builds.

## First-time Setup

**Work in Progress**

- [Take a local backup](local-backup.md)
- Deploy the full installation onto cPanel **(TODO)**

## Semi-Automated cPanel Deployments

Once we have the website running on a remote cPanel server, we can setup a
semi-automated process for deploying new code changes to cPanel. The following
dot-points outline the key steps.

### Setup/Configuration

- Make note of the directory that the WordPress installation is running out of.
This is usually something along the lines of `/home/<cpanel-user>/public_html`,
but you can confirm it by locating the `wp-config.php` file.
- Edit the `.cpanel.yml` file at the root of the repository, setting the
**BASEPATH** variable to the WordPress directory (without a trailing slash).
    - If your code uses a different theme directory than the default
    (**theme**), then you can also set the **THEMENAME** variable to match that
    directory.
- Commit this change, and push it to the bitbucket repository.
- Within cPanel, navigate to **Security > SSH Access** and click **Manage SSH
Keys**.
    - If the cPanel server does not already have a key listed under the
    **Public Keys** section, you will need to generate a new one.
- To generate SSH Keys within cPanel:
    - **Note:** Do not use the key generator within the cPanel interface. This
    requires that you give the key a password, which is incompatible with git
    deployments
    - using the **Terminal** feature within cPanel, run the command
    `ssh-keygen`, and accept the default parameters of the command:
        - key file should be ~/.ssh/id_rsa`
        - no passphrase on keyfile.
    - Once generated, navigate back to the **Security > SSH Access** section
    and continue with this guide.
- Click the **View/Download** Action link to view the public key. Select the
entire key, and copy it to your clipboard.
- Navigate to the repository within BitBucket, and click **Respository
Settings** in the left-hand sidemenu.
- Within this page, select **Access Keys** under the General menu, and add the
Public Key of the cPanel server to the BitBucket repository. Make sure to give
it an easily identifiable name (SBMClient cPanel, for example).
- Return to the "home page" for the repository on BitBucket, and click the
**Clone** button in the top right. Copy the clone command, but only the url
part (the part that starts with `git@bitbucket.org...`).
- Back in cPanel, navigate to **Files > Git Version Control** page, and select
**Create** in the top-right of the page. Paste in the clone url you copied from
BitBucket. The rest of the fields should pre-fill based on the url, and you
should accept those defaults.
    - This will trigger cPanel to connect to BitBucket and do an initial `pull`
    of all your code into cPanel
- Once the pull is complete, click **Manage**.
    - The **Basic Information** tab allows you to select the git branch that
    code will be deployed from, but 99% of the time you'll be deploying from
    the `master` branch and won't need to touch this.
    - The **Pull or Deploy** tab is where you can trigger cPanel to pull the
    latest code from BitBucket, and then deploy that code to your website.

### Development Cycle

Once all the above is setup, future development changes follow this basic
cycle:

- Make and test changes locally in Docker.
- Once your happy, commit those changes and push them to BitBucket.
- Within cPanel, naviate to **Files > Git Version Control** and select your
project.
- Navigate to the **Pull or Deploy** tab, and click **Update from Remote**
to pull in the latest changes from BitBucket.
    - Sometimes, the Update command times out or fails. This is frustrating,
    but you just need to click it again (and again) until it works. **TODO:**
    Correct this situation so it doesn't fail.
- Once the update is successful, click **Deploy HEAD Commit** to deploy the
latest version of the source code *into* the website.

**Note:** The code pulled from Git into cPanel is not active on the site until
you have clicked the **Deploy HEAD Commit**.

## TODO:

- Explain how to rollback a deployment if things go wrong.

