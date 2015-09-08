<?php 
function theme_favicons(){
  $differentAdmin = true;
  $favicon_path = get_template_directory_uri() . "/img/raster/favicons";
  if ($differentAdmin && is_admin()) {
    $favicon_path .= "/admin";
  } elseif
   (is_user_logged_in()) {
    $favicon_path .= "/loggedin";
  } 
  ?>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon_path;?>/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $favicon_path;?>/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon_path;?>/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $favicon_path;?>/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon_path;?>/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $favicon_path;?>/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $favicon_path;?>/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $favicon_path;?>/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $favicon_path;?>/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo $favicon_path;?>/favicons-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo $favicon_path;?>/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo $favicon_path;?>/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo $favicon_path;?>/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo $favicon_path;?>/manifest.json">
<link rel="shortcut icon" href="<?php echo $favicon_path;?>/favicon.ico">
<meta name="apple-mobile-web-app-title" content="PCTO2016">
<meta name="application-name" content="PCTO2016">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri() . "/img/raster/favicons";  ?>/mstile-144x144.png">
<meta name="msapplication-config" content="<?php echo get_template_directory_uri() . "/img/raster/favicons"; ?>/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<?php 
}
add_action( 'wp_head', "theme_favicons");
add_action( 'admin_head', "theme_favicons");
?>