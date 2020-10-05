<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage now
 * @since Now 1.0.0
 */

define ( 'NOW_VERSION', '1.0.0' );

if ( ! function_exists( 'now_setup' ) ) :

/**
 * now setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * @since Now 1.0.0
 */

function now_setup() {

    $defaults = now_get_defaults();

	/* default values */
	global $now_defaults;
	$now_defaults = null;
	if ( '1' == now_get_theme_mod( 'is_show_top_menu' ) )
		register_nav_menu( 'top1', __( 'Top Menu', 'now' ));

		add_theme_support( 'title-tag' );
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-background', array(
			'default-color' => 'cccccc',
		) 
	);
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( now_get_theme_mod( 'post_thumbnail_size' ) , 9999 ); 

	$args = array(
		'default-image'          => esc_url( get_template_directory_uri() ) . '/img/header.jpg',
		'header-text'            => true,
		// 'default-text-color'     => now_text_color(get_theme_mod('color_scheme'), $defaults ['color_scheme']),
		'width'                  => absint( now_get_theme_mod('size_image') ),
		'height'                 => absint( now_get_theme_mod('size_image_height') ),
		'flex-height'            => true,
		'flex-width'             => true,
	);
	add_theme_support( 'custom-header', $args );

	// Add theme support for Starter Content
	$starter_content = array(
		// Set up nav menu
		'nav_menus' => array(
			'top1' => array(
				'name' => __( 'Top Menu', 'now' ),
				'items' => array(
					'link_home', 
					'page_blog',
					'page_category',
					'page_contact',
				),
			),
		),
	);
	add_theme_support( 'starter-content', $starter_content );

}
add_action( 'after_setup_theme', 'now_setup' );
endif;

/**
 * Return the Google font stylesheet URL if available.
 *
 * @since Now 1.0.0
 */
function now_get_font_url() {

	$font_url = '';
	$font = str_replace( ' ', '+', now_get_theme_mod( 'font_1' ) );
	$font_2 = str_replace( ' ', '+', now_get_theme_mod( 'font_2' ) );
	$font_3 = str_replace( ' ', '+', now_get_theme_mod( 'font_3' ) );

	if ( '' == $font && '' == $font_2 && '' == $font_3 ) 
		return $font_url;
	if ( '' != $font && '' != $font_2 )
		$font .= '%7C';
		
	$font .= $font_2;	
	
	if ( '' != $font && '' != $font_3 )
		$font .= '%7C';

	$font .= $font_3;
	
	$subsets = 'latin,latin-ext';
	$family = $font . ':300,400';

	$font_url = "//fonts.googleapis.com/css?family=" . $family . '&' . $subsets;

	return $font_url;
}


/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Now 1.0.0
 */
