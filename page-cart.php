<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //We call content-fik_cart.php to render our cart ?>
					<?php get_template_part( 'content', 'fik_cart' ); ?>

					<?php // comments_template( '', true ); No comments in the cart page! ?>

				<?php endwhile; // end of the loop. ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>