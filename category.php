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
        <div class="heading-box">
            <h1 class="hp-heading hp-heading_hp" data-aos="fade-in"><?php single_cat_title(); ?><span class="line" data-aos="fade-right" data-aos-duration="1000"></span></h1>
        </div>
        <div class="cat-content clearfix">
        <?php 
            $do_not_duplicate = array();
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $do_not_duplicate[] = $post->ID;
            ?>
            <div class="card one-third">
                <a href="<?php the_permalink() ?>" class="item-container">
                    <div class="card-img">
                        <?php
                        if ( in_category( '5' ) ){ the_post_thumbnail('large'); }
                        else { the_post_thumbnail('thumbnail'); } 
                        ?>
                    </div>
                    <div class="card-desc">
                        <!-- <div class="post-category">
                            <?php //the_category(' '); ?>
                        </div> -->
                        <h2 class="title"><?php the_title(); ?></h2>
                        <p>
                            By <?php the_author(); ?>
                            <?php //echo get_the_date(); ?>
                        </p>
                        <p>
                            <?php echo wp_trim_words( get_the_content(), 50, '...' ); ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>