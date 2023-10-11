<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hive-starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page__content">
			
			<?php
			if (have_posts()):
				while (have_posts()): the_post();
					the_content();
				endwhile;
			endif;
			
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hive-starter' ),
					'after'  => '</div>',
				) );
			?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
