<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); 

$top_header = get_field("top_header", "options");
?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', '_s' ); ?></a> -->
	<div id="top_header">
		
		<div class="columns">
			<div class="column">
				<div class="top-text">
					<?php 
					

					if (!empty($top_header["content"])) {
						echo $top_header["content"];
					}
					?>

					<div class="search_form">
						<form action="/" method="get">
							<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
							<button class="search_icon"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16 fa-3x"><path fill="currentColor" d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z" class=""></path></svg></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<header id="masthead" class="site-header">
		<div class="d-flex">			
			<div class="site-branding">
				<?php
				
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				
				if ($custom_logo_id) {
					$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home" title="<?php echo bloginfo( 'name' ); ?>">
						<img src="<?php echo $image[0]; ?>" />
						<?php if (!empty($top_header["sticky_logo"])): ?>
							<img class="sticky_logo" src="<?php echo $top_header["sticky_logo"]; ?>" />
						<?php endif; ?>
					</a>
					<?php
				} else {
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				}

				$_s_description = get_bloginfo( 'description', 'display' );
				if ( $_s_description || is_customize_preview() ) :
					?>
					
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-bars fa-w-14 fa-5x"><path fill="#fff" d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z" class=""></path></svg>
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-7x"><path fill="#fff" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>

				
			</nav><!-- #site-navigation -->
			
			<div class="left-logo">
			<?php
			if (!empty($top_header["left_logo"])):
			?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="left-logo" rel="home" title="<?php echo bloginfo( 'name' ); ?>" >
				<img src="<?php echo $top_header["left_logo"]; ?>" /></a>
			<?php
			
			endif;

			?>
			</div>
		</div>
	</header><!-- #masthead -->
	
	<?php

	$gradient_color = get_field("gradient_for_featured_image");
	$graident_class = "";

	if ($gradient_color) {
		$gradient_class = "gradient_bg";
	}
	
	if (is_search() || is_category()):		
		if (function_exists('z_taxonomy_image_url') && is_category()) {
			$url = z_taxonomy_image_url();
			$url = $url ? $url : get_field("banner_image", "option");

		} else {
			$url = get_field("banner_image", "option");
		}

		$title_text = is_category() ? single_cat_title("", false) : "Search";

		
	?>
		<div class="static-banner gradient_bg">		
		<div class="slide-item">
		<?php sod_generate_image_tag($url, ['bg']); ?>
			<div class="slide-title">
								
				<h2><?php echo $title_text; ?></h2>
			
			</div>
		</div>
		<div class="sod-main-seperatoer-inner">
		<svg class="uvc-x-large-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#fff" width="100%" height="220" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none" style="height: 220px;"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path></svg>
		</div>
		</div>
	<?php
	elseif (get_post_type() != "post" && (is_home() || is_front_page())):
	$header = get_field('home_slider', 'options');				
	?>
	<div class="banner-slider">
		<?php 
		if (!empty($header["slide"])):
			$slides = $header["slide"];
		foreach ($slides as $head): 
		?>
		<div class="slide-item">			
			<?php if (isset($head["image"])) : ?>			
			<?php sod_generate_image_tag($head["image"], ['bg']); ?>
			<?php endif; ?>

			<?php if (!empty($head["content"])):?>
				<div class="slide-content">
					<?php echo $head["content"]; ?>
					<div class="button-read-more">
						<a href="<?php echo $head["url"]; ?>" class="s-btn s-normal" ><?php echo !empty($head["button"]) ? $head["button"] : "LEARN MORE"; ?></a>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php
		endforeach;
		endif;
		?>		
	</div>
	<div class="sod-main-seperatoer-inner">
	<svg class="uvc-x-large-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#fff" width="100%" height="220" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none" style="height: 220px;"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path></svg>
	</div>
	<?php else:
	$page_title = get_query_var( 'pagename' );
	if (is_page() || !$page_title):
	global $post;
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); 
	$url = $url ? $url : get_field("banner_image", "option");
		?>

	<div class="static-banner gradient_bg">		
		<div class="slide-item">
		<?php sod_generate_image_tag($url, ['bg']); ?>
			<div class="slide-title">
				
				<?php the_title('<h2>', '</h2>'); ?>
				
				
			</div>
		</div>
		<div class="sod-main-seperatoer-inner">
		<svg class="uvc-x-large-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#fff" width="100%" height="220" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none" style="height: 220px;"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path></svg>
		</div>
	</div>
	<?php else: 
	$apage = get_page_by_path( $page_title );
	$url = wp_get_attachment_url( get_post_thumbnail_id($apage), 'full' ); 
	$url = $url ? $url : get_field("banner_image", "option");
		?>
		
		<div class="static-banner gradient_bg">		
		<div class="slide-item">
		<?php sod_generate_image_tag($url, ['bg']); ?>
			<div class="slide-title">
								
				<h2><?php echo get_the_title( $apage); ?></h2>
			
			</div>
		</div>
		<div class="sod-main-seperatoer-inner">
		<svg class="uvc-x-large-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="#fff" width="100%" height="220" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none" style="height: 220px;"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"></path></svg>
		</div>
	</div>
	<?php endif; ?>
	<?php endif;?>