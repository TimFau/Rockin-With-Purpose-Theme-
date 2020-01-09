<?php get_header(); ?>
<div id="blogContentArea">
<div class="post-container">
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
<?php get_footer(); ?>