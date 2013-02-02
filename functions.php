<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'BreakPoint Theme' );
define( 'CHILD_THEME_URL', 'http://www.themecraft.com/demo/breakpoint' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'breakpoint_viewport_meta_tag' );
function breakpoint_viewport_meta_tag() {
	
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';

}

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 1100,
	'height' => 120
) );

// Custom image sizes
add_image_size( 'Content Image', 760, 430, TRUE );

// Add header wrapper 
add_action( 'genesis_before_header',  'breakpoint_header_wrapper_div_open' );
function breakpoint_header_wrapper_div_open() {
	
	echo '<div id="headerwrapper">';

}

add_action( 'genesis_after_header',  'breakpoint_header_wrapper_div_close', 1 );
function breakpoint_header_wrapper_div_close() {
	
	echo '</div>';
}

// Add the after post section
add_action( 'genesis_after_post_content', 'breakpoint_after_post_area' );
function breakpoint_after_post_area() {
    
    if ( is_singular( 'post' ) )
    
    genesis_widget_area( 'after-post', array(
        'before' => '<div class="after-post-area widget-area">',
    	) 
	);
}

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// Register after post widget
genesis_register_sidebar( array(
	'id'			=> 'after-post',
	'name'			=> __( 'After Post', 'breakpoint' ),
	'description'	=> __( 'This is the after post area.', 'breakpoint' ),
	) 
);
