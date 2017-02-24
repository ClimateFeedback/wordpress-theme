# Climate Feedback Wordpress

## Install

1. Download a wordpress boilerplate [here](https://wordpress.org/)

2. Use [MAMP](https://www.mamp.info/en/) and don't forget to start Start Servers at each new use.

3. Install the [Climate Feedback wordpress-theme](https://github.com/ClimateFeedback/wordpress-theme):

```
cd wp-content/themes && git clone git@github.com:ClimateFeedback/wordpress-theme.git
```

In the admin, don't forget to activate the theme.

3. Install these Plugins in the wp-content/plugins

  [Database Sync](https://wordpress.org/plugins/database-sync/developers/)
  [Media Library Plus](https://wordpress.org/plugins/media-library-plus/)
  [Claim-Reviews](https://github.com/ClimateFeedback/Claim-Reviews)
  [Evaluation_Plugin](https://github.com/ClimateFeedback/Evaluation_Plugin)
  [Toolset Types](https://wordpress.org/plugins/types/)
  [People](https://github.com/ClimateFeedback/people)

4. Synchronize with the database of the prod website

  - Make sure you have activate the Database Sync plugin.
  - Go to Settings/Database Sync and copy paste the token found [there](http://climatefeedback.org/wp-admin/tools.php?page=dbs_options)
  - Press the Sync button and then the Pull button

N.B.: Make sure that Emmanuel made you admin if you want to have access to the Media Library and Page editing rights.

5. Synchronize your media library:

Make sure first that you generated an ssh key for that
```
gcloud compute --project "climatefeedback-web" ssh --zone "us-central1-f" "wordpress-4j1a"
```

Inside your wordpress folder, gcloud compute copy-files
```
mkdir -p uploads
gcloud compute copy-files wordpress-4j1a:../../wordpress/wp-content/uploads/tags ./uploads/tags --zone "us-central1-f"
gcloud compute copy-files wordpress-4j1a:../../wordpress/wp-content/uploads/2017 ./uploads/2017 --zone "us-central1-f"
gcloud compute copy-files wordpress-4j1a:../../wordpress/wp-content/uploads/2016 ./uploads/2016 --zone "us-central1-f"
rsync -av ./uploads ./wp-content
```
