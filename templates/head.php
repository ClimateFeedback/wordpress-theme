<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--    twitter   
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ClimateFdbk">
    
    <meta name="twitter:title" content="<?php the_title(); ?>">
    <meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>">
 -->
    <meta name="twitter:creator" content="@ClimateFdbk">
      
<!--    facebook   
    <meta property="og:url"                content="<?php the_permalink(); ?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?php the_title(); ?>" />
    <meta property="og:description"        content="<?php echo get_the_excerpt(); ?>" />
 -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
    <script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-55053509-1', 'auto');
		ga('send', 'pageview');
    </script>
<!-- Facebook Pixel Code -->
      <script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '255566284802542');
fbq('track', "PageView");
      </script>
      <noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=255566284802542&ev=PageView&noscript=1"
/>
      </noscript>
<!-- End Facebook Pixel Code -->
  </head>
