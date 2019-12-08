<?php get_header(); ?>
<div id="blogcontentarea">
<div class="header_post_float">
    <h2 class="hpheading cat_hpheading"><?php wp_title($sep = '') ?><br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h2>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post page">
        <p><?php the_content(); ?></p>
    </div>
    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</div>
<!-- Latest Posts / Sidebar -->
    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page'   => 5,
        );
        $query_rnb = new WP_Query( $args );
    ?>
    <div class="lp_block">
        <div class="latestposts">
            <h3  class="hpheading">Latest Posts<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3>
            <?php if( $query_rnb->have_posts() ) : while( $query_rnb->have_posts() ) : $query_rnb->the_post(); ?>
            <div class="lpitem">
                <div class="lpthumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
                <div class="lpmeta">
                    <div class="postcategory"><?php the_category(' '); ?></div>
                    <br>
                    <a href="<?php the_permalink(); ?>"><h2 class="box"><?php the_title(); ?></h2></a>
                    <div class="lpmetainfo"><p><?php the_author(); ?> | <?php echo get_the_date(); ?></p></div>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<!-- 
Related Content (AKA "You May Also Like")
Disabled until the sites has more content to displa

    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page'   => 6,
        );
        $query_mayalso = new WP_Query( $args );
    ?> 
<div class="relatedcontent">
    <div class="headingbox"><h3 class="hpheading">You May Also Like<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3></div>
    <?php if( $query_mayalso->have_posts() ) : while( $query_mayalso->have_posts() ) : $query_mayalso->the_post(); ?>
    <div class="recent_item">
        <div class="ri_img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
        </div>
        <div class="recent_desc">
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</div>
-->
<?php get_footer(); ?>