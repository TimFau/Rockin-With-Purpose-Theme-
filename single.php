<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="blogcontent-area" class="clearfix">
    <div class="heading-container">
        <div class="post-category"><?php the_category(' '); ?></div>
        <div><h1><?php the_title(); ?></h1></div>
        <div class="blog-meta-info">By <?php the_author(); ?><?php //the_date(); ?></div>
    </div>
    <div class="post-container">
        <div class="blogheader">
            <div class="blogimg"><?php
                if ( in_category( '5' ) ){ the_post_thumbnail('large'); } else { the_post_thumbnail('thumbnail'); } 
                ?>
            </div>
        </div>
        <div class="post">
            <p><?php the_content(); ?></p>
            <div class="share-container">
                <span>Share</span>
                <div class="share">
                    <?php 
                        $faceBookShareUrl = "https://www.facebook.com/sharer/sharer.php?u=" . get_post_permalink()
                    ?>
                    <a href="<?php echo $faceBookShareUrl ?>" target="popup"  onclick="window.open('<?php echo $faceBookShareUrl ?>'); return false;" aria-label="Facebook"><span class="footer-icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/twitter-black.svg" />
                    </span></a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo get_post_permalink(); ?>" aria-label="twitter"><span class="footer-icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook-black.svg" />
                    </span></a>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page'   => 5,
        );
        $query_rnb = new WP_Query( $args );
    ?>
</div>
<?php get_footer(); ?>