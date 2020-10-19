<?php
/**
 * The template for displaying blog
 *
 * @package WordPress
 * @subpackage now
 */

get_header(); 

if ( have_posts() ) : ?>
    <div class="content archive"> 
        <h1>Posts</h1>
        <hr class="top-separatation">
        <h2>Recent entries</h2>
        <div class="posts-layout">
            <?php 
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 4,
                'post_status' => 'publish'
            ));
            $recentPostID = [];
            foreach($recent_posts as $post) : 
                array_push($recentPostID,$post['ID']);
            endforeach;
            wp_reset_query(); 
            while ( have_posts() ) : the_post(); 
                $id = get_the_ID();
                if (in_array($id, $recentPostID)) :
                    do_action('archive_recent_entries'); 
                endif;
                $i++;

            endwhile; 
            $categories = get_categories( array(
                'orderby' => 'name',
                'order'   => 'ASC'
            ) );
            // var_dump($categories) ;
            
            foreach( $categories as $category ) :
                $name = $category->name;
                var_dump($name);
            endforeach;
            
            ?>
        </div>
    </div>

<?php endif;
get_footer();