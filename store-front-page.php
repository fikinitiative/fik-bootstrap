<?php
/**
 * Template Name: Store Front Page Template
 *
 * Description: The store front page template displays the content of the static page that uses this template
 * followed by a selection of products that can be configured in the theme customization area
 * followed by the latest blog posts
 * 
 */
get_header();

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
    $store_section_name = _e('Store', 'twentytwelve');

}

?>

    <div id="primary" class="site-content">
        <div id="content" class="container" role="main">
            <div class="row">
            <ul class="thumbnails text-center product-list">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'fik_product' ); ?>

            <?php endwhile; // end of the loop. ?>
            </ul>
            </div>
        </div><!-- #content -->
    </div><!-- #primary -->






<?php
//if (get_option('show_on_front', true) == "page")
// Now we prepare the loop for the posts that are displayed in the front page
$blog_category = get_theme_mod('fik_home_category', '');
$post_amount = get_theme_mod('fik_home_post_amount', 2);
query_posts('post_type=post&category=' . $blog_category . '&posts_per_page=' . $post_amount);

$blog_title = __('Blog');

$blog_title = get_the_title(get_option('page_for_posts', true));
$blog_permalink = get_permalink(get_option('page_for_posts', true));

if ($blog_category != ''){
    $blog_category_term = get_term_by('slug', $blog_category, 'category');
    $blog_link = get_term_link($blog_category_term);
    $blog_name = $blog_category_term->name;
    $all_posts = _e('See all posts', 'twentytwelve');

}else{

}

 while ( have_posts() ) : the_post(); 
    get_template_part('content', 'fik_home_post');
endwhile; // end of the loop. ?>




<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>