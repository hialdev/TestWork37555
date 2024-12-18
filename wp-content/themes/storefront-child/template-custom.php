<?php
/**
 * The template for displaying Custom pages.
 *
 * Template Name: Custom
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">

			<?php
				get_template_part( 'content', 'page' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('header.entry-header').forEach((header) => {
        header.remove();
    });
})
</script>
<?php
get_footer();
