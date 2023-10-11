<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package hive-starter
 */

get_header(); ?>

	<section id="primary">
		<main id="main" class="site-main">

			<div class="container">
				<div class="row">
				<?php
				if ( have_posts() ) : ?>

						<div class="col-sm-8">
					
						<header class="page-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'hive-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->
					
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
					
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );
					
						endwhile;
					
						the_posts_navigation(); ?>

					</div>

					<div class="col-sm-4">
						<div class="sidebar"><?php get_sidebar(); ?></div>
					</div>
				</div>
				
				<?php else :
				
					get_template_part( 'template-parts/content', 'none' );
				
				endif; ?>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
