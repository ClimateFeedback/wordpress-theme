<footer class="content-info">
  <div class="container">
	<div class="row">
	  	<hr/>
	  	<h2>climate feedback is <a href="">a scientific experiment...</a></h2>
	  	<div class="col-lg-3">
	  		<h3>HOSTED BY</h3>
	  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ucmerced.jpg">
	  		<p>The Center for Climate Communication at the University of California, Merced</p>
	  	</div>
	  	<div class="col-lg-3">
	  		<h3>SUPPORTED BY</h3>
	  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/citris.jpg">
	  		<ul>
	  			<li><a href="">The Center for Information Technology Research in the Interest of Society (CITRIS)</a></li>
	  			<li><a href="">Data and Democracy seed grant #2015-313</a></li>
	  			<li><a href="">Generous support from private donors. Make a tax-deductible contribution today</a>.</li>
	  		</ul>
	  	</div>
	  	<div class="col-lg-3">
	  		<h3>IN PARTNERSHIP WITH</h3>
	  		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/csrrt.jpg">
	  		<p>Climate Science Rapid Response Team (CSRRT)</p>
	  	</div>
	  	<div class="col-lg-3">
	  		<h3>LINKS</h3>
	  		<?php dynamic_sidebar('sidebar-footer'); ?>
	    	<?php wp_nav_menu( array('container_class' => 'menu-footer', 'menu_class' => 'nav navbar-nav', 'theme_location' => 'secondary_navigation') ); ?>
			<h3>CONTACT US</h3>
			<p>Climate Feedback · Sierra Nevada Research Institute · 5200 N. Lake Road · Merced, CA 95343 · USA</p>
			<p><a href="mailto:feedback@climatefeedback.org">feedback@climatefeedback.org</a></p>  	
	  	</div>
  	</div>
  </div>
</footer>
