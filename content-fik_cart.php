<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
  
  <header>
  
    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
    
    <div class="page-header"><h1 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
      
  </header> <!-- end article header -->

  <section class="cart_content clearfix">
    <?php the_fik_checkout(); ?>
  </section> <!-- end article section -->
  

</article> <!-- end article -->