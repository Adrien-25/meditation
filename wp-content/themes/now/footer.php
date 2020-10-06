<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage now
 */

?>
    </div> <!-- .main-area -->
    <?php
    if ( ( ! is_front_page() || '1' == now_get_theme_mod( 'is_home_footer' )) && ! is_page_template( 'page-templates/no-content-footer.php' ) ) 
    ?>

    <footer id="colophon" class="site-footer">
        <?php do_action('now_site_info'); ?>
    </footer><!-- #colophon -->
	</div><!-- #page -->
	<?php wp_footer(); ?>

</body>
</html>