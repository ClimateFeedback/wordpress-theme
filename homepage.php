<?php
/*
Template Name: Homepage
*/
?>

</div><!-- / .row -->
</div><!-- / .container -->

<div class="sigla jumbotron">
	<div class="container">
	  <div class="row">
	    <h1>CLIMATE FEEDBACK </h1>
	    <p class="testo">Scientific feedback for Climate Change information online</p>
	    <p><a href="for-scientists/" class="btn btn-primary btn-lg">Scientist sign up page</a></p>
      </div>
	</div>
</div>

<div class="container">
    <div class="row section">             
        <div class="col-lg-3">
            <p class="quote">feedback (noun):<br />"Constructive response to a product, work or performance, provided to encourage improvement."</p>
        </div>	
        <div class="col-lg-9">
            <h3>THE ISSUE TO ADDRESS</h3>
            <p> The accuracy of climate change journalism and commentary can be distorted by an author’s ideology, conflicts of interest, or simple misunderstandings. Non-expert readers can find it difficult to determine whether specific information is grounded in scientific fact. </p>
                    
            <h3>OUR GOAL</h3>
            <p>Our goal is to improve the scientific accuracy of climate change coverage, by presenting feedback from accredited scientists directly alongside original online texts.</p>
        </div>
    </div>

    <div class="row section">
        <!-- PROCESS --> 
        <h2>HOW WE'LL PROCEED</h2>
        <div class="col-lg-3">
        	<img class="fig" alt="Picture showing hypothesis annotation on a page." src="http://climatefeedback.org/img/h_ex.png" /> 
        </div>
        <div class="col-lg-9">
	        <h3>WEB ANNOTATION...</h3>
	        <p><a href="https://hypothes.is" target="_blank">Hypothes.is</a> is a new web browser plug-in that allows anyone to annotate information presented on the Internet (see figure below).</p>
			
			<h3>... BY SCIENTISTS</h3>
	        <p>Climate scientists will use Hypothes.is to annotate target articles sentence by sentence, evaluating their accuracy based on the best available thinking in climate science.</p>
	    </div>

        <img alt="A daily mail article annotated by scientists." src="http://climatefeedback.org/img/cherry.png" class="fig" />
    	<p class="caption"> Screenshot illustrating a possible use of the Hypothes.is annotator. Here a scientist added a comment and a link to a scientific publication.</p>
   	</div>

    <div class="row section">
	    <!-- OUTCOME --> 
	    <h2>WHY THIS PROJECT?</h2> 
	    
	    <h3>CONTEXT</h3>
	    <p> We are now at a crucial time in history, when we must make critical decisions about climate action. The availability of accurate information is essential to choosing the right path. </p>

	    <h3>EXPECTED BENEFITS</h3>
	    <p>The annotation process provides authors with feedback that will encourage them to improve the scientific rigor of their writing.   Our project will also increase awareness and understanding of climate issues, promote scientific reasoning and make scientific information and resources more accessible to general readers.  
	    </p>
    </div>

    <div class="row section">
        <!-- News --> 
        <h2>NEWS</h2>
        <?php 
            $args = array( 
                'post_type' => array( 'post', 'evaluation', 'press' ),
                'posts_per_page' => 5 );
            $loop = new WP_Query( $args );
        ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <article>
                <header>
                <?php if ( 'press' == get_post_type() ) : ?>
                    <h3>
                        <a href="<?php $key_1_value = get_post_meta( get_the_ID(), 'link', true );
                            if( ! empty( $key_1_value ) ) { echo $key_1_value; } ?>"><?php the_title(); ?>
                        </a>
                    </h3>
                <?php endif; ?>
                <?php if ( 'press' != get_post_type() ) : ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php endif; ?>
                </header>
                <div class="media-left hidden-xs">
                    <a class="postpic" href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail() ?>
                    </a>
                </div>
                <div class="media-body">
                    <?php the_excerpt(); ?>
                </div>
            </article> 
        <?php endwhile; ?>
        <?php the_posts_navigation(); ?>
    </div>
</div>

