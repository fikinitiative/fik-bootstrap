<?php
/**
 * Template Name: Store Front Page Template
 *
 * Description: The store front page template displays the content of the static page that uses this template
 * followed by a selection of products that can be configured in the theme customization area
 * followed by the latest blog posts
 * 
 */
get_header();?>
<div id="content" class="row">
    <div id="main" class="col-md-12" role="main">


<?php
    $use_carousel = of_get_option('showhidden_slideroptions');
    if ($use_carousel) { ?>
    <div id="myCarousel" class="carousel slide">

<?php
        global $post;
        $tmp_post = $post;
        $show_posts = of_get_option('slider_options');
        $args = array( 'numberposts' => $show_posts ); // set this to how many posts you want in the carousel
        $myposts = get_posts( $args );
        $post_num = 0;
        $carouselIndicators = '';
        $carouselInner = '';

        foreach( $myposts as $post ) :  setup_postdata($post);
            if ($post_num == 0) {
                $carouselIndicatorsClass = ' class="active"';
                $carouselInnerClass ='item active';
            }else{
                $carouselIndicatorsClass = '';
                $carouselInnerClass ='item';
            }
            $carouselIndicators .= '<li data-target="#myCarousel" data-slide-to="' . $post_num . '"' . $carouselIndicatorsClass . '></li>';

            $post_num++;
            // what are theese for?
            $post_thumbnail_id = get_post_thumbnail_id();
            $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'fik-bootstrap-featured-carousel' );
var_dump($featured_src);

            $carouselInner .= '<div class="' . $carouselInnerClass . '">
            <a href="' . get_permalink() . '" rel="bookmark" title="' . get_the_title() .'">' . get_the_post_thumbnail( $post->ID, 'fik-bootstrap-featured-carousel' ) . '</a>
            <div class="container">
            <div class="carousel-caption">
            <h1>' . get_the_title() . '</h1>';
            $excerpt_length = 100; // length of excerpt to show (in characters)
            $the_excerpt = get_the_excerpt(); 
            if($the_excerpt != ""){
                $the_excerpt = substr( $the_excerpt, 0, $excerpt_length );
                $the_excerpt .= '... ';
                $carouselInner .= '<p>' . $the_excerpt . '</p>';
                $carouselInner .= '<p><a class="btn btn-large btn-primary" href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></p>';
             }


            $carouselInner .= '</div></div></div>';
        endforeach;
        $post = $tmp_post;
        ?>            




      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php echo $carouselIndicators; ?>
      </ol>

      <div class="carousel-inner">
        <?php echo $carouselInner; ?>     
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->


        <?php } // ends the if use carousel statement ?>


<?php

// Now we prepare the loop for the products that are displayed in the front page
$store_section = get_theme_mod('fik_home_section', '');
$product_amount = get_theme_mod('fik_home_product_amount', 10);

query_posts('post_type=fik_product&store-section=' . $store_section . '&posts_per_page=' . $product_amount);

if ($store_section != ''){
    $store_section_term = get_term_by('slug', $store_section, 'store-section');
    $store_section_link = get_term_link($store_section_term);
    $store_section_name = $store_section_term->name;
}else{
    $store_section_link = get_post_type_archive_link('fik_product');
    $store_section_name = __('Store', 'twentytwelve');
}

?>
        <div class="row products">
            <header>
                <h1><a href="<?php echo $store_section_link ; ?>" title="<?php echo $store_section_name ; ?>"><?php echo $store_section_name ; ?></a></h1>
            </header>
            <ul class="thumbnails text-center product-list">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'fik_product' ); ?>
            <?php endwhile; // end of the loop. ?>
            </ul>
        </div>
<?php
//if (get_option('show_on_front', true) == "page")
// Now we prepare the loop for the posts that are displayed in the front page
$blog_category = get_theme_mod('fik_home_category', '');
$post_amount = get_theme_mod('fik_home_post_amount', 2);
query_posts('post_type=post&category=' . $blog_category . '&posts_per_page=' . $post_amount);

$blog_title = __('Blog');

$blog_title = get_the_title(get_option('page_for_posts', true));
$blog_link = get_permalink(get_option('page_for_posts', true));

if ($blog_category != ''){
    $blog_category_term = get_term_by('slug', $blog_category, 'category');
    $blog_link = get_term_link($blog_category_term);
    $blog_name = $blog_category_term->name;
    $all_posts = __('See all posts', 'twentytwelve');

}else{

}

if (have_posts()) : ?>
        <div class="row posts">
            <header>
                <h1><a href="<?php echo $blog_link ; ?>" title="<?php echo $blog_title ; ?>"><?php echo $blog_title ; ?></a></h1>
            </header>
<?php

    while (have_posts()) : the_post(); 
        get_template_part('content', 'fik_home_post');
    endwhile; // end of the loop. 
    ?>
</div>
    <?php

endif;
?>
    </div> <!-- end #main -->

<?php get_sidebar( 'front' ); ?>
</div> <!-- end #content -->
<?php get_footer(); ?>