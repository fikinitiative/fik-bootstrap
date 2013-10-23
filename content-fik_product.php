<?php if (is_single()) : // Only display product excerpt for home, archive page, store section and search           ?>

<article id="product-<?php the_ID(); ?>" <?php post_class(''); ?> role="product">
  <header>
   

    <?php if (has_post_thumbnail()) : ?>
      <div class="product-image">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('post-thumbnail'); ?></a>
      </div>

      <div class="product-gallery">
        <?php // this function outputs a <ul> with class="product-image-thumbnails" where each <li> is a thumbnil that links to a bigger image (sizes specified in function). 
              // We also pass the size of the zoom image which url and size are returned as data attributes of the img. The last 2 sizes are the max width of the video thumbnail and the max width of a video embed
              the_product_gallery_thumbnails(array(64, 64), 'post-thumbnail', 'fikheader', 64, 620, FALSE);
        ?>
      </div>
      <?php endif; ?>

  </header> <!-- end article header -->

  <section class="post_content">
    <?php the_content( __("Read more &raquo;","fikstores") ); ?>
  </section> <!-- end article section -->


</article> <!-- end article -->

<?php else: ?>

<li id="product-<?php the_ID(); ?>" <?php post_class('col-md-3'); ?> role="product">
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
<!-- end item -->


<?php endif; ?>
