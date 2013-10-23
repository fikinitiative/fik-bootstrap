<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
				

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">


	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->

	<!-- theme options from options panel -->
	<?php get_wpbs_theme_options(); ?>

	<?php	$custom_css = get_theme_mod( 'fik_theme_css', '' );
			if ($custom_css!=='') {
   				echo ('<style type="text/css" id="fik_custom_css">'.$custom_css.'</style>');
			} ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.min.js"></script>
    <![endif]-->

  </head>
				

  <body <?php body_class(); ?>>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
			<?php 
			if(of_get_option('branding_logo','')!='') { ?>
				<img src="<?php echo of_get_option('branding_logo'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
			<?php }
			if(of_get_option('site_name','1')) bloginfo('name'); ?></a>
        </div>
        <div class="collapse navbar-collapse">
        	<?php fik_bootstrap_menu('top_menu','nav navbar-nav'); ?>

        	<?php fik_bootstrap_menu('top_menu','nav navbar-nav navbar-right'); ?>

        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">
