<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php bloginfo('name'); if (is_single() || is_page() || is_archive()) { wp_title(' | ',true, 'left'); }  ?></title>
  <meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

	<link href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" rel="shortcut icon">
  <meta name="msapplication-TileColor" content="#f1ede5"/>
  <meta name="msapplication-square150x150logo" content="<?php bloginfo('template_directory'); ?>/images/favicon.jpg"/>
  
  <meta rel="index" href="http://sabrinasewandsew.com/" title="Sabrina Sew & Sew" />
  <meta rel="canonical" href="http://sabrinasewandsew.com/" />
  <meta name="robots" content="index,follow" />
  <meta name="author" content="Sabrina Loyless, sabrinasewandsew@gmail.com" />
  <meta name="url" content="http://sabrinasewandsew.com/" />
  <meta name="identifier-URL" content="http://sabrinasewandsew.com/" />
  <meta name="rating" content="General" />
  <meta name="revisit-after" content="7 days" />

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
  
  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@SabrinaSewSew" />
  <meta name="twitter:creator" content="@SabrinaSewSew" />
  <meta name="twitter:title" content="<?php bloginfo('name'); ?>" />
  <meta name="twitter:description" content="<?php bloginfo('description'); ?>" />
  <meta name="twitter:image" content="http://sabrinasewandsew.com/content/images/styles-image.jpg" />

  <!-- Google+ -->
  <meta itemprop="description" content="<?php bloginfo('description'); ?>" />
  <!-- iOS -->
  <meta name="apple-mobile-web-app-title" content="Sabrina Sew & Sew" />

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-1028046-19', 'auto');
	  ga('send', 'pageview');

	</script>
	<meta name="google-site-verification" content="" />
</head>
<body <?php body_class(); ?>>
	<a name="top" id="top" class="visuallyhidden anchor"></a>
	<header class="container-fluid" id="global-header">
    <div class="row">
      <div class="col-xs-12">
        <div class="logo"><img class="img-responsive center-block" src="<?php bloginfo('template_directory'); ?>/content/images/logo@2x.png" alt="Sabrina Sew &amp; Sew"></div>
        <nav class="row" role="navigation">
          <ul class="nav nav-pills text-center" role="tablist" id="mainNav">
            <li class="col-md-3 hidden-xs hidden-sm" role="presentation"><a href="#styles">Styles &amp; Designs</a></li>
            <li class="col-xs-4 col-md-2" role="presentation"><a href="#aboutMe">About Me</a></li>
            <li class="col-xs-4 col-md-2 logo-small" role="presentation"><a href="#top"><img class="img-responsive center-block" src="<?php bloginfo('template_directory'); ?>/content/images/logo-small@2x.png" alt="Sabrina Sew &amp; Sew"></a></li>
            <li class="col-xs-4 col-md-3" role="presentation"> <a href="#bts">Portfolio</a></li>
            <li class="hidden-xs hidden-sm col-md-2" role="presentation"> <a href="#contact">Contact</a></li>
          </ul>
          <!-- <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?> -->
        </nav>
      </div>
    </div>
  </header>
  <main class="container-fluid" role="main">
    <div class="row">