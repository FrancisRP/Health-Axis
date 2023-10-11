<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hive-starter
 */

get_header(); ?>

<?php get_template_part('templates/page', 'header'); ?>
<div id="primary">
  <main id="main" class="site-main post--single">
    <div class="container">
      <?php

        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', get_post_format() );

        endwhile; // End of the loop.
        
        ?>

    </div><!-- .container -->

  </div><!-- #content -->

</div><!-- #page -->

<?php
get_footer();
