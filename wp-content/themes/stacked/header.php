<!DOCTYPE html>

<!-- BEGIN html -->
<html <?php language_attributes(); ?>>
<!-- A ThemeZilla design (http://www.themezilla.com) - Proudly powered by WordPress (http://wordpress.org) -->

<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<!-- Title -->
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo get_option('tz_alt_stylesheet'); ?>" type="text/css" media="screen" />
	
	<!-- RSS & Pingbacks -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (get_option('tz_feedburner')) { echo get_option('tz_feedburner'); } else { bloginfo( 'rss2_url' ); } ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class(); ?>>

	<!-- BEGIN #container -->
	<div id="container">
	
		<!-- BEGIN #header -->
		<div id="header">

            <!-- BEGIN #header-top --> 
            <div id="header-top">
            
                <!-- BEGIN .header-inner -->
                <div class="header-inner clearfix">
                
                    <!-- BEGIN #logo -->
                    <div id="logo">
                        <?php /*
                        If "plain text logo" is set in theme options then use text
                        if a logo url has been set in theme options then use that
                        if none of the above then use the default logo.png */
                        if (get_option('tz_plain_logo') == 'true') { ?>
                        <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
                        <?php } elseif (get_option('tz_logo')) { ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('tz_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                        <?php } else { ?>
                        
                        <?php if(get_option('tz_alt_stylesheet') == 'light.css') : ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/light/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php else: ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/dark/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
                        <?php endif; ?>
                        
                        <?php } ?>
                    <!-- END #logo -->
                    </div>
                    <div id="primary-title">
					<h1 style="font-size: 20px;line-height: 20px;padding: 20px 0 0 30px;float: left;">The Society for the Psychology Study of Ethnic Minority Issues,<br/> <small style="font-size:14px;font-weight:normal;">a Division of the American Psychological Association (APA)</small></h1>
					</div>
					
                    <!-- BEGIN #primary-nav -->
                    <div id="primary-nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
                    <!-- END #primary-nav -->
                    </div>
                    
                    <!-- BEGIN #header-search
                    <div id="header-search">
                        <?php //get_search_form(); ?>
                    
                    </div> --> 
                    
                <!-- END .header-inner -->
                </div>
            
            <!-- END #header-top -->    
            </div>
            
            <?php if(is_page_template('template-home.php')) : ?>
            
            <?php get_template_part('includes/home-slider'); ?>
            
            <?php endif; ?>
			
		<!--END #header-->
		</div>

		<!--BEGIN #content -->
		<div id="content">
        	
            <?php $dots = get_option('tz_slider_dots'); ?>
            
        	<!--BEGIN #content-inner -->
			<div id="content-inner" class="clearfix <?php if($dots == 'true') : ?>dots-enabled<?php endif; ?>">
		