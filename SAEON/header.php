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

		<header id="site-header"  role="banner">
			<div class="s-container">
				<div class="s-col">
					<img src="" class="s-s-logo"/>
				</div>
				<div class="s-col">
					<h1 class="s-title"><a href="#"><?php echo get_option('blogname');  ?></a></h1>
					<span class="s-tagline"><?php echo get_option('blogdescription'); ?></a>
					<img src="<?php echo get_theme_mod('s-logo'); ?>" class="s-logo"/>
					

					<?php
						if ( get_theme_mod( 's-logo' ) ) {
							echo 's-logo is a thing';
						} else {
							echo 's-neep';
						}
					?>

					<?php get_template_part( 'include/s-menu' ); ?>
				</div>
			</div>
			xxx
		</header>


