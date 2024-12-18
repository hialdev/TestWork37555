<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.22/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header py-2 mb-0" role="banner" style="<?php storefront_header_styles(); ?>;margin-bottom: 0px !important">
		<div class="container mx-auto px-5 md:px-12 py-5 flex items-center gap-3 justify-between">
			<div class="flex items-center gap-3">
				<?php
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						$logo = get_custom_logo();
					}
				?>
				<div class="image-logo">
					<?php echo $logo //img with .custom-logo?> 
				</div>
				<div class="hidden sm:block">
					<div class="text-2xl font-bold"><?php echo get_bloginfo( 'name' ); ?></div>
					<p class="text-sm"><?php echo get_bloginfo( 'description' ); ?></p>
				</div>
			</div>
			<div class="">
				<nav class="al-nav"> <!-- Custom Navigation -->
					<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'al-primary-navigation',
							)
						);
					?>
				</nav>
			</div>
		</div>
  </header><!-- #masthead -->
