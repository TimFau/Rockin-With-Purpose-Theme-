<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="blog-content-area" class="clearfix">
    <div class="heading-container">
        <div class="post-category"><?php the_category(' '); ?></div>
        <div class="heading-box heading-center">
            <a href="category/albums/">
                <h1 class="hp-heading hp-heading_hp" data-aos="fade-in"><?php the_title(); ?><span class="line" data-aos="fade-right" data-aos-duration="1000"></span></h1>
            </a>
        </div>
        <div class="blog-meta-info">By <?php the_author(); ?><?php //the_date(); ?></div>
    </div>
    <div class="post-container">
        <div class="blogheader">
            <div class="blog-img"><?php
                if ( in_category( '5' ) ){ the_post_thumbnail('large'); } else { the_post_thumbnail('large'); } 
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