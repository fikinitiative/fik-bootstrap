<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
				<div class="span12">
                    <div class="entry-categories"><?php the_breadcrumb(true); // true if only one category or store section needed        ?></div>
                </div>

                 <div class="page-header span12"><h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" itemprop="name"><?php the_title(); ?></a></h1></div>

			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="product-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/Product" <?php post_class(); ?>>
					
						<section class="post_content clearfix">
							<?php get_template_part('content', 'fik_product'); ?>
					
						</section> <!-- end article section -->

						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Edit post","bonestheme"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
				</div> <!-- end #main -->
				<?php get_sidebar('product'); // product sidebar ?>

				<footer>
				    <p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', ''); ?></p>
  				</footer> <!-- end article footer -->

				<section role="navigation">
        			<div class="container">
           				<div class="row">
               				<div class="span12">
                   				<ul class="pager">
                       				<li class="previous">
                            			<?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous product link', 'twentytwelve') . '</span> %title'); ?>
                        			</li>
                        			<li class="next">
                            			<?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next product link', 'twentytwelve') . '</span>'); ?>
                        			</li>
                    			</ul>
                			</div>
            			</div>
        			</div>
    			</section>
					
				<?php //comments_template('',true); //No comments on products for now ?>
					
				<?php endwhile; ?>			
					
				<?php else : ?>
					<div id="main" class="span8 clearfix" role="main">
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>

					</div> <!-- end #main -->
					
				<?php endif; ?>

			</div> <!-- end #content -->

<?php get_footer(); ?>