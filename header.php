<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="UTF-8">
	<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container">
	<!-- header -->
	<header id="header">
		<div class="site-branding">
			<h1 class="site-title">
				<?php if( get_header_image() ) : ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				<?php endif; ?>
				<a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
			</h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>
		</div>
		<nav id="site-navigation">
<?php get_search_form(); ?>
<?php wp_nav_menu( array ( 'theme_location' => 'header-navi' ) ); ?>
		</nav>
		<div class="clear"></div>
	</header>
	<!-- /header -->