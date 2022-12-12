<?php
define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());

function theme_files() {
	// Theme Files
	wp_register_style( 'theme-style', get_stylesheet_uri(), false, null);
	wp_enqueue_style( 'theme-style');
	wp_register_style( 'theme-styler', get_stylesheet_directory_uri().'/css/responsive.css', false, null);
	wp_enqueue_style( 'theme-styler');
	wp_register_style( 'font-css', get_stylesheet_directory_uri().'/css/fonts.css', false, null);
	wp_enqueue_style( 'font-css');
	
	
	// Owl Carousel Files
	wp_register_style( 'owl-carousel', get_stylesheet_directory_uri().'/owl-carousel/owl.carousel.css', false, '2.2.1' );
	wp_enqueue_style( 'owl-carousel');	
	wp_register_script( 'owl-carousel', get_stylesheet_directory_uri().'/owl-carousel/owl.carousel.js', array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'owl-carousel' );
	
	
	// Font Awesome
	wp_register_script( 'fontawesome', '//kit.fontawesome.com/b69272743e.js', true );
	wp_enqueue_script( 'fontawesome' );
}
add_action( 'wp_enqueue_scripts', 'theme_files' );

//Disable Gutenberg 
add_filter('use_block_editor_for_post', '__return_false');

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );


// Theme Options
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-pptions',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


// Owl Carousel
function load_owl_carousel() {
?>
<script type="text/javascript">
jQuery(document).ready(function(e) {
//Promotion strip Carousel
    jQuery(".promotion-strip-content").owlCarousel({ 
		loop: true,
		nav: true,
		responsiveClass: true,
		margin: 0,
        mouseDrag: false,
        autoplay: true,
        center: true,
        autoplayTimeout: 4000,
        smartSpeed: 400,
        dots: false,
        navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
});
</script>
<?php
}
add_action( 'wp_footer', 'load_owl_carousel', 99 );

// Register Sidebar
add_action( 'widgets_init', 'kv_widgets_init' );
function kv_widgets_init() {
	$sidebar_attr = array(
		'name' 			=> '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	);	
	$sidebar_id = 0;
	$gdl_sidebar = array("Blog", "Footer 1", "Footer 2", "Footer 3", "Footer 4", "Footer 5");
	foreach( $gdl_sidebar as $sidebar_name ){
		$sidebar_attr['name'] = $sidebar_name;
		$sidebar_attr['id'] = 'custom-sidebar' . $sidebar_id++ ;
		register_sidebar($sidebar_attr);
	}
}

// Register Navigation
function register_menu() {
	register_nav_menu('main-menu',__( 'Main Menu' ));
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_menu' );

// Image Crop
function codex_post_size_crop() {
	add_image_size("packages_image", 300, 200, true);
}
add_action("init", "codex_post_size_crop");

// Featured Image Function
add_theme_support( 'post-thumbnails' );

// Woocommerce Support
add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Allow SVG Upload
function my_theme_custom_upload_mimes( $existing_mimes ) {
$existing_mimes['svg'] = 'image/svg+xml';
// Return the array back to the function with our added mime type.
return $existing_mimes;
}
add_filter( 'mime_types', 'my_theme_custom_upload_mimes' );

function my_custom_mime_types( $mimes ) {
 
// New allowed mime types.
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';
 
// Optional. Remove a mime type.
unset( $mimes['exe'] );
 
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

//Cart On Header
function my_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
    $fragments['a.cart-contents'] = ob_get_clean(); 
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );


//Social Media Icons Shortcode
add_shortcode('social_icons', 'codex_social_icons');
function codex_social_icons() {
	ob_start();
	$social_icons = get_field('social_icons', 'option');
?>
    <ul class="social-icons">
		<?php foreach( $social_icons as $row ) {
		  $social_icon = $row['social_icon'];
	      $social_link = $row['social_link'];
		?>
	    <li>
	    	<?php echo '<a href="'.$social_link.'" target="_blank"><i class="fa-brands '.$social_icon.'"></i></a>'; ?>
	    </li>
    <?php } ?>
   </ul>
<?php
	return ''.ob_get_clean();	
}