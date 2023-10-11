<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hive-starter
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
		<?php get_template_part( 'templates/page', 'header' ); ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-9">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
								* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that will be used instead.
								*  https://codex.wordpress.org/Function_Reference/get_post_format
								*/
							get_template_part( 'template-parts/content-index', get_post_format() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
                </div><!-- .col-xs-12 col-sm-8 -->
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="blog-sidebar">
						<?php get_sidebar(); ?>
                    </div><!-- .blog-sidebar -->
                </div><!-- .col-xs-12 col-sm-4 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </main><!-- #main -->
</div><!-- #primary -->
