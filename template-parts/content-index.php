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
	<div class="blog-index__each">

		<a href="<?php echo the_permalink(); ?>">
			<?php if (has_post_thumbnail()) : ?>
				<div class="blog-index__image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
			<?php endif; ?>
		</a>

		<div class="blog-index__meta">

			<a href="<?php echo the_permalink(); ?>">
				<h3 class="blog-index__title"><?php the_title(); ?></h3>
			</a>

			<p class="blog-index__excerpt">
				<?php $limit = 60; echo excerpt($limit); ?>
			</p><!-- .blog-index__excerpt -->

			<div class="blog-index__extra">
				<span class="blog-index__author">By: <a href=""><?php the_author(); ?></a></span>
				<span class="blog-index__read-more">
					<a href="<?php echo the_permalink(); ?>" class="read-more">Read More</a>
				</span>
			</div><!-- .blog-index__extra -->

		</div><!-- .blog-index__meta -->

	</div><!-- .blog-index__each -->
</article><!-- #post-## -->
