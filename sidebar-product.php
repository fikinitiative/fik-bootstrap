			<div id="sidebar-product" class="fluid-sidebar sidebar span3" role="complementary">

				 <div class="price-and-purchase">
                    <?php the_fik_price(); ?>
                    <?php the_fik_add_to_cart_button(); ?>
                </div>

                <?php if (is_active_sidebar('sidebar-4')) : ?>
                <div id="product-secondary" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('sidebar-4'); ?>
                </div><!-- #secondary -->
                <?php endif; ?>
			</div>