<!--     WP Section Start    -->
<!doctype html>
<html lang="en">
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Caveat+Brush" rel="stylesheet"> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
<body id="bootstrap-overrides">      
<!-- Header & Navigation -->
<nav class="navbar">
    <div class="container">
    <div class="navlogo">
        <a href="<?php bloginfo('url'); ?>"><img src="http://www.rockinwithpurpose.com/wp-content/uploads/2017/05/templogo2_min.png" alt="logo"></a>
    </div>
    <div class="navigation">
        <?php
              $defaults = array(
                'container' => false, 
                'theme_location' => 'main-menu',
                'menu_class' => 'nav navbar-nav',
              );
            wp_nav_menu( $defaults )
            ?>
    </div>
<!--
    <div class="followBTN">
        <a href="https://www.facebook.com/RockinWithPurpose/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook-box.png"></a>
        <a href="https://twitter.com/RockinWPurpose"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/twitter-box.png"></a>
    </div>
-->
    </div>
        
</nav> 
<!--     WP Section End     -->   