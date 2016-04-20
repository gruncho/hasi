<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ic" type="image/x-icon">
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
		{lang: 'es'}
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
		{lang: 'es'}
	</script>
	<title><?php bloginfo('name'); ?>: <?php bloginfo('description'); ?> <?php wp_title(); ?></title>
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />
	<link href="<?php bloginfo('template_url'); ?>/assets/scss/jquery.sidr.dark.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />         
	<!-- responsive -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">         
	<!-- mascosuitas -->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php if (is_single()) : while ( have_posts() ) : the_post(); ?>
	<?php endwhile; endif; ?>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
	<?php if (is_home()): ?>
	<?php endif; ?>                      
</head>
<body 
<?php cc_body_tags() ?>> 
<header>
	<section>
		<a href="<?php bloginfo('url'); ?>">
			Go to home
		</a>
	</section>
	<section>
		<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>">
			<input placeholder="Buscar" type="text" value="" name="s" id="s">
		</form>
	</section>
	<section>
		<nav>

			<ul>
				<?php wp_list_pages('depth=1&title_li'); ?> 
			</ul>
		</nav>
	</section>
</header>
</header>