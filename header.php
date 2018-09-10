<!DOCTYPE html>
<html xmlns:fb="http://ogp.me/ns/fb#" lang="es">
<head>
  <link rel="shortcut icon" href="<?php bloginfo( template_directory ); ?>/favicon.ico" type="image/png">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><?php wp_title(); ?></title>

  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php get_template_part('layout/header/tagmanager'); ?>
  <?php wp_head(); ?>
</head>
<body>

<header class="header">
  <div class="header__content">
    <a class="header__logo" href="<?php bloginfo(wpurl); ?>">
      hasi theme
    </a>
    <div class="header__search">
      <?php get_template_part('modules/atoms/search-form'); ?>
    </div>
    <nav class="header__nav">
      <ul class="header__ul">
      <?php wp_list_categories( array(
          'title_li' => ''
      ) ); ?>
      </ul>
    </nav>
  </div>
</header>
