<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">
				
					<div class="page-header">
					<?php if (is_category()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Products Categorized:", "fikstores"); ?></span> <?php single_cat_title(); ?>
						</h1>
					<?php } elseif (is_tag()) { ?> 
						<h1 class="archive_title h2">
							<span><?php _e("Products Tagged:", "fikstores"); ?></span> <?php single_tag_title(); ?>
						</h1>
					<?php } elseif (is_author()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Products By:", "fikstores"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h1>
					<?php } elseif (is_day()) { ?>
						<h1 class="archive_title h2">
							<span><?php _e("Products Daily Archives:", "fikstores"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h1>
					<?php } elseif (is_month()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Products Monthly Archives:", "fikstores"); ?>:</span> <?php the_time('F Y'); ?>
					    </h1>
					<?php } elseif (is_year()) { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e("Products Yearly Archives:", "fikstores"); ?>:</span> <?php the_time('Y'); ?>
					    </h1>
					<?php } else { ?>
					    <h1 class="archive_title h2">
					    	<span><?php _e('All products in the store', 'twentytwelve') ?></span>
					    </h1>
					<?php } ?>
					</div>

					<?php if (have_posts()) : ?>
					<ul class="products thumbnails">

					<?php while (have_posts()) : the_post(); ?>
					<li id="product-<?php the_ID(); ?>" <?php post_class('span3 prod-thumb-span3-sq'); ?> role="product">
  						<?php if (has_post_thumbnail()) : ?>
  						<div class="product-img">
    						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="thumbnail"><?php the_post_thumbnail('post-thumbnail'); ?></a>
  						</div>
  						<?php endif; ?>

  						<dl class="product-info">
    						<dt class="product-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" itemprop="name"><?php the_title(); ?></a></dt>
    						<dd class="product-price"><a class="pricetag" href="<?php the_permalink() ?>"><?php the_fik_price(); ?></a></dd>
  						</dl>
					</li>
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>

					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "fikstores")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "fikstores")) ?></li>
							</ul>
						</nav>
					<?php } ?>
								
					</ul>
					<?php else : ?>
					
					<article id="product-not-found">
					    <header>
					    	<h1><?php _e('We have no products in this section! Sorry for the inconvenience', 'fikstores'); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, What you were looking for is not here.", "fikstores"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar('archive'); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>