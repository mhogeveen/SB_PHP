<!DOCTYPE html>
<html>

<head>
   <title>Social Brothers</title>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>

<body class="container">
   <!-- Either gets the background image from the theme customizer,
   or from the featured image if it is a post -->
   <header class="header" style="background: left center / cover no-repeat url(<?php
                                                                                 if (is_single()) {
                                                                                    echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
                                                                                 } else {
                                                                                    echo get_theme_mod('header_background');
                                                                                 }
                                                                                 ?>) rgba(0,0,0,0.4);">
      <div class="container--inner">
         <div class="header__nav">
            <!-- Get the logo from the Header logo control -->
            <img src="<?php echo get_theme_mod('header_logo'); ?>" class="nav__logo">
            <!-- Get the menu called 'navigation' -->
            <?php
            wp_nav_menu(array(
               'menu' => 'navigation',
               'container' => 'nav',
               'container_class' => 'nav-menu',
            ));
            ?>
         </div>
         <div class="header__title">
            <!-- Only show page/post title if not on the homepage -->
            <h1><?php if (!is_front_page()) the_title(); ?></h1>
         </div>
      </div>
   </header>