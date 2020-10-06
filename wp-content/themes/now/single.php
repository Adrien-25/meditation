<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage now
 */

get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <?php 
    do_action('setPostViews', get_the_ID());
    // $view = wpb_get_post_views(get_the_ID());
    // echo 'Nombre de vues : '.get_post_meta(get_the_ID(), 'wpb_post_views_count', true);
    ?>

    <article class="post">
        <h1><?php the_title(); ?></h1>
        
        <?php the_post_thumbnail(); ?>


        <div class="post__meta">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
            <p>
                Publié le <?php the_date(); ?>
                par <?php the_author(); ?>
                Dans la catégorie <?php the_category(); ?>
                Avec les étiquettes <?php the_tags(); ?>
                <?php // echo $view; ?>
            </p>
        </div>

        <div class="post__content">
            <?php the_content(); ?>
        </div>

    </article>

<?php endwhile; endif; ?>
<?php get_footer(); ?>