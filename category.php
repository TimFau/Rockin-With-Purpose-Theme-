<?php get_header(); ?>
<!-- WP_Query -->
<?php
$args = array(
    'post_type' => 'post',
    'cat' => 'inheret'
);
$cat_posts = new WP_Query( $args );

?>



<!-- Main Content + sidbar area -->
<div id="category">
    <!-- Main Content -->
    <div class="cat_header_post_float">
        <h2 class="hpheading cat_hpheading"><?php single_cat_title() ?><br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h2>
        <div class="cat_latestposts">
        <?php 
            $do_not_duplicate = array();
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $do_not_duplicate[] = $post->ID;
            ?>
            <div class="cat_content">
                <div class="cat_img">
                    <a href="<?php the_permalink() ?>">
                    <?php
                    if ( in_category( '5' ) ){ the_post_thumbnail('large'); }
                    else { the_post_thumbnail('thumbnail'); } 
                    ?>
                    </a>
                </div>
                <div class="cat_desc">
                    <div class="postcategory">
                        <?php the_category(' '); ?>
                    </div>
                    <div class="cat_meta">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="cat_title"><?php the_title(); ?></h3>
                        </a>
                        <p>
                            <?php the_author(); ?> | 
                            <?php echo get_the_date(); ?>
                        </p>
                    </div>
                    <div class="excerpt cat_excerpt">
                        <?php echo wp_trim_words( get_the_content(), 50, '...' ); ?>
                        <a href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
    
    
    <!-- Sidebar Area 
    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page'   => 5,
            'post__not_in' => $do_not_duplicate,
        );
        $query_rnb = new WP_Query( $args );
    ?>
        <div class="lp_block">
            <div class="latestposts">
                <h3  class="hpheading">Latest Posts<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3>
                <?php if( $query_rnb->have_posts() ) : while( $query_rnb->have_posts() ) : $query_rnb->the_post(); ?>
                <div class="lpitem">
                    <div class="lpthumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a></div>
                    <div class="lpmeta">
                        <div class="postcategory"><a href=""><?php the_category(' '); ?></a></div>
                        <br>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="lpmetainfo"><p><?php the_author(); ?> | <?php echo get_the_date(); ?></p></div>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
        -->
</div>


<?php get_footer(); ?>