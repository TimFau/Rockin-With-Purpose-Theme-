<?php
/* Template name: Front Page
*/
?>

<?php get_header(); ?>
<div class="contentarea home">
<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page'   => 1,
        'category_name' =>  'featured',
    );
    $query = new WP_Query( $args );
?>

<div class="featuredcontent">
    <?php 
    $do_not_duplicate = array();
	$ft_ct = 0;
    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); $do_not_duplicate[] = $post->ID; $ft_ct++; ?>
    <div class="ft_content ct-<?php echo $ft_ct ?>">
        <div class="item">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large' ); ?>
            </a>
                <div class="ft_desc">
                    <div class="postcategory">
                        <?php the_category(' '); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="box"><?php the_title(); ?></h2>
                        <?php 
                            $ft_short_desc = wp_trim_words( get_the_content(), 40, '...' );
                        ?>
                        <p class="short_desc"><?php echo $ft_short_desc; ?></p>
                        <button class="read-more">Read More</button>
                    </a>
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
<section class="recentnews l_container design-1">
    <div class="headingbox">
        <h3 class="hpheading hpheading_hp">Recent Content<i class="material-icons dhide">keyboard_arrow_down</i></h3>
    </div>
    <?php if( $query_rn->have_posts() ) : while( $query_rn->have_posts() ) : $query_rn->the_post(); ?>
    <div class="item recent_item">
        <div class="ri_img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
        </div>
        <div class="desc recent_desc">
            <div class="postcategory">
                <?php the_category(' '); ?>
            </div>
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
                <?php 
                    $ft_short_desc = wp_trim_words( get_the_content(), 40, '...' );
                ?>
                <p><?php echo $ft_short_desc; ?></p>
                <button class="read-more">Read More</button>
            </a>
        </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
</section>
<?php
    
    $args = array(
        'post_type' => 'post',
        'category_name' =>  'albums',
        'posts_per_page'   => 4,
    );
    $query_nr = new WP_Query( $args );
?>
    
<!-- New Releases -->
<section class="newreleases l_container">
    <div class="container">
        <div class="headingbox">
            <a href="category/albums/">
            <h3 class="hpheading hpheading_hp">Album Spotlight<i class="material-icons dhide">keyboard_arrow_down</i></h3>
            </a>
        </div>
        <?php $i = 0; if( $query_nr->have_posts() ) : while( $query_nr->have_posts() ) : $query_nr->the_post(); $i++; ?>
        <div class="album <?php echo 'ct-' . $i; ?>">
            <div class="albumimg"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></div>
            <div class="albumdesc">
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php 
                        $ft_short_desc = wp_trim_words( get_the_content(), 20, '...' );
                    ?>
                    <p><?php echo $ft_short_desc; ?></p>
                    <button class="read-more">Read More</button>
                </a>
            </div>
        </div> 
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
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
<section class="upcoming l_container design-1">
    <div class="container">
        <div class="headingbox">
            <a href="category/artist-spotlight/">
            <h3 class="hpheading hpheading_hp">Artist Spotlight<br class="dhide"><i class="material-icons dhide">keyboard_arrow_down</i></h3>
            </a>
        </div>
        <?php if( $query_ua->have_posts() ) : while( $query_ua->have_posts() ) : $query_ua->the_post(); ?>
        <div class="item upcomingartist">
            <div class="ri_img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            </div>
            <div class="desc recent_desc">
                <div class="postcategory">
                    <?php the_category(' '); ?>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php 
                        $ft_short_desc = wp_trim_words( get_the_content(), 40, '...' );
                    ?>
                    <p><?php echo $ft_short_desc; ?></p>
                    <button class="read-more">Read More</button>
                </a>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</section>
</div>


</div>
<?php get_footer(); ?>

<script>
jQuery( document ).ready(function() {
	/* Column equalizer for hp featured section */
	function ftEqual() {
		var maxHeight = 0;
        jQuery(".ft_content.ct-2, .ft_content.ct-3, .ft_content.ct-4, .ft_content.ct-5").each(function(){
            if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
        });
		if(maxHeight > 0) {
			jQuery(".ft_content.ct-2, .ft_content.ct-3, .ft_content.ct-4, .ft_content.ct-5").height(maxHeight);
		} 
    }
    ftEqual();
	jQuery(window).resize(function() {
		jQuery(".ft_content.ct-2, .ft_content.ct-3, .ft_content.ct-4, .ft_content.ct-5").height('auto');
		ftEqual();
	});
});
</script>