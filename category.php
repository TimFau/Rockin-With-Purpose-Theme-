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
    <div>
        <h1 class="heading"><?php single_cat_title() ?><br class="dhide"></h1>
        <div class="cat-content design-1 clearfix">
        <?php 
            $do_not_duplicate = array();
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $do_not_duplicate[] = $post->ID;
            ?>
            <div class="item">
                <div class="img">
                    <a href="<?php the_permalink() ?>">
                    <?php
                    if ( in_category( '5' ) ){ the_post_thumbnail('large'); }
                    else { the_post_thumbnail('thumbnail'); } 
                    ?>
                    </a>
                </div>
                <div class="card-desc">
                    <div class="post-category">
                        <?php the_category(' '); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <div class="meta">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <p>
                                <?php the_author(); ?> | 
                                <?php echo get_the_date(); ?>
                            </p>
                        </div>
                        <p>
                            <?php echo wp_trim_words( get_the_content(), 50, '...' ); ?>
                        </p>
                        <button class="read-more">Read More</button>
                    </a>
                </div>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>