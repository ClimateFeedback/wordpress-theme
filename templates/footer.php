<footer class="content-info" role="contentinfo">
  <div class="container">
	<div class="row">
	  	<h2>climate feedback is <a href="">a scientific experiment...</a></h2>
	  	<hr/>
	  	<div class="col-sm-3">
	  		<h4>HOSTED BY</h4>
	  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ucmerced.jpg" class="sponser">
	  		<p class="small">The Center for Climate Communication at the University of California, Merced</p>
	  	</div>
	  	<div class="col-sm-3">
	  		<h4>SUPPORTED BY</h4>
	  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/citris.jpg" class="sponser" style="float:left; margin-right:1em;">
	  		<p class="small"><a href="">The Center for Information Technology Research in the Interest of Society (CITRIS)</a></p>
	  		<p class="small"><a href="">Data and Democracy seed grant #2015-313</a></p>
	  		<p class="small"><a href="">Generous support from private donors. Make a tax-deductible contribution today</a>.</p>
	  		</ul>
	  	</div>
	  	<div class="col-sm-3">
	  		<h4>IN PARTNERSHIP WITH</h4>
	  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/csrrt.jpg" class="sponser">
	  		<p class="small">Climate Science Rapid Response Team (CSRRT)</p>
	  	</div>
	  	<div class="col-sm-3">
	  		<h4>LINKS</h4>
	  		<?php dynamic_sidebar('sidebar-footer'); ?>
	    	<?php wp_nav_menu( array('container_class' => 'menu-footer', 'menu_class' => 'nav navbar-nav', 'theme_location' => 'secondary_navigation') ); ?>
			<h4 style="margin-top:4em;">CONTACT US</h4>
			<p class="small">Climate Feedback · Sierra Nevada Research Institute · 5200 N. Lake Road · Merced, CA 95343 · USA</p>
			<p class="small"><a href="mailto:feedback@climatefeedback.org">feedback@climatefeedback.org</a></p>  	
	  	</div>
  	</div>
  </div>
</footer>
