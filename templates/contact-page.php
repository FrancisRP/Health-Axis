<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

<div id="primary">
	<main id="main" class="site-main">

		<div class="container">

			<div class="template template--contact">

				<header class="page__header">
					<?php the_title( '<h1 class="page__title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				
				<?php the_content(); ?>
				
			</div>

		</div><!-- .container -->

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
