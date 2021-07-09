<?php

define( 'SOD_VERSION', rand());

function sod_scripts() {
    wp_register_style( 'theme-font', get_stylesheet_directory_uri() . '/style.css', array(), SOD_VERSION );
    wp_enqueue_style( 'theme-font' );

    wp_register_style( 'sod-style', get_stylesheet_directory_uri() . '/dist/css/app.css', array(), SOD_VERSION );
    wp_enqueue_style( 'sod-style');

    wp_deregister_style('_s-style');

    wp_register_script('sod-lib', get_stylesheet_directory_uri() .'/vendor/lib.js', array('jquery'), SOD_VERSION);
    wp_enqueue_script( 'sod-lib' );
    
    wp_register_script('sod-script', get_stylesheet_directory_uri() .'/vendor/theme.js', array ('jquery', 'sod-lib'), SOD_VERSION);
    wp_enqueue_script( 'sod-script' );

    
}

add_action( 'wp_enqueue_scripts', 'sod_scripts', 11 );

// function sod_file_types_to_uploads ($file_types) {
//     $new_filetypes = array();
//     $new_filetypes['svg'] = 'image/svg+xml';
//     $file_types = array_merge($file_types, $new_filetypes );
//     return $file_types;
// }

// add_filter( 'upload_mimes', 'sod_file_types_to_uploads ');

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
function sod_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter( 'upload_mimes', 'sod_mime_types' );

function sod_register_new_menu() {
    register_nav_menus(
        array(
            'secondary-menu' => __('Secondary', 'Sod')
        )
    );

    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonial','Sod' ),
                'singular_name' => __( 'Testimonial Item','Sod' ),
                'add_item' => __('New Testimonial Item','Sod'),
                'add_new_item' => __('Add New Testimonial Item','Sod'),
                'edit_item' => __('Edit Testimonial Item','Sod')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => $slug),
            'menu_position' => 4,
            'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments')
        )
    );
    
}

add_action( 'init', 'sod_register_new_menu');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
        'menu-slug'     => 'theme-header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
        'menu-slug'     => 'theme-footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

function sod_generate_image_tag($url, $classes=[]) {
    if ($url) {
        list($width, $height, $type, $attr) = getimagesize($url);
        $className = implode(" ", $classes);
        $placeholder = get_stylesheet_directory_uri() . '/img/transparent.png';
        echo "<img src='$placeholder'  src='$placeholder' width='$width' height='$height' class='lazy $className' data-src='$url' />";
    }

    return ;
}

function sod_change_video_url ($url) {
    $url = str_replace("//vimeo.com/", "//player.vimeo.com/video/", $url);
    $url = str_replace(["//youtu.be/"], "//www.youtube.com/embed/", $url);
    return $url;
}


function sod_get_excerpt($idd){
    $excerpt = get_the_excerpt();
    $aut='';
    if($excerpt!='')
    {
        $charlength=200;

        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                $aut.= mb_substr( $subex, 0, $excut );
            } else {
                $aut.= $subex;
            }
            $aut.= '...';
        } else {
            $aut.= $excerpt;
        }
    }
    else {
        $excerpt = wp_strip_all_tags(do_shortcode(get_the_content(null, false, $idd)));
        $charlength=200;

        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                $aut.= mb_substr( $subex, 0, $excut );
            } else {
                $aut.= $subex;
            }
           
        } else {
            $aut.= $excerpt;
        }
        
    }

    if($excerpt=='' && $content=='')  $aut='';
    return $aut;
}


if ( ! function_exists( 'sod_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function sod_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date("M jS, Y") ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><em>' . $time_string . '</em></a>';

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;


add_filter( 'pre_get_posts', function ($query) {
    if (!$query->is_admin && $query->is_search) {
        $query->set( 'post_type', array( 'post', 'page', 'testimonial'));
    }

    return $query;
});