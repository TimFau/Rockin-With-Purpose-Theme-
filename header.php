<!--     WP Section Start    -->
<!doctype html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nyy8ptf.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>/* (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TB66G36'); */</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>
        <?php wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body>
    <!-- Header & Navigation -->
    <nav class="nav-bar">
        <div class="container">
            <div class="nav-logo">
                <a href="<?php bloginfo('url'); ?>"><img src="https://www.rockinwithpurpose.com/wp-content/uploads/2017/05/templogo2_min.png" alt="logo"></a>
                <div id="mobMenuTrigger" class="nav-icon"></div>
            </div>
            <div id="mainNav" class="navigation">
                <?php
              $defaults = array(
                'container' => false, 
                'theme_location' => 'main-menu',
                'menu_class' => 'nav nav-bar-nav',
              );
            wp_nav_menu( $defaults )
            ?>
            </div>
        </div>

    </nav>
    <!--     WP Section End     -->
