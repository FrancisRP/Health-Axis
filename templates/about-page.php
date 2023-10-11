<?php /* Template Name: About Page */ ?>

<?php get_header(); ?>

<div id="primary">
	<main id="main" class="site-main">
		<div class="container">

			<div class="template template--about">

				<div class="top-image" style="background-image: url('http://via.placeholder.com/1000x150')"></div><!-- .top-image -->
				
				<header class="page__header">
					<?php the_title( '<h1 class="page__title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php the_content(); ?>

			</div><!-- .about-template -->

		</div><!-- .container -->
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
