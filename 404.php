<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hive-starter
 */

get_header(); ?>

	<div id="primary">
		<main id="main" class="site-main">

			<div class="container">

				<section class="error-404 not-found">

					<h1 class="page-404-title">
						<?php esc_html_e( '404' ); ?>
					</h1>

					<p class="page-404-explain">
						<?php esc_html_e( 'Oh no! You\'ve hit a page that cannot be found.' ); ?>
						<br>
						<?php esc_html_e( 'Try a search or check out the front page.'); ?>
					</p>

					<?php get_search_form(); ?>

				</section><!-- .error-404 -->

			</div><!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
