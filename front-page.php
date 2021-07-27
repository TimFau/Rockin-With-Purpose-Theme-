<?php
//------------------------------------------------------------//
//------------------- Home Page Template ---------------------//
//------------------------------------------------------------//

// Variables
$count = 0;
?>

<?php get_header(); ?>

<div class="content-area home">
    <div class="main-content">
        <div class="wrapper">
            <section class="recent-content clearfix">
                <div class="heading-box">
                    <a href="category/albums/">
                        <h3 class="hp-heading hp-heading_hp" data-aos="fade-in">The Latest<span class="line" data-aos="fade-right" data-aos-duration="1000"></span></h3>
                    </a>
                </div>
                <?php
                // Get Latest Item from 'featured' category
                $args = array( 'post_type' => 'post', 'posts_per_page'   => 1, 'category_name' =>  'featured');
                $query_featured = new WP_Query( $args );
                $do_not_duplicate = array();

                if( $query_featured->have_posts() ) : while( $query_featured->have_posts() ) : $query_featured->the_post(); $do_not_duplicate[] = $post->ID; $count++; ?>
                <div class="card full-width item ct-<?php echo $count; ?>">
                    <div class="item-container">
                        <a href="<?php the_permalink(); ?>" class="card-img" data-aos="fade-in" data-aos-duration="600">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                        <div class="card-desc-container">
                            <span class="post-category"><?php the_category(' '); ?></span>
                            <a href="<?php the_permalink(); ?>" class="card-desc" data-aos="fade-left" data-aos-delay="200" data-aos-duration="800">
                                <h2><?php the_title(); ?></h2>
                                <p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif;
                /* End Get Latest Item from 'featured' category */ ?>

                <?php
                // Get Recent Content (exluding previous)
                $args = array(
                    'post_type' =>  'post',
                    'posts_per_page'   => 3,
                    'post__not_in' => $do_not_duplicate,
                    'category__not_in'  => array( 5 )
                );
                $query_recent = new WP_Query( $args );
                if( $query_recent->have_posts() ) : while( $query_recent->have_posts() ) : $query_recent->the_post(); $count++; ?>
                <div class="card one-third item ct-<?php echo $count; ?>">
                    <div class="item-container">
                        <a href="<?php the_permalink(); ?>" class="card-img" data-aos="fade-in" data-aos-duration="600">
                            <?php $count === 3 ? the_post_thumbnail('large') : the_post_thumbnail('thumbnail'); ?>
                        </a>
                        <span class="post-category"><?php the_category(' '); ?></span>
                        <a href="<?php the_permalink(); ?>" class="card-desc" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo has_excerpt() ? get_the_excerpt() : wp_trim_words( get_the_content(), 10, '...' ); ?></p>
                        </a>
                    </div>
                </div>
                <?php endwhile; endif; wp_reset_postdata();
                /* End Get Recent Content */ ?>
            </section>
        </div>
        
        <!-- Featured Albums -->
        <section class="featured-albums clearfix wrapper">
            <div class="container">
                <div class="heading-box heading-right">
                    <a href="category/albums/">
                        <h3 class="hp-heading hp-heading_hp" data-aos="fade-in">Album's We Think You'll Love<span class="line" data-aos="fade-right" data-aos-duration="1000"></span></h3>
                    </a>
                </div>
                <div class="album-wrapper">
                    <?php
                    // Get Albums
                    $args = array(
                        'post_type' => 'post',
                        'category_name' =>  'albums',
                        'posts_per_page'   => 4,
                    );
                    $query_albums = new WP_Query( $args );
                    $i = 0; if( $query_albums->have_posts() ) : while( $query_albums->have_posts() ) : $query_albums->the_post(); $i++; ?>
                    <div class="album <?php echo 'ct-' . $i; ?>" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="500">
                        <div class="albumimg">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        </div>
                        <div class="albumdesc">
                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                                <?php 
                                    $ft_short_desc = wp_trim_words( get_the_content(), 20, '...' );
                                ?>
                                <p><?php echo $ft_short_desc; ?></p>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; endif; wp_reset_postdata();
                    /* End Get Albums */ ?>
                </div>
            </div>
        </section>
        
        <!-- Upcomming artists -->
        <section class="artist-spotlight clearfix wrapper">
            <div class="container">
                <div class="heading-box">
                    <a href="category/artist-spotlight/">
                        <h3 class="hp-heading hp-heading_hp">Artist Spotlight<span class="line" data-aos="fade-left" data-aos-duration="1000"></span><br class="dhide"></h3>
                    </a>
                </div>
                <?php
                // Get Artist Spotlight Content
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page'   => 3,
                    'category_name' =>  'artist-spotlight',
                    'post__not_in' => $do_not_duplicate,
                );
                $query_artists = new WP_Query( $args );
                if( $query_artists->have_posts() ) : while( $query_artists->have_posts() ) : $query_artists->the_post(); ?>
                <div class="card one-third item">
                    <a href="<?php the_permalink(); ?>" class="item-container">
                        <div class="card-img" data-aos="fade-in">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </div>
                        <div class="card-desc" data-aos="fade-up" data-aos-delay="200">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
                        </div>
                    </a>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); 
                /* End Get Artist Spotlight Content */ ?>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
