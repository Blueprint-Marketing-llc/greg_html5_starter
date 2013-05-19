<?php 

// Add Viewport meta tag for mobile browsers
function gregr_viewport_meta_tag() {
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'."\n";
	echo '<meta name="HandheldFriendly" content="True" />'."\n";
	echo '<meta name="MobileOptimized" content="320" />'."\n";
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>'."\n";
}

// Change favicon location 
function gregr_favicon_filter( $favicon_url ) {
	return get_bloginfo('stylesheet_directory').'/images/favicon.png';
}

// Add scripts & styles
function gregr_load_custom_scripts() {
	  //wp_deregister_script( 'superfish' );
	  //wp_deregister_script( 'superfish-args' );
	  wp_register_script( 'html5', CHILD_URL . '/js/html5.js', array(), '3.6', false );
	  wp_register_script( 'theme', CHILD_URL . '/js/scripts.js', array( 'jquery' ), '1.0', true );

	  wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lora|Open+Sans+Condensed:300\" rel="stylesheet" type="text/css">' );
	  wp_register_style( 'theme-ie-only', CHILD_URL . '/css/child-style-ie.css' );
	 
	  wp_enqueue_script(array('html5','theme' ));
	  wp_enqueue_style(array( 'google-fonts', 'theme-ie-only' ));
}

// IE conditional wrapper
function gregr_ie_conditional( $tag, $handle ) {
    if ( 'theme-ie-only' == $handle )
        $tag = '<!--[if lte IE 8]>' . "\n" . $tag . '<![endif]-->' . "\n";
    return $tag;
}

// Remove version number from css and js
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}

// Footer creds
function gregr_footer_creds_text($creds) {
	if ( is_front_page()) {
$creds = '&copy;' .date('Y') .' '. get_bloginfo('name') .' <span id="footer-dev-creds">- Starter Theme By <a href="http://www.gregreindel.com">Greg Reindel</a> Powered By Genesis Famework</span>';
	}else {
$creds = '&copy; 2013 ' . get_bloginfo('name');
	}
 return  $creds;	
}

function gregr_footer_backtotop_text($backtotop) {
    $backtotop = '[footer_backtotop text=" "]';
    return $backtotop;
}

// Remove & add custom site title
// Below is the default markup
function gregr_custom_seo_site_title() {
	if(is_front_page()){ 
echo '<h1 id="title"><a title="'.get_bloginfo('name').'" href="'.get_bloginfo('url').'" rel="nofollow">'.get_bloginfo('name').'</a></h1>';
}else {
echo '<p id="title"><a title="'.get_bloginfo('name').'" href="'.get_bloginfo('url').'" rel="nofollow">'.get_bloginfo('name').'</a></p>';
}
}

// Remove & add custom post title
// Below is the default markup
function gregr_do_custom_post_title() {
	 echo the_title( '<h1 class="entry-title">' , '</h1>');
}

// Remove & add custom site description
// Below is the default markup
function gregr_custom_seo_site_description() {
	echo '<p id="description">'.get_bloginfo('description').'</p>';
}

// Remove Genesis widgets
function gregr_remove_genesis_widgets() {
    unregister_widget( 'Genesis_eNews_Updates' );
    unregister_widget( 'Genesis_Featured_Page' );
    unregister_widget( 'Genesis_User_Profile_Widget' );
    unregister_widget( 'Genesis_Menu_Pages_Widget' );
    unregister_widget( 'Genesis_Widget_Menu_Categories' );
    unregister_widget( 'Genesis_Featured_Post' );
    unregister_widget( 'Genesis_Latest_Tweets_Widget' );
}