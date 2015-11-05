<?php
/**
 * Template Name: Campaign Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/campaign', 'page'); ?>
<?php endwhile; ?>
