<?php
/**
 * The template for displaying blog
 *
 * @package WordPress
 * @subpackage now
 */

get_header(); 

if ( have_posts() ) : ?>
    <div class="content"> 
        <?php 
        while ( have_posts() ) : the_post();
            
        endwhile; ?>
    </div>

<?php endif;