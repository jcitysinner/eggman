<!DOCTYPE html>
<!--[if IE 7]> <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<link rel="dns-prefetch" href="//google-analytics.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//platform.twitter.com">

<meta property="og:image" content="<?php echo get_template_directory_uri();?>/img/raster/compressed/og_image " />
<meta property="og:type" content="non_profit"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="sprite-hide">
	<?php include("img/sprite.svg"); ?>
</div>

<div id="head-container">
	<header id="site-header" class='site-header'>
		<svg class='logo-main'><use xlink:href="#logo-type"></use></svg>
	</header>
</div> 