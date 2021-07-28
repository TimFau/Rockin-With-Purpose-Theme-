<?php get_header(); ?>
<div id="page-content-area">
    <div class="heading-container">
        <div class="heading-box">
            <h1 class="hp-heading hp-heading_hp" data-aos="fade-in"><?php the_title(); ?><span class="line" data-aos="fade-right" data-aos-duration="1000"></span></h1>
        </div>
    </div>
    <div class="post-container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="post page">
            <p><?php the_content(); ?></p>
        </div>
        <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>