<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php if ( is_single() ) { ?> <?php } ?><?php wp_title(':',true,right); ?> <?php bloginfo('name'); ?></title>

	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" /> 


	<?php wp_head(); ?>

</head>
<body>
	<div class="container">
		<div class="top">
			<h1><a href="/"><?php bloginfo('name'); ?></a> <span <?php echo ( get_theme_mod( 'zh2_tagline' ) ) ? "style='display:none;'" : "" ?>>: 			<?php if (get_option('zh2_tagline_pages_dropdown')) { ?>
					<a id="tagline" <?php echo ( get_theme_mod( 'zh2_extlink' ) ) ? "target='_blank'" : "" ?> href="<?php echo home_url(); ?>/<?php echo get_option('zh2_tagline_pages_dropdown'); ?>/"><?php echo get_option('zh2_tagline_pages_dropdown'); ?></a>
				<?php } else { ?>
					<?php bloginfo('description'); ?>
				<?php } ?><span></h1>
		</div> <!-- /end .top -->