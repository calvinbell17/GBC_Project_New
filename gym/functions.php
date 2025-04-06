<?php 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_gym_master_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_gym_master_setup() {
	$GLOBALS['content_width'] = apply_filters( 'skt_gym_master_content_width', 640 );
	load_theme_textdomain( 'skt-gym-master', get_stylesheet_directory_uri() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 65,
		'width'       => 190,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-gym-master' )				
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f7fafc'
	) );
} 
endif; // skt_gym_master_setup
add_action( 'after_setup_theme', 'skt_gym_master_setup' );

function skt_gym_master_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-gym-master' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-gym-master' ),
		'id'            => 'fc-1-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-gym-master' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-gym-master' ),
		'id'            => 'fc-2-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-gym-master' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-gym-master' ),
		'id'            => 'fc-3-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-gym-master' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-gym-master' ),
		'id'            => 'fc-4-rfl',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'skt_gym_master_widgets_init' );


add_action( 'wp_enqueue_scripts', 'skt_gym_master_enqueue_styles' );
function skt_gym_master_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

add_action( 'wp_enqueue_scripts', 'skt_gym_master_child_styles', 99);
function skt_gym_master_child_styles() {
  wp_enqueue_style( 'skt-gym-master-child-style', get_stylesheet_directory_uri()."/css/responsive.css" );
} 

function skt_gym_master_admin_style() {
  wp_enqueue_script('skt-gym-master-admin-script', get_stylesheet_directory_uri()."/js/skt-gym-master-admin-script.js");
}
add_action('admin_enqueue_scripts', 'skt_gym_master_admin_style');

function skt_gym_master_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_gym_master_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-gym-master-about-page-style', get_stylesheet_directory_uri() . '/css/skt-gym-master-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_gym_master_admin_about_page_css_enqueue' );

function skt_gym_master_admin_css_style() {
  wp_enqueue_style('skt-gym-master-admin-style', get_stylesheet_directory_uri()."/css/skt-gym-master-admin-style.css");
}
add_action('admin_enqueue_scripts', 'skt_gym_master_admin_css_style');

function skt_gym_master_dequeue_skt_gym_custom_js() {
	wp_dequeue_script('skt-gym-custom-js', get_template_directory_uri()."/js/custom.js");
}
add_action( 'wp_enqueue_scripts', 'skt_gym_master_dequeue_skt_gym_custom_js', 20 );

add_action( 'wp_enqueue_scripts', 'skt_gym_master_child_navigation', 99);
function skt_gym_master_child_navigation() {
  wp_enqueue_script('skt-gym-master-custom-js', get_stylesheet_directory_uri()."/js/custom.js");	
  wp_enqueue_script( 'skt-gym-master-child-navigation', get_stylesheet_directory_uri(). '/js/navigation.js', array(), '01062020', true );
}

/**
 * Show notice on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	add_action( 'admin_notices', 'skt_gym_master_activation_notice' );
}
function skt_gym_master_activation_notice(){
    ?>
    <div class="notice notice-info is-dismissible"> 
        <div class="skt-gym-master-notice-container">
        	<div class="skt-gym-master-notice-img"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/icon-skt-templates.png' ); ?>" alt="<?php echo esc_attr('SKT Templates');?>" ></div>
            <div class="skt-gym-master-notice-content">
            <div class="skt-gym-master-notice-heading"><?php echo esc_html__('Thank you for installing SKT Gym Master!', 'skt-gym-master'); ?></div>
            <p class="largefont"><?php echo esc_html__('SKT Gym Master comes with 150+ ready to use Elementor templates. Install the SKT Templates plugin to get started.', 'skt-gym-master'); ?></p>
            </div>
            <div class="skt-gym-master-clear"></div>
        </div>
    </div>
    <?php
}

if ( ! function_exists( 'skt_gym_master_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_gym_master_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function skt_gym_master_load_dashicons(){
   wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'skt_gym_master_load_dashicons', 999);

/**
 * Retrieve webfont URL to load fonts locally.
 */
/**
* Enqueue theme fonts.
*/
function skt_gym_master_fonts() {
$fonts_url = skt_gym_master_get_fonts_url();

// Load Fonts if necessary.
if ( $fonts_url ) {
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
	wp_enqueue_style( 'skt-gym-master-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
}
}
add_action( 'wp_enqueue_scripts', 'skt_gym_master_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'skt_gym_master_fonts', 1 );
 
function skt_gym_master_get_fonts_url() {
	$font_families = array(
		'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
		'Assistant:200,300,400,500,600,700,800',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'skt_gym_master_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

define('SKT_GYM_MASTER_SKTTHEMES_URL','https://www.sktthemes.org');
define('SKT_GYM_MASTER_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/gym-wordpress-theme/');
define('SKT_GYM_MASTER_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-physical-fitness-wordpress-theme/');
define('SKT_GYM_MASTER_SKTTHEMES_THEME_DOC','https://www.sktthemesdemo.net/documentation/skt-gym-master-doc/');
define('SKT_GYM_MASTER_SKTTHEMES_LIVE_DEMO','https://sktthemesdemo.net/gym_master/');
define('SKT_GYM_MASTER_SKTTHEMES_THEMES','https://www.sktthemes.org/themes');
define('SKT_GYM_MASTER_SKTTHEMES_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

function skt_gym_master_remove_parent_function(){	 
	remove_action( 'admin_notices', 'skt_gym_activation_notice');
	remove_action( 'admin_menu', 'skt_gym_abouttheme');
	remove_action( 'customize_register', 'skt_gym_customize_register');
	remove_action( 'wp_enqueue_scripts', 'skt_gym_custom_css');
}
add_action( 'init', 'skt_gym_master_remove_parent_function' );

function skt_gym_master_remove_parent_theme_stuff() {
    remove_action( 'after_setup_theme', 'skt_gym_setup' );
}
add_action( 'after_setup_theme', 'skt_gym_master_remove_parent_theme_stuff', 0 );

function skt_gym_master_unregister_widgets_area(){
	unregister_sidebar( 'fc-1' );
	unregister_sidebar( 'fc-2' );
	unregister_sidebar( 'fc-3' );
	unregister_sidebar( 'fc-4' );
}
add_action( 'widgets_init', 'skt_gym_master_unregister_widgets_area', 11 );

require_once get_stylesheet_directory() . '/inc/about-themes.php';  
require_once get_stylesheet_directory() . '/inc/customizer.php';