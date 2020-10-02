<?php
/**
 * The template for displaying front page
 *
 * @package WordPress
 * @subpackage now
 */

get_header(); 
if( ! ( '' == now_get_theme_mod('front_page_style') && ! is_home()) ) :
?>
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        
        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

    <?php endwhile; endif; 
endif;
get_footer(); 