<?php
/* Template name: Front Page
*/
?>

<?php get_header(); ?>
<div class="contentarea">
<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page'   => 5,
        'category_name' =>  'featured'
    );
    $query = new WP_Query( $args );
?>

<div class="featuredcontent">
    <?php 
    $do_not_duplicate = array();
    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); $do_not_duplicate[] = $post->ID; ?>
    <div class="ft_content">
        <div class="item">
            <div class="_img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
            </div>
            <div class="ft_desc">
                <!-- Add to Livesite -->
                <div class="postcategory"><?php the_category(' '); ?></div>
                <!-- ^Add to Livesite^ -->
                <a href="<?php the_permalink(); ?>"><h2 class="box"><?php the_title(); ?></h2></a>
            </div>
        </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</div>

<?php
    $args = array(
        'post_type' =>  'post',
        'posts_per_page'   => 3,
        'post__not_in' => $do_not_duplicate,
        'category__not_in'  => array( 5 )
    );
    $query_rn = new WP_Query( $args );
?>
<div class="not_featured">
<section class="recentnews l_container">
    <div class="headingbox">
        <h3 class="hpheading hpheading_hp">Recent Content<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3>
        <p class="mnone">Recent news and content from around the site</p>
    </div>
    <?php if( $query_rn->have_posts() ) : while( $query_rn->have_posts() ) : $query_rn->the_post(); ?>
    <div class="recent_item">
                <div class="ri_img">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
                <div class="recent_desc">
                    <div class="postcategory"><a href="#"><?php the_category(' '); ?></a></div>
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <p><?php the_excerpt(); ?></p>
                </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
    <div class="invisible"></div>
</section>
<?php
    
    $args = array(
        'post_type' => 'post',
        'category_name' =>  'albums',
        'posts_per_page'   => 6,
    );
    $query_nr = new WP_Query( $args );
?>
    
<!-- New Releases -->
<section class="newreleases l_container">
        <div class="headingbox">
            <h3 class="hpheading hpheading_hp">Album Spotlight<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3>
            <p class="mnone">Check out these album spotlights from some amazing artists</p>
        </div>
        <?php if( $query_nr->have_posts() ) : while( $query_nr->have_posts() ) : $query_nr->the_post(); ?>
        <div class="album">
            <div class="albumimg"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></div>
            <div class="albumdesc"><a href="<?php the_permalink(); ?>"><h2>view</h2></a></div>
        </div> 
        <?php endwhile; endif; wp_reset_postdata(); ?>
        <div class="invisible"></div>
</section>
    
<?php
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page'   => 3,
        'category_name' =>  'artist-spotlight',
        'post__not_in' => $do_not_duplicate,
    );
    $query_ua = new WP_Query( $args );
?>
<!-- Upcomming artists -->
<section class="upcoming l_container">
        <div class="headingbox">
            <h3 class="hpheading hpheading_hp">Artist Spotlight<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3>
            <p class="mnone">Our features on artists you should know about</p>
        </div>
        <?php if( $query_ua->have_posts() ) : while( $query_ua->have_posts() ) : $query_ua->the_post(); ?>
        <div class="upcomingartist">
            <div class="ua_img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            </div>
            <div class="ua_desc">
                <a href="<?php the_permalink(); ?>"><h2 class="box"><?php the_title(); ?></h2></a>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
</section>
</div>


</div>
<?php get_footer(); ?>