
			
	<div id="inner-footer">
		<hr>

		<div id="widget-footer" class="row">
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		    <?php endif; ?>
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		    <?php endif; ?>
		    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
			<?php endif; ?>
		</div>
					
		<nav class="navbar navbar-default" role="navigation">
			<?php fik_bootstrap_menu('footer_links','nav navbar-nav footer-links'); ?>
		</nav>

	</div> <!-- end #inner-footer -->

    <footer>
		<p class="pull-right"><?php the_fikstores_badge(); ?></p>
		<p class="attribution">&copy; <?php bloginfo('name'); ?></p>
    </footer>

	</div> <!-- end #container -->
				
	<!--[if lt IE 7 ]>
  		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
		
<?php 
	wp_footer(); // js scripts are inserted using this function 
	$custom_js = get_theme_mod( 'fik_theme_js', '' );
	if ($custom_js!=='') {
   		echo ($custom_js); 
	}
?>
	</body>
</html>