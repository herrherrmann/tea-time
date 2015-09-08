<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <div id="container">

      <header id="header">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">
        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" rel="home">
          <h1>Herr<wbr>Herrmann</h1>
        </a>
        <div class="clearfix"></div>
      </header>

      <nav id="menu" aria-label="Main Menu">
        <?php wp_nav_menu( array(
          'theme_location' => 'main-menu',
          'container'      => false
        )); ?>
      </nav>

      <main id="content">
