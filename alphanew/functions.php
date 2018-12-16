<?php 

//die(site_url()); site ber korar niom
if (site_url()=="http://sazid.alphan.com") {
	define("VERSION", time());
} else {
	define("VERSION", wp_get_theme()->get("Version"));
}
// Version check
// echo VERSION;
// die();

if ( ! function_exists('alphan_setup_theme') ) :

function alphan_setup_theme() {
	load_theme_textdomain( 'alphan' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	$alphan_custom_logo_details = array(
		'width'	=> '100',
		'height'=> '100'
	);
	add_theme_support( 'custom-logo', $alphan_custom_logo_details );

	$alphan_custom_header_details = array(
		'header-text'		=> true,
		'default-text-color'=> '#222',
		'width'				=> 1200,
		'height'			=> 600,
		'flex-width'		=> true,
		'flex-height'		=> true
	);
	add_theme_support( 'custom-header', $alphan_custom_header_details );

	add_theme_support( 'custom-background' );

	add_theme_support( 'post-formats', array('aside','image','quote','audio','video','link','chat') );

	register_nav_menu( 'topmenu',__('Top Menu', 'alphan') );
	register_nav_menu( 'footermenu', __('Footer Menu', 'alphan') );

}
endif;
add_action( 'after_setup_theme', 'alphan_setup_theme' );


/**
 * Enqueue scripts and styles.
*/
function alphan_scripts(){
	// echo basename(get_page_template());
	// die();

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), 'v4.1.3', 'all' );
	wp_enqueue_style( 'featherlight', get_template_directory_uri().'/assets/css/featherlight.min.css', array(), 'v1.7.13', 'all' );
	wp_enqueue_style('dashicons');
	wp_enqueue_style( 'alphan-default', get_template_directory_uri().'/assets/css/default.css', array(), 'v1.0', 'all' );
	wp_enqueue_style( 'alphan-style', get_stylesheet_uri(), null, VERSION );

	wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper-1.14.3.min.js', array('jquery'), 'v1.14.3', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), 'v4.1.3', true );
	wp_enqueue_script( 'featherlight', get_template_directory_uri().'/assets/js/featherlight-1.7.13.min.js', array('jquery'), 'v1.7.13', true );
	wp_enqueue_script( 'alphan-main', get_theme_file_uri().'/assets/js/main.js', array('jquery','featherlight'), VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'alphan_scripts' );

/**
 * Register widgets area
*/
function alphan_widgets_init(){
	register_sidebar( array(
		'name'			=> esc_html__( 'Sidebar', 'alphan' ),
		'id'			=> 'sidebar-1',
		'description'	=> esc_html__( 'Add sidebar widget here', 'alphan' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h2 class="widget-title">',
		'after_title'	=> '</h2>'
	) );
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer', 'alphan' ),
		'id'			=> 'footer',
		'description'	=> esc_html__( 'Add footer area widgets here', 'alphan' ),
		'before_widget'	=> '<div id="%1$s" class="col widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '',
		'after_title'	=> ''
	) );

}
add_action( 'widgets_init', 'alphan_widgets_init' );

// The excerpt with password
function alphan_the_excerpt($excerpt){
	if (!post_password_required()) {
		return $excerpt;
	} else {
		echo get_the_password_form();
	}
}
add_filter( 'the_excerpt', 'alphan_the_excerpt' );

// Portected title format 
function alphan_protected_title_format() {
	return "%s";
}
add_filter( 'protected_title_format', 'alphan_protected_title_format' );

// Nav menu css class 
function alphan_nav_menu_css_class($classes , $item) {
	$classes[] = 'list-inline-item';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'alphan_nav_menu_css_class', 10, 2 );

function alphan_about_page_template_banner(){
	if (is_page()) {
		$alphan_feature_img = get_the_post_thumbnail_url( null, 'large' );
		?>
		<style>
			.page-header {
				background-image: url(<?php echo $alphan_feature_img; ?>);
			}
		</style>
		<?php
	}

	if (is_front_page()) {
		if (current_theme_supports( "custom-header" )) {
			?>
			<style>
				.header {
					background-image: url(<?php echo header_image(); ?>);
					-webkit-background-size: cover;
				    background-size: cover;
				    background-position: center;
				    padding: 100px 0;
				    margin-bottom: 50px;
				}

				.header h1.heading a, h3.tagline {
					color: #<?php echo get_header_textcolor(); ?>

					<?php 
						if(!display_header_text()) {
							echo "display: none;";
						}
					?>
				}
			</style>
			<?php
		}
	}
}
add_action( 'wp_head', 'alphan_about_page_template_banner', 11 );

// Remove and add specific class from body class
function alphan_body_class($classes) {
	// Remove Class
	unset($classes[array_search('single-post-new', $classes)]);
	unset($classes[array_search('single-aside', $classes)]);
	// Add Class
	$classes[] = 'newClass';
	return $classes;
}
add_filter( 'body_class', 'alphan_body_class' );

// Remove and add Specific class from post class
function alphan_post_class($classes) {
	// Remove Class
	unset($classes[array_search('aside-new-post', $classes)]);
	// Add Class
	$classes[] = 'newPostClass';
	return $classes;
}
add_filter( 'post_class', 'alphan_post_class' );