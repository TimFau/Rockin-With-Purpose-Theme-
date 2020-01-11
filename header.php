<!--     WP Section Start    -->
<!doctype html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nyy8ptf.css">
    <script>/* (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TB66G36'); */</script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body>
    <!-- Header & Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="navlogo">
                <a href="<?php bloginfo('url'); ?>"><img src="https://www.rockinwithpurpose.com/wp-content/uploads/2017/05/templogo2_min.png" alt="logo"></a>
                <div id="mobMenuTrigger" class="nav-icon"></div>
            </div>
            <div id="mainNav" class="navigation">
                <?php
              $defaults = array(
                'container' => false, 
                'theme_location' => 'main-menu',
                'menu_class' => 'nav navbar-nav',
              );
            wp_nav_menu( $defaults )
            ?>
            </div>
            <div class="followBTN">
                <a href="https://www.facebook.com/RockinWithPurpose/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook-box.png"></a>
                <a href="https://twitter.com/RockinWPurpose"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/twitter-box.png"></a>
            </div>
        </div>

    </nav>
    <!--     WP Section End     -->
