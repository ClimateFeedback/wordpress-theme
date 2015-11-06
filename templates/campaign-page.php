<?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' )); ?>
<div class="campaign-inner">
  <div class="support">
    <h1><?php the_title(); ?></h1>
  </div>
  <div class="content">
    <p><?php the_content(); ?></p>
<!--    <div class="progress">-->
<!--      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 33%;">-->
<!--        <span class="sr-only">60% Complete</span>-->
<!--      </div>-->
<!--    </div>-->
    <div class="col-md-4 step">
      <h3>1. Share on Facebook</h3>
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
<!--      <a href="" title="" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook fa-3x"></i></a>-->
    </div>
    <div class="col-md-4 step">
      <h3>2. Share on Twitter</h3>
      <a href="http://twitter.com/home?status=<?php echo get_the_excerpt(); ?> <?php echo get_the_permalink(); ?>" title="Share on Twitter" target="_blank"><i class="fa fa-twitter fa-3x"></i></a>
    </div>
    <div class="col-md-4 step">
      <h3>3. Back us</h3>
      <a href="http://tilt.climatefeedback.org/" target="_blank">
        <span><i class="fa fa-globe fa-3x"></i></span>
      </a>
    </div>
  </div>
</div>
