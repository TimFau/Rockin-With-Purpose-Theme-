<?php get_header(); ?>
<div id="blogContentArea">
<div class="post-container">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="blogheader">
        <div class="blogimg"><?php
            if ( in_category( '7' ) ){ the_post_thumbnail('large'); }           else { the_post_thumbnail('thumbnail'); } 
            ?></div>
        <div class="meta">
            <div class="postcategory"><?php the_category(' '); ?></div>
            <div ><h1><?php the_title(); ?></h1></div>
            <div class="blogmetainfo"><?php the_author(); ?> | <?php the_date(); ?></p></div>
        </div>
    </div>
    <div class="post">
        <div class="addthis_inline_share_toolbox"></div>
        <p><?php the_content(); ?></p>
        <div class="addthis_inline_share_toolbox"></div>
        <div class="abouttheauthor">
                        <img src="../wp-content/themes/_RPWordpress1/img/linda.jpg">
                        <div class="abtinfo">
                        <h4>Linda Fau</h4>
                        <p><i>Owner/Blogger</i></p>
                        </div>
                        <div class="abtabout">
                        <p>With a passion for Rock and Roll with a purpose-driven message, I've dedicated myself to providing you with all the best news and resources possible for Rock 'n Roll with a Purpose. Rock on!</p>              
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_follow_toolbox"></div>
                        </div>
        </div>
    </div>
    <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
</div>
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