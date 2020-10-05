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
        
        <?php do_action( 'now_slider_image' ); ?>

        <h2 class="sticky-title">Starter posts</h2>
        <?php do_action( 'sticky_posts' ); ?>
        
    <?php endwhile; endif; 
endif;
get_footer(); 