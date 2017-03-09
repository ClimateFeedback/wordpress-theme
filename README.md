# Climate Feedback Wordpress Theme

## Install a Wordpress app first

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

6. Use the WP Rest API
Available with Wordpress 7.3 !
Get your post with the route
```
/wp-json/wp/v2/posts
```
NOTE: maybe you injected some plugins that disabled this kind of permalink to work (then you see an automatic redirect to the main page instead), in that case you have just to go
in the wp-admin interface Settings/Permalinks and refresh
permalinks to Post Type.

Now if you want to add some custom posts in the rest api,
follow these [rules](http://v2.wp-api.org/extending/custom-content-types/)

## Develop the wordpress theme

Made with [Sage](https://roots.io/sage/)

### Requirements

| Prerequisite    | How to check | How to install
| --------------- | ------------ | ------------- |
| PHP >= 5.4.x    | `php -v`     | [php.net](http://php.net/manual/en/install.php) |
| Node.js 0.12.x  | `node -v`    | [nodejs.org](http://nodejs.org/) |
| gulp >= 3.8.10  | `gulp -v`    | `npm install -g gulp` |
| Bower >= 1.3.12 | `bower -v`   | `npm install -g bower` |

For more installation notes, refer to the [Install gulp and Bower](#install-gulp-and-bower) section in this document.

### Features

* [gulp](http://gulpjs.com/) build script that compiles both Sass and Less, checks for JavaScript errors, optimizes images, and concatenates and minifies files
* [BrowserSync](http://www.browsersync.io/) for keeping multiple browsers and devices synchronized while testing, along with injecting updated CSS and JS into your browser while you're developing
* [Bower](http://bower.io/) for front-end package management
* [asset-builder](https://github.com/austinpray/asset-builder) for the JSON file based asset pipeline
* [Sass](https://github.com/twbs/bootstrap-sass) [Bootstrap](http://getbootstrap.com/)
* [Theme wrapper](https://roots.io/sage/docs/theme-wrapper/)
* ARIA roles and microformats
* Posts use the [hNews](http://microformats.org/wiki/hnews) microformat
* [Multilingual ready](https://roots.io/wpml/) and over 30 available [community translations](https://github.com/roots/sage-translations)

### Configuration

Edit `lib/config.php` to enable or disable theme features

Edit `lib/init.php` to setup navigation menus, post thumbnail sizes, post formats, and sidebars.

### Theme development

Sage uses [gulp](http://gulpjs.com/) as its build system and [Bower](http://bower.io/) to manage front-end packages.

#### Install gulp and Bower

Building the theme requires [node.js](http://nodejs.org/download/). We recommend you update to the latest version of npm: `npm install -g npm@latest`.

From the command line:

1. Install [gulp](http://gulpjs.com) and [Bower](http://bower.io/) globally with `npm install -g gulp bower`
2. Navigate to the theme directory, then run `npm install`
3. Run `bower install`

You now have all the necessary dependencies to run the build process.

### Available gulp commands

* `gulp` — Compile and optimize the files in your assets directory
* `gulp watch` — Compile assets when file changes are made
* `gulp --production` — Compile assets for production (no source maps).

### Using BrowserSync

To use BrowserSync during `gulp watch` you need to update `devUrl` at the bottom of `assets/manifest.json` to reflect your local development hostname.

For example, if your local development URL is `http://project-name.dev` you would update the file to read:
```json
...
  "config": {
    "devUrl": "http://project-name.dev"
  }
...
```
If your local development URL looks like `http://localhost:8888/project-name/` you would update the file to read:
```json
...
  "config": {
    "devUrl": "http://localhost:8888/project-name/"
  }
...
```

## Tips

If you want a quick screenshot on the fly based on a url
```
<img
  class="fact-check-card__row__verdict__img"
  src="http://s.wordpress.com/mshots/v1/<?php echo get_post_meta( get_the_ID(), 'link', true)?>?w=400&h=400"
/>
```
