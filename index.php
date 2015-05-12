<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php 
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	$hypothesis = get_user_meta( $curauth->get('ID'), 'hypothesis', true );
	$orchid = get_user_meta( $curauth->get('ID'), 'orchid', true );
	print_r( $hypothesis );
   	echo get_avatar( $curauth->get('ID'), $size = '96', $default = '<path_to_url>' );
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
