
## Installing Drutiny

I would recommend installing as a standalone package using the command:

`composer create-project --no-interaction --prefer-source -s dev drutiny/project-dev drutiny-dev`

## Creating Drush aliases

For Drutiny to connect and audit a site it uses SSH and Drush aliases. If you don't have Drush installed locally please view the install instructions at [https://www.drush.org/](https://www.drush.org/)

Within the .drush directory of your user home directory you will need to create an alias file (sitename.site.yml) for each site. These YAML files use the following structure:

```
<alias>
  host: <SSH host>
  root: <drupal absolute path>
  uri: <drupal site url>
````

Each site file can have multiple aliases defined, usually one for each environment.

e.g. nidirect.site.yml

```
prod:
  host: ###########--nidirect@ssh.uk-1.platform.sh
  root: /app/drupal_site
  uri: https://##########.uk-1.platformsh.site/
dev:
  host: ###########-dev--nidirect@ssh.uk-1.platform.sh
  root: /app/drupal_site
  uri: https://##########-dev.uk-1.platformsh.site/
```

## Using Drutiny

From within the drutiny directory run the shell command

`./bin/drutiny`

This will display a list of commands available.

The most important of these for running site audits are Policies and Profiles.  
* Policies are individual checks which leverage Audit classes to run a certain Drush or Shell command.
* Profiles are lists of policies and configuration for generating reports. 


### Policies

To view a list of available policies run the _policy:list_ command.  
An individual policy can be run using the _policy:audit_ command. 

e.g. To check that the Devel module is disabled on our NIDirect dev drush alias we would run:

`./bin/drutiny policy:audit Drupal-8:DevelDisabled @nidirect.dev`

### Profiles

To view a list of available policies run the _profile:list_ command.  
A profile can be run using the _profile:run_ command. 

e.g. To run the Drupal 8 security review profile on our NIDirect dev drush alias we would run:

`./bin/drutiny profile:run d8_security_review @nidirect.dev`

