<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="blogContentArea" class="clearfix">
    <div class="heading-container">
        <div class="postcategory"><?php the_category(' '); ?></div>
        <div><h1><?php the_title(); ?></h1></div>
        <div class="blogmetainfo"><?php the_author(); ?> | <?php the_date(); ?></p></div>
    </div>
    <div class="post-container">
        <div class="blogheader">
            <div class="blogimg"><?php
                if ( in_category( '5' ) ){ the_post_thumbnail('large'); } else { the_post_thumbnail('thumbnail'); } 
                ?>
            </div>
        </div>
        <div class="post">
            <div class="addthis_inline_share_toolbox"></div>
            <p><?php the_content(); ?></p>
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