<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage now
 * @since Now 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php if( is_front_page() ) 
        do_action('splash_header');
    ?>
    <div id="page" class="hfeed site">
        <!-- Header -->
        <header id="masthead" class="site-header" role="banner">

            <?php do_action('now_header'); ?>
        
        </header><!-- #masthead -->

        <div class="main-area">