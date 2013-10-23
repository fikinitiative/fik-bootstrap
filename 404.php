<?php get_header(); ?>
			
			<div id="content" class="row">
			
				<div id="main" class="col-md-12" role="main">

					<article id="post-not-found" >
						
						<header>

							<div class="jumbotron">
							
								<h1><?php _e("Yet Another 404 - Page Not Found","fikstores"); ?></h1>
								<p><?php _e("This is embarassing. We can't find what you were looking for.","fikstores"); ?></p>
															
							</div>
													
						</header> <!-- end article header -->
					
						<section class="post_content">
							
							<p><?php _e("Whatever you were looking for was not found, but maybe try looking again or search using the form below.","fikstores"); ?></p>

							<div class="row">
								<div class="col-md-12">
									<?php get_search_form(); ?>
								</div>
							</div>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>