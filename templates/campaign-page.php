
<div class="campaign-inner">
  <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' )); ?>
  <div class="support">
    <h1><?php the_title(); ?></h1>
  </div>
  <div class="content">
    <?php the_content(); ?>
<!--    <div class="progress">-->
<!--      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">-->
<!--        <span class="sr-only">60% Complete</span>-->
<!--      </div>-->
<!--    </div>-->
    <div class="row">
      <div class="col-xs-4 col-md-4 step">
        <h4><b>1. Share on Facebook</b></h4>
        <a href="https://www.facebook.com/sharer/sharer.php?u=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage" title="Share on Facebook" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
          <i class="fa fa-facebook fa-3x"></i>
        </a>
      </div>
      <div class="col-xs-4 col-md-4 step">
        <h4><b>2. Share on Twitter</b></h4>
        <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
          <i class="fa fa-twitter fa-3x"></i>
        </a>
      </div>
      <div class="col-xs-4 col-md-4 step">
        <h4><b>3. Back us</b></h4>
        <a href="http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage/" target="_blank">
          <img src="<?php echo get_bloginfo('template_url'); ?>/img/backus-icon.png" alt="" class="backus-icon"/>
        </a>
      </div>
    </div>
    <div class="row bottom-social">
      <div class="text-center">
          <b class="">or share on other media</b>
          <a href="//www.reddit.com/submit?url=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-reddit"></i>
          </a>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage&source=LinkedIn" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-linkedin"></i>
          </a>
          <a href="https://plus.google.com/share?url=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-google-plus"></i>
          </a>
          <a href="http://pinterest.com/pin/create/button/?url=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>&description=<?php $mykey_values = get_post_custom_values( 'excerpt' );
          foreach ( $mykey_values as $value ) {
            echo $value;
          } ?>"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-pinterest-p"></i>
          </a>
          <a href="http://tumblr.com/widgets/share/tool?canonicalUrl=http://tilt.climatefeedback.org/bringing-the-voice-of-science-back-into-climate-change-media-coverage"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <i class="fa fa-tumblr"></i>
          </a>
      </div>
    </div>
  </div>
</div>
