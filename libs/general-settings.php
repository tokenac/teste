<?php

///////////////////////////////////////////////////////////////////////////////////////////
/////// disable toolbar for subscribers
///////////////////////////////////////////////////////////////////////////////////////////

if (!current_user_can('manage_options') ) { show_admin_bar(false); }

///////////////////////////////////////////////////////////////////////////////////////////
/////// Define thumb sizes
///////////////////////////////////////////////////////////////////////////////////////////

function wpestate_image_size(){
    add_image_size('user_picture_profile', 255, 143, true);
    add_image_size('agent_picture_single_page', 314, 180, true);
    add_image_size('agent_picture_thumb' , 120, 120, true);
    add_image_size('blog_thumb'          , 272, 189, true);
    add_image_size('blog_unit'           , 1110, 385, true);
    add_image_size('slider_thumb'        , 143,  83, true);
    add_image_size('property_featured_sidebar',261,225,true);
    add_image_size('blog-full'           , 940, 529, true);
    add_image_size('property_listings'   , 265, 163, true);
    add_image_size('property_full'       , 980, 777, true);
    add_image_size('listing_full_slider' , 835, 467, true);
    add_image_size('listing_full_slider_1', 1110, 623, true);
    add_image_size('property_featured'   , 940, 390, true);
    add_image_size('property_full_map'   , 1920, 790, true);
    add_image_size('property_map1'       , 400, 161, true);
    add_image_size('widget_thumb'        , 105, 70, true);
    add_image_size('user_thumb'          , 45, 45, true);
    add_image_size('custom_slider_thumb'          , 36, 36, true);
    add_image_size('blog_unit'           , 1110, 385, true);
    set_post_thumbnail_size(  250, 220, true);
}
///////////////////////////////////////////////////////////////////////////////////////////
/////// register sidebars
///////////////////////////////////////////////////////////////////////////////////////////



if( !function_exists('wpestate_widgets_init') ):
function wpestate_widgets_init() {
    register_nav_menu( 'primary', __( 'Primary Menu', 'wpestate' ) ); 
    register_nav_menu( 'footer_menu', __( 'Footer Menu', 'wpestate' ) ); 
    
    register_sidebar(array(
        'name' => __('Primary Widget Area', 'wpestate'),
        'id' => 'primary-widget-area',
        'description' => __('The primary widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title-sidebar">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Secondary Widget Area', 'wpestate'),
        'id' => 'secondary-widget-area',
        'description' => __('The secondary widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title-sidebar">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'wpestate'),
        'id' => 'first-footer-widget-area',
        'description' => __('The first footer widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title-footer">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'wpestate'),
        'id' => 'second-footer-widget-area',
        'description' => __('The second footer widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title-footer">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'wpestate'),
        'id' => 'third-footer-widget-area',
        'description' => __('The third footer widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title-footer">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Fourth Footer Widget Area', 'wpestate'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('The fourth footer widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title-footer">',
        'after_title' => '</h3>',
    ));
    
    
    register_sidebar(array(
        'name' => __('Top Bar Left Widget Area', 'wpestate'),
        'id' => 'top-bar-left-widget-area',
        'description' => __('The top bar left widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));
       
    register_sidebar(array(
        'name' => __('Top Bar Right Widget Area', 'wpestate'),
        'id' => 'top-bar-right-widget-area',
        'description' => __('The top bar right widget area', 'wpestate'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));
       
       
}
endif; // end   wpestate_widgets_init  


/////////////////////////////////////////////////////////////////////////////////////////
///// custom excerpt
/////////////////////////////////////////////////////////////////////////////////////////



if( !function_exists('wp_estate_excerpt_length') ):
function wp_estate_excerpt_length($length) {
    return 64;
}
endif; // end   wp_estate_excerpt_length  


/////////////////////////////////////////////////////////////////////////////////////////
///// custom excerpt more
/////////////////////////////////////////////////////////////////////////////////////////


if( !function_exists('wpestate_new_excerpt_more') ):
function wpestate_new_excerpt_more( $more ) {
	return ' ...';
}
endif; // end   wpestate_new_excerpt_more  



/////////////////////////////////////////////////////////////////////////////////////////
///// strip words
/////////////////////////////////////////////////////////////////////////////////////////

if( !function_exists('wpestate_strip_words') ):
function wpestate_strip_words($text, $words_no) {
    $temp = explode(' ', $text, ($words_no + 1));
    if (count($temp) > $words_no) {
        array_pop($temp);
    }
    return implode(' ', $temp);
}
endif; // end   wpestate_strip_words 

/////////////////////////////////////////////////////////////////////////////////////////
///// add extra div for wp embeds
/////////////////////////////////////////////////////////////////////////////////////////

function wpestate_embed_html( $html ) {
    if (strpos($html,'twitter') !== false) {
        return '<div class="video-container-tw">' . $html . '</div>';
    }else{
        return '<div class="video-container">' . $html . '</div>';
    }
  
}
add_filter( 'embed_oembed_html', 'wpestate_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'wpestate_embed_html' ); // Jetpack

/////////////////////////////////////////////////////////////////////////////////////////
///// html in conmment
/////////////////////////////////////////////////////////////////////////////////////////
add_action('init', 'wpestate_html_tags_code', 10);
function wpestate_html_tags_code() {
  
  global $allowedposttags, $allowedtags;
  $allowedposttags = array(
      'strong' => array(),
      'em' => array(),
      'pre' => array(),
      'code' => array(),
      'a' => array(
        'href' => array (),
        'title' => array ())
  );
 
  $allowedtags = array(
      'strong' => array(),
      'em' => array(),
      'pre' => array(),
      'code' => array(),
      'a' => array(
        'href' => array (),
        'title' => array ())
  );
}

?>