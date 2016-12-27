<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); if (is_single() || is_page() || is_archive()) { wp_title(' | ',true, 'left'); }  ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

	<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon">
  <meta name="msapplication-TileColor" content="#f1ede5"/>
  <meta name="msapplication-square150x150logo" content="<?php bloginfo('template_directory'); ?>/images/favicon.jpg"/>

  <?php if (have_posts()): while(have_posts()): the_post(); endwhile; endif;?>
	<!-- Facebook Opengraph -->
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <meta property="og:url" content="<?php the_permalink() ?>"/>
	<?php if (is_single()) { ?>
    <meta property="og:title" content="<?php single_post_title(''); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo(get_post_meta($post->ID, "thumburl", true)); ?>" />
  <?php } elseif (is_home() || is_page('home')) { ?>
	  <meta property="og:title" content="<?php bloginfo('name'); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<?php } elseif (is_page()) { ?>
    <meta property="og:title" content="<?php single_post_title(''); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:image" content="<?php echo(get_post_meta($post->ID, "thumburl", true)); ?>" />
	<?php } else { ?>
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:type" content="website" />
	<?php } ?>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.8.3.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/html5shiv.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/respond.min.js"></script>
	<![endif]-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', '', 'auto');
	  ga('send', 'pageview');

	</script>
	<meta name="google-site-verification" content="" />
</head>
<body <?php body_class(); ?>>
	<a name="top" id="top" class="visuallyhidden anchor"></a>
	<div id="wrapper">
		<header id="header" role="banner">
			<div class="headerWrapper">
				<h1><a href="#top" title=""><?php bloginfo('name'); ?></a></h1>
				<nav id="menu" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				</nav>
			</div>
		</header>
		<div id="container">