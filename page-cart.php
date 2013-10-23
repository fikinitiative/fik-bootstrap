<?php get_header(); ?>
			
			<div id="content" class="row">	
				<div id="main" class="col-md-8" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //We call content-fik_cart.php to render our cart ?>
					<?php get_template_part( 'content', 'fik_cart' ); ?>

					<?php // comments_template( '', true ); No comments in the cart page! ?>

				<?php endwhile; // end of the loop. ?>
				</div> <!-- end #main -->
    
				<?php get_sidebar( 'cart' ); // Cart page sidebar ?>
			</div> <!-- end #content -->

<?php get_footer(); ?>