function now_scripts_styles() {

	$defaults = now_get_defaults();

	// Add Genericons font.
	wp_enqueue_style( 'now-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), NOW_VERSION );

	$font_url = now_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'now-fonts', esc_url_raw( $font_url ), array(), NOW_VERSION );

	// Loads our main stylesheet.
	wp_enqueue_style( 'now-style', get_stylesheet_uri(), array(), NOW_VERSION );

	// Adds JavaScript for handing the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'now-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), NOW_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'now_scripts_styles' );	 
/**
 * Return array: default theme options
 *
 * @since Now 1.0.0
 */
 
function now_get_defaults() {

	global $now_defaults;
	
	if(isset($now_defaults)) {
		return $now_defaults;
	}
	
	$defaults = array(  'is_thumbnail_empty_icon' => '',
					    'is_cat' => '1',
						'is_author' => '1',
						'is_date' => '1',
						'is_views' => '',
						'is_comments' => '1',
						'blog_is_cat' => '1',
						'blog_is_author' => '1',
						'blog_is_date' => '1',
						'blog_is_views' => '',
						'blog_is_comments' => '1',
						'blog_is_entry_meta' => '1',
						'blog_is_cat' => '1',
						'is_sticky_first_menu' => '1',
						'site_style' => 'full',
						'is_defaults_post_thumbnail_background' => '1',
						'logotype_url' =>  esc_url( get_template_directory_uri() ) . '/img/logo.png',
						'scrolltype_url' =>  esc_url( get_template_directory_uri() ) . '/img/scroll.png',
						'is_show_top_menu' => '1',
						'post_thumbnail_size' => '400',
						'scroll_button' => 'none',
						'scroll_animate' => 'none',
						'is_header_on_front_page_only' => '',
						'font_scheme' => 2,
						'font_1' => 'Lora',
						'font_2' => 'Lora',
						'font_3' => 'Tangerine',
						'site_font' => 1,
						'header_font' => 2,
						'description_font' => 3,
						'menu_font' => 2,
						'submenu_font' => 1,
						'title_font' => 2,
						'link_font' => 2,
						'cat_font' => 2,
						'meta_font' => 1,
						'w_font' => 1,
						'w_title_font' => 2,
						'w_link_font' => 1,
						'color_scheme' => 0,
						'subset_cyrillic' => '1',
						'subset_greek' => '',
						'subset_latin' => '1',
						'subset_vietnamese' => '',
						'subset_thai' => '',
						'subset_arabic' => '',
						'is_text_on_front_page_only' => '',
						'front_page_style' => '1',	
						'is_home_footer' => '1',
						'unit' => 1,
						'width_site' => '1680',
						'width_main_wrapper' => '1680',
						'width_top_widget_area' => '1680',
						/* Header Image size */
						'size_image' => '1680',
						'size_image_height' => '400',
						/* Header Image and top sidebar wrapper */
						'width_image' => '1680',
						'width_content' => '1680',
						'header_style' => 'full',
						'content_style' => 'boxed',
						'width_column_1_rate' => '25',
						'width_column_1_left_rate' => '33',
						'width_column_1_right_rate' => '33',
						'width_column_2_rate' => '25',
						/* post: excerpt/content */
						'single_style' => 'excerpt',
						'is_display_post_image' => '1',
						'is_display_post_tags' => '1',
						'is_display_post_cat' => '1',
						/* page: excerpt/content */
						'page_style' => 'excerpt',
						'is_display_page_image' => '1',
						'empty_image' => esc_url( get_template_directory_uri() ) . '/img/empty.png',
						'footer_text' => '<a href="' . esc_url( __( 'http://wordpress.org/', 'now' ) ) . '">' . __( 'Powered by WordPress', 'Now' ). '</a> | ' . __( 'theme ', 'now' ) . '<a href="' .  esc_url( __( '#', 'now') ) . '">Now</a>',
						'is_show_cat' => '1',
						/* customiser panels */
						'is_custom_colors' => '1',
						/* animation */
						'is_animate_header' => '1',
						'header_effect_class' => '10',
						'menu_effect_class' => '14',
						'blog_effect_class' => '5',
						'sidebar_effect_class' => '13',
						'is_restart_blog' => '',
						'is_restart_header' => '1',
						'is_restart_sidebar' => '',
						'fixed_1_widget' => '1',
						'fixed_2_widget' => '1',
						'fixed_1_widget_num' => '10',
						'fixed_2_widget_num' => '1',
						'is_display_read_more' => '1',
						'read_more_text' => __( 'See More', 'now' ),
						'width_mobile_switch' => 960,
						'is_custom_widgets' => '1',
						'is_display_donate' => '1',
				);
	return apply_filters( 'now_option_defaults', $defaults );
}
/**
* Return theme mod
*
* @since Now 1.0.0
*/
function now_get_theme_mod( $name ) {
	$defaults = now_get_defaults();
	return apply_filters ( 'now_theme_mod', get_theme_mod( $name, $defaults[$name] ), $name );
}

/**
 * Top menu and site name
 *
 * @since Now 1.0.0
 */
function splash_header() {
?>
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		<div id="splash-header" class="splash-header">
			<span>Welcome</span>
			<div>
				<h1 class="splash-title"><?php echo bloginfo( 'name' ); ?></h1>
				<h2>NOTHING ELSE</h2>
			</div>
			<a class="splash-scroll" href="#site-header">
				<div class="scroll animated fadeInUp"></div>
			</a>
		</div><!-- .splash-header -->
	<?php endwhile; endif; 
}
add_action('splash_header', 'splash_header');
function now_header() {
?>

	<div id="site-header" class="site-header">
		<!-- First Top Menu -->
		<div class="menu-top top-1-navigation">
			<?php if ( now_get_theme_mod( 'is_show_top_menu' ) == '1' ) : ?>
				<nav class="horisontal-navigation menu-1" role="navigation">
					<?php if ( '' != now_get_theme_mod( 'logotype_url' ) ) : ?>
					<a class="small-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>'
						title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
						<img src='<?php echo esc_url( now_get_theme_mod( 'logotype_url' ) ); ?>' class="menu-logo"
							alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					</a><!-- .logo-section -->
					<?php endif; ?>
					<span class="toggle"><span class="menu-toggle"></span></span>
					<?php wp_nav_menu( array( 'theme_location' => 'top1', 'menu_class' => 'nav-horizontal' ) ); ?>
				</nav><!-- .menu-1 .horisontal-navigation -->
				<?php endif; ?>
		</div><!-- .menu-top  -->
	</div><!-- .site-header -->
<?php
}
add_action('now_header', 'now_header');

function now_slider_image(){
	if (  now_get_theme_mod( 'is_header_on_front_page_only' ) != '1' || is_front_page()  ) : ?>	
		
		<!-- Banner -->
		<div class="image-container">
			<div class="image-wrapper">
				<div class="image-text-wrap">
					<div class="image-text">
						<!-- Description -->
						<div class="site-description">
							<h2><?php echo bloginfo( 'description' ); ?></h2>
						</div><!-- .site-description -->
						
					</div><!-- .image-text -->
					<a class="header-image-layout" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php header_image(); ?>" class="header-image" alt="Meditation" />
					</a>
					<hr class="">
				</div><!-- .image-text-wrap -->
			</div><!-- .image-wrapper -->
		</div><!-- .image-container -->
	
	
<?php endif;
}
add_action('now_slider_image', 'now_slider_image');

function sticky_posts() {
	/* Get all sticky posts */
	$sticky = get_option( 'sticky_posts' );
	/* Sort the stickies with the newest ones at the top */
	rsort( $sticky );
	/* Get the 3 newest stickies */
	$sticky = array_slice( $sticky, 0, 3 );
	/* stiky posts settings */
	$args2 = array(
		'posts_per_page' => 10,
		'post__in' => $sticky,
		// 'ignore_sticky_posts' => 1
	);
	/* Query sticky posts */
	$query = new WP_Query( $args2 );
	// The Loop
	if ( $query->have_posts() ) {
		echo '<ul class="sticky-posts">';
		while ( $query->have_posts() ) {
			$query->the_post();
			echo '<li id="post-'. get_the_ID() .'">';
			echo '<div class="sp-thumbnail">';
			if (has_post_thumbnail()) :
				echo get_the_post_thumbnail() ;
			else :
				echo '<img src="'. esc_url( now_get_theme_mod( 'empty_image' ) ).'">';
			endif;
			echo '</div>';
			echo '<div class="sp-content">';
				echo '<h3 class="sp-title">' . get_the_title() . '</h3>';
				echo '<div class="sp-excerpt">' . get_the_excerpt() . '</div>';
				echo '<a class="sp-link" href="' . get_permalink() . '">Read more</a>';
				
			echo '</div>';
			echo '<hr>';
			echo '</li>';
		}
		echo '</ul>';
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}
add_action('sticky_posts', 'sticky_posts'); 

/**
 * Fallback Menu
 *
 * @since Now 1.0.0
 */
function now_empty_menu() {
	return wp_page_menu( 'menu_class=nav-horizontal');
}