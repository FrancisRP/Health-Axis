<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hive-starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="blog-single__header">
		<?php if (has_post_thumbnail()) : ?> 
			<div class="blog-single__image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
		<?php endif; ?>

		<h1 class="blog-single__title"><?php the_title(); ?></h1>
	</header><!-- .blog-single__header -->

	<div class="blog-single__content">
		<?php
			the_content();
		?>
	</div><!-- .blog-single__content -->
</article><!-- #post-## -->
