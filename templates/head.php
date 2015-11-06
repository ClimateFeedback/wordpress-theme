<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    twitter    -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ClimateFdbk">
    <meta name="twitter:creator" content="@ClimateFdbk">
    <meta name="twitter:title" content="<?php the_title(); ?>">
    <meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>">
    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
    <meta name="twitter:image" content="<?php echo $url; ?>">
<!--    facebook    -->
    <meta property="og:url"                content="<?php the_permalink(); ?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?php the_title(); ?>" />
    <meta property="og:description"        content="<?php echo get_the_excerpt(); ?>" />
    <meta property="og:image"              content="<?php echo $url; ?>" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
    <script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-55053509-1', 'auto');
		ga('send', 'pageview');
    </script>
  </head>
