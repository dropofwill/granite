granite
=======

A Composer based setup for Wordpress theme development, borrowing heavily from Bedrock.

### Composer Setup Explained 
**Section 1** (Name - Authors): Basic meta data and a GPL3 license

**Section 2 **(Config - Scripts): Prefer installing from a stable distrubution & add salts to the end of the .env file when finished installing.

**Section 3** (Repositories): Set up non-Packagist repos: WPackigist (a mirror of the wordpress plugins/themes) and a custom one for the WP core. This is where you would change WP versions.

**Section 4** (Require): All the dependencies for the project. This is where you would add plugins with their semantic version. Webroot-installer and composer installer help install WP Core, while dotenv allows us to store sensitive configs in a .env file from which we import into wp-config.

**Section 5** (Extras): Just set the directory structure up.
