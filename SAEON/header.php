<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<header id="s-header"  role="banner">
			<div class="s-container">
				<div class="s-col">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/s-s-logo.png" class="s-s-logo"/>
				</div>
				<div class="s-col">

					<?php
						if ( get_theme_mod( 's-logo' ) ) {
							echo '<img src="'.get_theme_mod('s-logo').' ?>" class="s-logo"/>';
						} else {
							echo '<h1 class="s-title"><a href="#">'. get_option('blogname').'</a></h1><span class="s-tagline">'. get_option('blogdescription').'</a>';
						}
					?>

					<?php get_template_part( 'include/s-menu' ); ?>
				</div>
			</div>
			xxx
		</header>


