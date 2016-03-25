<?php
/*
Template Name: Archives
*/
 ?>

<div id="container">
	<div id="content" role="main">
        <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
        </div>
        <p> <?php single_tag_title(); ?></p>
        
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <!-- <?php get_search_form(); ?> -->
        
<?php endif; ?>

<?php
    $args = array( 'post_type' => array( 'post' ));
    $loop = new WP_Query( $args );
?>

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
  
  <div class="row">
        <div class="media-left hidden-xs">
            <a class="frontpagepostpic" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail() ?>
            </a>
        </div>
        <div class="media-body">
            <a class="strong" href="<?php the_permalink(); ?>">
               <h3 class="noborder"> <?php the_title(); ?></h3></a>
              </a>
              <p class="small">
                <h4 class="noborder"><?php echo get_the_date( 'Y-m-d' ); ?></h4>
            <?php the_excerpt(); ?></p>
        </div>
    </div>
	
	<hr/>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>

		

	</div><!-- #content -->
</div><!-- #container -->
